<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
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
            'unit_brand' => 'required|max:30',
            'unit_VIN' => 'required|max:100',
            'unit_type' => 'required|max:30',
            'unit_RegYear' => 'required|max:4',
            'unit_LICENSE' => 'required|max:10',
            'unit_LICENSE_type' => 'required|max:4',
            'unit_color' => 'required|max:15',
            'unit_condition' => 'required|max:10',
        ], [
            'unit_brand.required' => 'The unit brand field is required.',
            'unit_brand.max' => 'The unit brand may not be greater than :max characters.',
            'unit_VIN.required' => 'The unit VIN field is required.',
            'unit_VIN.max' => 'The unit VIN may not be greater than :max characters.',
            'unit_type.required' => 'The unit type field is required.',
            'unit_type.max' => 'The unit type may not be greater than :max characters.',
            'unit_RegYear.required' => 'The unit registration year field is required.',
            'unit_RegYear.max' => 'The unit registration year may not be greater than :max characters.',
            'unit_LICENSE.required' => 'The unit license field is required.',
            'unit_LICENSE.max' => 'The unit license may not be greater than :max characters.',
            'unit_LICENSE_type.required' => 'The unit license type field is required.',
            'unit_LICENSE_type.max' => 'The unit license type may not be greater than :max characters.',
            'unit_color.required' => 'The unit color field is required.',
            'unit_color.max' => 'The unit color may not be greater than :max characters.',
            'unit_condition.required' => 'The unit condition field is required.',
            'unit_condition.max' => 'The unit condition may not be greater than :max characters.',
        ]);

        // Check if unit_VIN or unit_LICENSE already exists
        $unitVINExists = Unit::where('unit_VIN', $validate['unit_VIN'])->exists();
        $unitLicenseExists = Unit::where('unit_LICENSE', $validate['unit_LICENSE'])->exists();

        if ($unitVINExists || $unitLicenseExists) {
            $errors = [];

            if ($unitVINExists) {
                $errors['unit_VIN'] = 'The unit VIN already exists.';
            }

            if ($unitLicenseExists) {
                $errors['unit_LICENSE'] = 'The unit license already exists.';
            }

            return redirect()->back()->withErrors($errors)->withInput();
        }


        // Saving to database
        $unit = new Unit();
        $unit->unit_GUID = fake()->uuid();
        $unit->unit_brand = $validate['unit_brand'];
        $unit->unit_type = $validate['unit_type'];
        $unit->unit_VIN = $validate['unit_VIN'];
        $unit->unit_LICENSE = $validate['unit_LICENSE'];
        $unit->unit_LICENSE_type = $validate['unit_LICENSE_type'];
        $unit->unit_RegYear = $validate['unit_RegYear'];
        $unit->unit_color = $validate['unit_color'];
        $unit->unit_condition = $validate['unit_condition'];
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
    public function destroy(string $id, string $unit_guid)
    {
        // Temukan unit yang akan dihapus berdasarkan $id dan $unit_guid
        $unit = Unit::where('id', $id)
            ->where('unit_guid', $unit_guid)
            ->first();

        // Periksa apakah unit ditemukan
        if (!$unit) {
            return redirect()->route('listing.unit')->with('error', 'Unit not found');
        }

        // Hapus unit dari database
        $unit->delete();

        return redirect()->route('listing.unit')->with('success', 'Unit has been deleted successfully');
    }
}
