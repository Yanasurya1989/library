<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // dd('hallo');
        $customers = User::where('role', 'Customer')->orderBy('name', 'asc')->get();
        // dd($customers);
        return view('transactions.create', compact('customers'));
    }

    public function create(Request $request)
    {
        $id_customer = $request->customer;
        $status = '0';
        // dd($id_customer, $status);

        $storeTrans = Transaction::create([
            'user_id' => $id_customer,
            'status' => $status
        ]);

        $id_transaction = $storeTrans->id;
        // dd($id_transaction);

        return redirect('books/transaction/' . $id_transaction);
    }

    public function chart($id_transaction)
    {
        // dd($id_transaction);
        $books = Book::orderBy('book_title', 'asc')->get();

        $charts = DetailTransaction::get();
        return view('transactions.chart', compact('id_transaction'));
    }

    public function storeChart(Request $request)
    {
        $id_transaction = $request->id_transaction;
        $id_book = $request->id_book;
        $qty = $request->qty;

        $storeChart = DetailTransaction::create([]);
    }
}
