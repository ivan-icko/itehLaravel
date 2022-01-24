<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();
        return $books;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books=Book::all();
        return $books;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'writer_id'=>'required',
            'genre_id'=>'required',
            'title'=>'required|string|max:255',
            'abstract'=>'required|string',
            'year_of_publication'=>'required',
        ]);
        if($validator->fails()){
             return response()->json($validator->errors());
        }
        $book=Book::create([
            'writer_id'=>$request->writer_id,
            'genre_id'=>$request->genre_id,
            'title'=>$request->title,
            'abstract'=>$request->abstract,
            'year_of_publication'=>$request->year_of_publication,
        ]);
        return response()->json(['Knjiga je uspesno kreirana',new BookResource($book)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator=Validator::make($request->all(),[
            'writer_id'=>'required',
            'genre_id'=>'required',
            'title'=>'required|string|max:255',
            'abstract'=>'required|string',
            'year_of_publication'=>'required',
        ]);
        if($validator->fails()){
             return response()->json($validator->errors());
        }

        $book->title=$request->title;
        $book->abstract=$request->abstract;
        $book->year_of_publication=$request->year_of_publication;
        $book->writer_id=$request->writer_id;
        $book->genre_id=$request->genre_id;

        $book->save();
        return response()->json(['Knjiga je uspesno azurirana',new BookResource($book)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['Knjiga je uspesno obrisana']);
    }
}
