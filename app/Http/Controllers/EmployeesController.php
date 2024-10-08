<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Inertia\Inertia;

use function Termwind\render;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=Employees::all();
        return Inertia::render('Employees/index',[
        'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Just show the form without passing employees data
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
       Employees::create($validatedData);
       return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) // Correct the model name
    {
        $employees=Employees::find($id);
        return Inertia::render('Employees/show',[
            'employee'=> $employees
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employees) // Correct the model name
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employees) // Correct the model name
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employees) // Correct the model name
    {
        //
    }
}
