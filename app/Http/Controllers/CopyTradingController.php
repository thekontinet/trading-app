<?php

namespace App\Http\Controllers;

use App\Models\Copier;
use App\Models\Trader;
use App\Services\WalletService;
use Bavix\Wallet\Internal\Exceptions\TransactionFailedException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CopyTradingController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('new')){
            return view('trade.traders-new', [
                'traders' => Trader::query()->whereDoesntHave('members', fn($query) => $query->where('user_id', $request->user()->id))->latest()->paginate()->withQueryString(),
            ]);
        }

        return view("trade.traders", [
            'copies' => Copier::query()->where('user_id', $request->user()->id)->latest()->paginate(),
            'user' => $request->user()
        ]);
    }

    public function store(Request $request)
    {
        $trader = Trader::query()->find($request->input('trader'));
        $minAmount = $trader->min_amount / 100;
        $request->merge(['amount' => str_replace(',', '', $request->input('amount'))]);
        $request->validate([
            'trader' => ['required', 'exists:traders,id', Rule::unique('copiers', 'trader_id')->where('user_id', auth()->id())],
            'amount' => ['required', 'numeric', "min:$minAmount"]
        ],[
            'trader.unique' => 'You are already copying this trader'
        ]);

        if(!$request->user()->subscription || $request->user()->subscription?->hasExpired()){
            return redirect()->back()
                ->withErrors(['trader' => 'Please you need to upgrade your account'])
                ->withInput(['trader' => $request->input('trader')]);
        }

        if($trader->copiers >= $trader->max_copiers){
            return redirect()->back()
                ->withErrors(['trader' => 'This trader\'s space is full'])
                ->withInput(['trader' => $request->input('trader')]);
        }

        try{
            app(WalletService::class)->withdraw($request->user()->wallet, $request->input('amount'));
            $trader->addMember($request->user(), $request->input('amount'));
            return redirect()->route('copy-trades.index');
        }catch(TransactionFailedException $e){
            return redirect()->back()->withErrors(['trader' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, $copy_id)
    {
        $copier = Copier::query()->where('user_id', $request->user()->id)->findOrFail($copy_id);
        app(WalletService::class)->deposit(
            $request->user()->wallet,
            $copier->profit / 100 + $copier->amount / 100
        );

        $copier->delete();
        return redirect()->back();
    }
}
