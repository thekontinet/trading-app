<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Wallet;
use App\Services\CryptoService;
use App\Services\WalletService;
use Illuminate\Http\Request;

class CryptoDepositController extends Controller
{
    public function __construct(
        private CryptoService $cryptoService,
        private WalletService $walletService
    ){}
    public function create(Request $request)
    {
        return view('deposit.create', [
            'accounts' => $request->user()->wallets()->whereRelation('asset', 'address', '<>', null)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'amount' => str_replace(',', '', $request->input('amount'))
        ]);

        $request->validate([
            'amount' => ['required', 'numeric', 'min:0'],
            'wallet' => ['required', 'exists:wallets,id']
        ]);

        $account = $request->user()->wallets()->find($request->input('wallet'));
        
        // convert the user's base currency to the selected wallet crypto currency equivalient before depositing
        $amount = $this->cryptoService->convertToCoinEquivalent($request->input('amount'), $account->name, $request->user()->currency);

        // add a meta key named "funding" so you can disguish deposit fron other type of transactions
        $transaction = $this->walletService->deposit($account, $amount, false,  ['funding' => true]);

        return redirect()->route('transactions.show', $transaction);
    }
}
