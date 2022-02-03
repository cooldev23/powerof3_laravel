<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Partner;
use App\Models\Employee;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        $testimonialCount = Testimonial::count();
        $listingCount = Listing::count();
        $partnerCount = Partner::count();
        $sold = Listing::whereNotNull('date_sold')->get();
        $soldCount = count($sold);
        $featuredProps = Listing::with('media')->where('is_featured', 1)->get();
        return view('admin.dashboard', compact('employeeCount', 'testimonialCount', 'listingCount', 'partnerCount', 'featuredProps', 'soldCount'));
    }
}
