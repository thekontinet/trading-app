<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request){
        $transactions = Transaction::query()
            ->whereIn('wallet_id', $request->user()->wallets->pluck('id'))
            ->when($request->query('type'), function(Builder $query) use ($request){
                return $query->where('type', $request->query('type'));
            })
            ->latest()
            ->with('wallet')
            ->paginate();
        return view('transaction.index', [
            'transactions' => $transactions
        ]);
    }

    public function show(Transaction $transaction)
    {
        return view('transaction.show', [
            'transaction' => $transaction,
            'wallet' => $transaction->wallet,
            'asset' => Asset::query()->where('symbol', $transaction->wallet->slug)->first()
        ]);
    }
}
