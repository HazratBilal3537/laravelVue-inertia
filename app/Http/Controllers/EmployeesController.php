<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Start building the query
        $query = Employee::query();

        // Check if there is a search term, then filter the query
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('position', 'like', '%' . $search . '%');
        }

        // Paginate the results
        $employees = $query->paginate(10);

        // Pass data to the Inertia view
        return Inertia::render('Employees/index', [
            'users' => $employees,
            'filters' => $request->only('search'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Just show the form without passing employee data
        return Inertia::render('Employees/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'phone' => 'required|string|max:19',
            'position' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'address' => 'required|string|max:500',
            'status' => 'required|string|in:active,inactive',
        ]);
        // dd($validatedData);
        Employee::create($validatedData);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) // Correct the model name
    {
        $employee = Employee::find($id);
        return Inertia::render('Employees/show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) // Correct the model name
    {
        $employee = Employee::find($id);
        return Inertia::render('Employees/update', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee) // Correct the model name
    {
        // dd('testing request',$request);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
           'email' => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'phone' => 'required|string|max:19',
            'position' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'address' => 'required|string|max:500',
            'status' => 'required|string|in:active,inactive',
        ]);

        $employee->update($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // Correct the model name
    {

        $employe=Employee::findOrFail($id);
        $employe->delete();
    }
}
