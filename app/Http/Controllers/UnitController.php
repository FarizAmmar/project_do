<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Unit View Listing
        return view('pages.listing.unit_listing', [
            'title' => 'Unit Listing',
            'units' => Unit::latest()->paginate(10)
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
        // Validation Rule
        $validate = $request->validate([
            'unitBrand' => 'required|max:30',
            'unitVin' => 'required|max:100',
            'unitType' => 'required|max:30',
            'unitRegYear' => 'required|max:4',
            'unitLicense' => 'required|max:10',
            'unitLicenseType' => 'required|max:4',
            'unitColor' => 'required|max:15',
            'unitCondition' => 'required|max:10',
        ]);

        // Saving to database
        $unit = new Unit();
        $unit->unit_GUID = fake()->uuid();
        $unit->unit_brand = $validate['unitBrand'];
        $unit->unit_type = $validate['unitType'];
        $unit->unit_VIN = $validate['unitVin'];
        $unit->unit_LICENSE = $validate['unitLicense'];
        $unit->unit_LICENSE_type = $validate['unitLicenseType'];
        $unit->unit_RegYear = $validate['unitRegYear'];
        $unit->unit_color = $validate['unitColor'];
        $unit->unit_condition = $validate['unitCondition'];
        $unit->save();

        // Back to unit_listing with response
        return redirect()->route('listing.unit')->with('success', 'Unit data has been successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
