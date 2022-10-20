<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getListings(Request $request)
    {
        // do some things here
        dd($request->zip);
    }
}
