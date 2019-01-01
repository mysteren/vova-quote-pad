<?php

namespace App\Http\Controllers\Edit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quote;
use App\Author;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::all();

        return view('edit.quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::getList();
        // dd($authors);

        return view('edit.quotes.create', compact('authors'));
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
            'name'=>'required',
            'text'=> 'required',
        ]);

        $quote = new Quote([
            'name' => $request->get('name'),
            'text'=> $request->get('text'),
            'date'=> $request->get('date'),
            'author_id'=> $request->get('author'),
        ]);

        $quote->save();

        return redirect()->route('quotes.show', ['quote' => $quote->id])->with('success', 'Цитата создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = Quote::find($id);
        return view('edit.quotes.show', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::find($id);
        $authors = Author::getList();
        return view('edit.quotes.edit', compact('quote', 'authors'));
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
            'text'=> 'required',
        ]);
        
        $quote = Quote::find($id);
        $quote->name = $request->get('name');
        $quote->text = $request->get('text');
        $quote->author_id = $request->get('author');
        $quote->date = $request->get('date');

        $quote->save();

        return redirect()->route('quotes.show', ['quote' => $quote->id])->with('success', 'Цитата обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quote::find($id);
        $quote->delete();

        return redirect()->route('quotes.index')->with('success', 'Цитата удалена');
    }
}
