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
        // TODO rework this to eliminate foreach in view
        $testimonials = Testimonial::with('employee')->where('is_active', 1)->inRandomOrder()->limit(1)->get();
        return view('front-end.welcome', compact('employees', 'featuredListings', 'testimonials'));
    }

    public function listings()
    {
        $listings = Listing::currentListings()->whereNull('date_sold')->get();
        $previousSales = Listing::whereNotNull('date_sold')->get();
        
        return view('front-end.listings', compact('listings', 'previousSales'));
    }

    public function showListing(Listing $listing)
    {
        // TODO get this from the MLS API to get all pictures and info
        return view('front-end.show-listing', compact('listing'));
    }

    public function listingSearch()
    {
        // TODO get this from the MLS API to get all pictures and info
        return view('front-end.all-listings');
    }
}
