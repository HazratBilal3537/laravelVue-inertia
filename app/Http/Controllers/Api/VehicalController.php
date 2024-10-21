<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehical;
use Illuminate\Http\Request;

class VehicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // You can return an empty array or simple message for now.
        return response()->json([
            'message' => 'This is a list of vehicals',
            'data' => []
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehical $vehical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehical $vehical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehical $vehical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehical $vehical)
    {
        //
    }
}
