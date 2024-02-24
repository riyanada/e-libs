<?php

namespace App\Http\Controllers;

use App\Books;
use App\Category;
use App\BookHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function logBook($book_id, $action)
    {
        $book_history = new BookHistory;
        $book_history->date = date('Y-m-d h:i:s');
        $book_history->action = $action;
        $book_history->books_id = $book_id;
        $book_history->users_id = auth()->user()->id;
        $book_history->save();
    }   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create', [
            'category' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //books vaidation
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'tahun_terbit' => 'required|numeric',
            'penerbit' => 'required',
            'abstrak' => 'required',
            'categories_id' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ebook' => 'required|mimes:pdf|max:2048',
        ]);

        //image upload
        $imageName = time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('images'), $imageName);

        //pdf upload
        $pdfName = time() . '.' . $request->ebook->extension();
        $request->ebook->move(public_path('ebook'), $pdfName);

        //store data
        $book = new Books;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->penerbit = $request->penerbit;
        $book->abstrak = $request->abstrak;
        $book->categories_id = $request->categories_id;
        $book->thumbnail = $imageName;
        $book->file_ebook = $pdfName;
        $book->save();

        // save books history
        $this->logBook($id = $book->id, 'Upload E-Book');

        return redirect('/books')->with('status', 'Book has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // save books history buku yang terbaca
        $this->logBook($id, 'Membaca E-Book');
        
        $book = Books::find($id);
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Books::find($id);
        return view('admin.book.edit', [
            'books' => $book,
            'category' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //books vaidation
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'tahun_terbit' => 'required|numeric',
            'penerbit' => 'required',
            'abstrak' => 'required',
            'categories_id' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // check the image if there is a new image then delete the old image and upload a new image
        if (!$request->thumbnail) {
            $imageName = $request->oldThumbnail;
        } else {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'), $imageName);
        }

        // check the pdfName if there is a new image then delete the old image and upload a new image
        if (!$request->ebook) {
            $pdfName = $request->oldEbook;
        } else {
            $pdfName = time() . '.' . $request->ebook->extension();
            $request->ebook->move(public_path('ebook'), $pdfName);
        }
        

        //update data
        $book = Books::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->penerbit = $request->penerbit;
        $book->abstrak = $request->abstrak;
        $book->thumbnail = $imageName;
        $book->file_ebook = $pdfName;
        $book->categories_id = $request->categories_id;
        $book->save();

        $this->logBook($id, 'Update E-Book');

        return redirect('/books')->with('status', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
        return redirect('/books')->with('success', 'Book has been deleted');
    }
}
