<?php

namespace App\Http\Controllers;
//namespace Carbon;

use App\Transaction;
use App\Asset;
use App\Category;
use App\User;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $statuses = Status::all();
        $users = User::all();
        $assets = Asset::all();
        $transactions = Transaction::all();
        return view('transactions.index')->with('categories', $categories)->with('users', $users)->with('assets', $assets)->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        //dd($request->input(''));
        $borrowDate = Carbon::createFromFormat('Y-m-d', $request->input('borrowDate'))
        ->tz('UTC')
        ->toDateString();
        $returnDate = Carbon::createFromFormat('Y-m-d', $request->input('returnDate'))
        ->tz('UTC')
        ->toDateString();

        $userId = Auth::user()->id;
        $catId = $request->input('catId');
        $catCode = Category::find($catId)->name;

    
        
        $refNo= $userId. "-" . $catCode ."-" . $borrowDate . "-" . $returnDate;

        

        $transaction = new Transaction;
        $transaction->refNo = $refNo;
        $transaction->user_id = $userId;
        $transaction->category_id = $catCode;
        $transaction->borrowDate = $borrowDate;
        $transaction->returnDate = $returnDate;

        $transaction->save();
        return redirect('transactions')->with('transaction', $transaction);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction= Transaction::find($id);

        $statusId = $request->input('status');

        //dd($statusId);

        $transaction->status_id = $statusId;
        $transaction->save();
        return redirect('transactions')->with('transactions', $transaction);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

    }
}
