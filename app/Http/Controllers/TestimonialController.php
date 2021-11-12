<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::with('employee')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimonial = new Testimonial();
        $employees = Employee::all();

        return view('admin.testimonials.create', compact('testimonial', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'posted_by' => 'required',
            'content' => 'required',
            'employee_id' => 'required'
        ]);

        $testimonial = Testimonial::create($request->only(['posted_by', 'content', 'is_active', 'employee_id']));

        return redirect()->route('admin.testimonials.index')->with('status', 'Successfully added new testimonial for ' . $testimonial->employee->first_name . ' created by ' . $testimonial->posted_by);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $employees = Employee::all();

        return view('admin.testimonials.edit', compact('testimonial', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'posted_by' => 'required',
            'content' => 'required',
            'employee_id' => 'required'
        ]);

        $testimonial->update($request->only(['posted_by', 'content', 'is_active', 'employee_id']));

        return redirect()->route('admin.testimonials.index')->with('status', 'Successfully updated new testimonial for ' . $testimonial->employee->first_name . ' created by ' . $testimonial->posted_by);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
