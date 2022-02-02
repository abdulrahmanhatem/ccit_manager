<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function quotation(){
        return view('quote');
    }

    public function quotation_ar(){
        return view('quote_ar');
    }

    public function jobs(){
        return view('jobs');
    }

    public function index()
    {
        return view('quotes.index');
    }
}
