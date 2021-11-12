<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('front-end.welcome');
    }

    public function listings()
    {
        $listings = Listing::all();
    
        return view('front-end.listings', compact('listings'));
    }
}
