<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use \Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::orderBy('id','desc')->paginate(10);
        return view('backend.book-library.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.book-library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'isbn' => 'required',
            'published_on' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $post = $request->post();
        $file = $request->image;
        $post['image'] = Storage::disk('public')->putFileAs('images', $file,$file->getClientOriginalName());

        Book::create($post);

        return redirect()->route('books.index')->with('success','Book has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
         return view('backend.book-library.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'isbn' => 'required',
            'published_on' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'image' => 'required_without:old_image'
        ]);

        $post = $request->all();
        if($request->has('image')){
            $file = $request->image;
            $post['image'] = Storage::disk('public')->putFileAs('images', $file,$file->getClientOriginalName());
        }else{
            $post['image'] = $post['old_image'];
        }
        $book->fill($post)->save();

        return redirect()->route('books.index')->with('success','Book Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Book has been deleted successfully');
    }
}
