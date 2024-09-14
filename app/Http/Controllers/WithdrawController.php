<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Services\WalletService;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Internal\Exceptions\TransactionFailedException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WithdrawController extends Controller
{
    public function __construct(
        private WalletService $walletService
    ){}
    public function create(Request $request)
    {
        if($method = $request->query('method')){
            $view = "withdraw.methods.$method";
            return view()->exists($view) ? view($view,[
                'accounts' => $this->getWithdrawableAccountForMethod($method)
            ]) : abort(404);
        }
        return view("withdraw.create");
    }

    public function store(Request $request)
    {
        //TODO: add request for withdrawal code
        $request->validate([
            'type' => ['required', 'in:bank,crypto,cashapp'],
            'wallet' =>  ['required', Rule::exists('wallets', 'id')->where('holder_id', $request->user()->id)],
            'amount' => ['required', 'numeric', 'min:0']
        ]);

        $type = $request->input('type');
        $wallet = $request->user()->wallets()->find($request->input('wallet'));
        
        try{
           $data = match($type){
               'bank' => $this->handleBankWithdraw($request),
               'crypto' => $this->handleCryptoWithdraw($request),
               'cashapp' => $this->handleCashappWithdraw($request),
               default => throw new TransactionFailedException('Cannot handle this type of withdrawal'),
           };

            $transaction = $this->walletService->withdraw($wallet, $request->input('amount'), false, $data);

            return redirect()->route('transactions.show', $transaction);
       }catch(TransactionFailedException $e){
            return redirect()->back()->withErrors([
                'wallet' => $e->getMessage()
            ]);
       }
    }

    private function handleBankWithdraw(Request $request){
        return $request->validate([
            'type' => ['required', 'in:bank'],
            'bank' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'number' => ['required', 'max:255'],
        ]);
    }

    private function handleCryptoWithdraw(Request $request){
        $data = $request->validate([
            'type' => ['required', 'in:crypto'],
            'wallet' =>  ['required', Rule::exists('wallets', 'id')->where('holder_id', $request->user()->id)],
            'address' => ['required', 'max:255'],
        ]);
        
        $wallet = $request->user()->wallets()->find($request->input('wallet'));

        if(!$wallet || !$this->walletService->walletIsCrypto($wallet)){
            throw new TransactionFailedException('Please provide a valid crypto wallet');
        }

        $data['wallet'] = $wallet->name;
        return $data;
    }

    private function handleCashappWithdraw(Request $request){
        $data = $request->validate([
            'type' => ['required', 'in:cashapp'],
            'tag' => ['required', 'max:255'],
        ]);

        $wallet = $request->user()->wallets()->find($request->input('wallet'));

        if(!$wallet || $this->walletService->walletIsCrypto($wallet)){
            throw new TransactionFailedException('Please provide a valid fiat wallet');
        }

        return $data;
    }

    private function getWithdrawableAccountForMethod($method){
        $query = auth()->user()->wallets();
        $accounts =  match($method){
            'bank' => $query->whereDoesntHave('asset')->get(),
            'crypto' => $query->whereHas('asset')->get(),
            'cashapp' => $query->whereDoesntHave('asset')->get(),
            default => []
        };

        return $accounts->map(fn($wallet) => [
            'id' => $wallet->id,
            'name' => $wallet->name . " " . money($wallet->balance, $wallet->currency)
        ]);
    }
}
