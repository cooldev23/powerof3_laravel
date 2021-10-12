<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        $testimonialCount = Testimonial::count();
        // $employeeCount = Employee::count();
        // $employeeCount = Employee::count();
        return view('dashboard', compact('employeeCount', 'testimonialCount'));
    }
}
