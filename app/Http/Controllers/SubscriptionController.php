<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Services\WalletService;
use Bavix\Wallet\Internal\Exceptions\TransactionFailedException;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(
        private WalletService $walletService
    ){}
    public function index()
    {
        return view('subscription.index', [
            'plans' => Plan::all()
        ]);    
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => ['required', 'exists:plans,id']
        ]);

        try{
            $plan = Plan::query()->find($request->input('plan_id'));

            $this->walletService->withdraw($request->user()->wallet, $plan->price / config('money.currencies.USD.subunit'));
            $plan->subscribe($request->user());
    
            return redirect()->route('dashboard');
        }catch(TransactionFailedException $e){
            return redirect()->back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }
}
