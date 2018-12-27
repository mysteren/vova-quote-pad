<?php


namespace App\Http\Controllers\Edit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotes;

/**
 * 
 */
class QuotesController extends Controller
{
    //
    public function index()
    {
        
        $quotes = Quotes::all();

        return view('edit.quotes.index', compact('quotes'));
        
    }

    
}
