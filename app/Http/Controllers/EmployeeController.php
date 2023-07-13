<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'date_joined' => 'required|date',
            'designation' => 'required|max:255',
            'salary' => 'required|numeric',
        ]);

        $employee = Employee::create($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher_name' => 'required|max:255',
            'employee_category' => 'required|max:255',
            'isbn' => 'required|unique:employees,isbn,' . $employee->id,
            'year' => 'required|integer',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->borrows()->whereNull('return_date')->exists()) {
            return redirect()->route('employees.index')
                ->withErrors('Employee cannot be deleted because it is currently borrowed.');
        }

        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
}
