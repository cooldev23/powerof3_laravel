<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Partner;
use App\Models\Employee;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class FrontEndController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): view
    {
        $employees = Employee::with('type')->where('is_active', 1)->get();
        $featuredListings = Listing::with(['type', 'broker', 'media'])->where('is_featured', 1)->get();
        // TODO rework this to eliminate foreach in view
        $testimonials = Testimonial::with('employee')->where('is_active', 1)->inRandomOrder()->limit(1)->get();
        return view('front-end.welcome', compact('employees', 'featuredListings', 'testimonials'));
    }

    /**
     * Summary of listings
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

    /**
     * Summary of partners
     * @return View
     */
    public function partners(): view
    {
        $lenders = Partner::lenders()->get();
        $inspectors = Partner::inspectors()->get();
        return view('front-end.partners', compact('lenders', 'inspectors'));
    }

    /**
     * Summary of testimonials
     * @return View
     */
    public function testimonials(): view
    {
        $testimonials = Testimonial::active()->get();
        return view('front-end.testimonials', compact('testimonials'));
    }
}
