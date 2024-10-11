<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Termwind\render;
use App\Http\Requests\CompanyRequest;

class ComponiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcompany = company::all();

        return Inertia::render('companies/index', [
            'companies' => $allcompany,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('companies/create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $input = $request->validated();
        company::create($input);
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = company::with('employees')->find($id);
        return inertia::render('companies/show', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = company::find($id);
        return inertia::render('companies/update', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, company $company)
    {
        $input = $request->validated();
        $company->update($input);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = company::find($id);
        $company->delete();
    }
}
