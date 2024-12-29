<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return view('books.index', compact('books'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $code = $request->code;
        $title = $request->title;
        $author = $request->author;
        $stock = $request->stock;
        $synopsis = $request->synopsis;

        // proses
        $storeBook = Book::create([
            'book_code' => $code,
            'book_title' => $title,
            'book_author' => $author,
            'book_stock' => $stock,
            'book_synopsis' => $synopsis
        ]);

        return redirect('/books')->with('success', 'Success store data buku');
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $deleteBook = Book::where('id', $id)->delete();
        return redirect('/books')->with('success', 'Success delete book');
    }
}
