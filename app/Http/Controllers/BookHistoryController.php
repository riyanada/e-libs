<?php

namespace App\Http\Controllers;

use App\BookHistory;
use Illuminate\Http\Request;

class BookHistoryController extends Controller
{
    public function index()
    {
        // book_histories with category and book
        $book_histories = BookHistory::with('category', 'book')->orderBy('id', 'DESC')->get();
        return view('admin.book_history.index', compact('book_histories'));
    }
}
