<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Employee;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $employees = Employee::with('type')->where('is_active', 1)->get();
        $featuredListings = Listing::with(['type', 'broker', 'media'])->where('is_featured', 1)->get();
        $testimonials = Testimonial::with('employee')->where('is_active', 1)->inRandomOrder()->limit(5)->get();
        $testi = Testimonial::find(1);
        return view('front-end.welcome', compact('employees', 'featuredListings', 'testimonials', 'testi'));
    }

    public function listings()
    {
        $listings = Listing::all();
    
        return view('front-end.listings', compact('listings'));
    }
}
