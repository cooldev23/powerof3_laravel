<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\File;
use App\Models\EmployeeType;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): view
    {
        $employees = Employee::with('type')->get();
        
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): view
    {
        $employee = new Employee();
        $employeeTypes = EmployeeType::all();
        
        return view('admin.employees.create', compact('employee', 'employeeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'image_path' => 'image',
            'image_alt' => 'required_with:image_path'
        ]);

        $fullFilename = strtolower($validated['image_path']->getClientOriginalName());

        $path = basename($request->file('image_path')->storeAs('public/images/employee-images', $fullFilename));

        $employee = Employee::create($request->only(['first_name', 'last_name', 'email', 'phone', 'employee_type_id', 'bio', 'image_alt', 'is_active']));

        $employee->image_path = $path;
        $employee->save();

        return redirect()->route('admin.employees.index')->with('status', 'Successfully added employee ' . $employee->first_name . ' ' . $employee->last_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return View
     */
    public function show(Employee $employee): view
    {
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return View
     */
    public function edit(Employee $employee): view
    {
        $employeeTypes = EmployeeType::all();
        
        return view('admin.employees.edit', compact('employee', 'employeeTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'image_path' => 'image',
            'image_alt' => 'required_with:image_path'
        ]);

        $fullFilename = strtolower($validated['image_path']->getClientOriginalName());

        $path = basename($request->file('image_path')->storeAs('public/images/employee-images', $fullFilename));

        $employee->update($request->only(['first_name', 'last_name', 'email', 'phone', 'employee_type_id', 'bio', 'image_alt', 'is_active']));

        $employee->image_path = $path;
        $employee->save();

        return redirect()->route('admin.employees.index')->with('status', 'Successfully updated employee ' . $employee->first_name . ' ' . $employee->last_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
