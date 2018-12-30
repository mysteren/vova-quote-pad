<?php

namespace App\Http\Controllers\Edit;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('picture')->get();

        return view('edit.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edit.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name'=>'required',
            'surname'=> 'required',
        ]);

        $author = new Author([
            'name' => $request->get('name'),
            'surname'=> $request->get('surname'),
        ]);

        if ($image = $request->file('image')) {
            $author->setImage($image);
        }

        $author->save();

        return redirect()->route('authors.show', ['author' => $author->id])->with('success', 'Автор создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);
        return view('edit.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);
        return view('edit.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'surname'=> 'required',
        ]);
        
        $author = Author::find($id);
        $author->name = $request->get('name');
        $author->surname = $request->get('surname');

        

        if ($image = $request->file('image')) {
            $author->setImage($image);
            //$author->save();
        }

        $author->save();

        return redirect()->route('authors.show', ['author' => $author->id])->with('success', 'Автор обновлен');
        //return redirect('/edit/authors', )->with('success', 'Автор обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();

     return redirect('/edit/authors')->with('success', 'Автор удален');
    }
}
