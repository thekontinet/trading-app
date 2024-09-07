<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request){
        return view('transaction.index', [
            'transactions' => Transaction::query()->latest()->with('wallet')->paginate()
        ]);
    }

    public function show(Transaction $transaction)
    {
        // $transaction->wallet->confirm($transaction);
        return view('transaction.show', [
            'transaction' => $transaction,
            'wallet' => $transaction->wallet,
            'asset' => Asset::query()->where('symbol', $transaction->wallet->slug)->first()
        ]);
    }
}
