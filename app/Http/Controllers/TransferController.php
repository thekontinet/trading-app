<?php

namespace App\Http\Controllers;

use App\Services\CryptoService;
use App\Services\WalletService;
use Bavix\Wallet\Internal\Exceptions\TransactionFailedException;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function __construct(
        private CryptoService $cryptoService,
        private WalletService $walletService,
    ){}

    public function create(Request $request)
    {
        return view('transfer.create', [
            'accounts' => $request->user()->wallets->map(fn($wallet) => [
                'id' => $wallet->id,
                'name' => $wallet->name . " " . money($wallet->balance, $wallet->currency)
            ]),
            'to' => $request->user()->wallet->name,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'from'=> ['required', 'exists:wallets,id'],
            'to'=> ['required', 'exists:wallets,id'],
            'amount'=> ['required', 'numeric'],
        ]);

        try{
            $accountFrom = $request->user()->wallets()->find($request->input('from'));
            $accountTo = $request->user()->wallets()->find($request->input('to'));
            
            $transaction = $this->walletService->transfer($accountFrom, $accountTo, $request->input('amount'));
            return redirect()->route('transactions.show', $transaction);
        }catch(TransactionFailedException $e){
            return redirect()->back()->withErrors([
                'amount' => $e->getMessage()
            ]);
        }
    }
}
