<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Driver Listing
        return view('pages.listing.driver_listing', [
            'title' => 'Driver Listing',
            'drivers' => Driver::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Creating session
        if ($request->has('BtnNew')) {
            session()->flash('showModalNew', true);
        }

        // Validation Rule
        $validate = $request->validate([
            'driver_sname' => 'required|min:5|max:10',
            'driver_lname' => 'required|min:10|max:30',
            'driver_KTP' => 'required|min:16|max:16',
            'driver_email' => 'email:rfc,dns|required',
            'driver_stnk' => 'required|min:8|max:8',
            'driver_phone' => 'required|min:11|max:12',
        ], [
            'driver_sname.required' => 'The driver surname field is required.',
            'driver_sname.min' => 'The driver surname must be at least :min characters.',
            'driver_sname.max' => 'The driver surname may not be greater than :max characters.',
            'driver_lname.required' => 'The driver full name field is required.',
            'driver_lname.min' => 'The driver full name must be at least :min characters.',
            'driver_lname.max' => 'The driver full name may not be greater than :max characters.',
            'driver_KTP.required' => 'The driver KTP field is required.',
            'driver_KTP.min' => 'The driver KTP must be exactly :min characters.',
            'driver_KTP.max' => 'The driver KTP must be exactly :max characters.',
            'driver_email.email' => 'The driver email must be a valid email address.',
            'driver_email.required' => 'The driver email field is required.',
            'driver_stnk.required' => 'The driver STNK field is required.',
            'driver_stnk.min' => 'The driver STNK must be exactly :min characters.',
            'driver_stnk.max' => 'The driver STNK must be exactly :max characters.',
            'driver_phone.required' => 'The driver phone number field is required.',
            'driver_phone.min' => 'The driver phone number must be at least :min characters.',
            'driver_phone.max' => 'The driver phone number may not be greater than :max characters.',
        ]);

        $driveremails = Driver::where('driver_email', $validate['driver_email'])->exists();
        $driverphone = Driver::where('driver_phone', $validate['driver_phone'])->exists();

        if ($driveremails || $driverphone) {
            $errors = [];
            if ($driveremails) {
                $errors['driver_email'] = 'Email is already exist.';
            }

            if ($driverphone) {
                $errors['driver_phone'] = 'Phone number is already exist';
            }

            return redirect()->back()->withErrors($errors)->withInput();
        }

        $driver = new Driver();
        $driver->driver_GUID = fake()->uuid();
        $driver->driver_sname = $validate['driver_sname'];
        $driver->driver_lname = $validate['driver_lname'];
        $driver->driver_KTP = $validate['driver_KTP'];
        $driver->driver_email = $validate['driver_email'];
        $driver->driver_stnk = $validate['driver_stnk'];
        $driver->driver_phone = $validate['driver_phone'];
        $driver->save();

        // Back to unit_listing with response
        return redirect()->route('listing.driver')->with('success', 'Unit data has been successfully saved');
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
    public function update(Request $request, string $id, string $driver_guid)
    {
        // Set session flash only if validation succeeds
        if ($request->has('BtnUpdate')) {
            session()->flash('showModalEdit', true);
            session()->put('editData', ['id' => $id, 'driver_guid' => $driver_guid]);
        }

        // Validation Rule
        $validate = $request->validate([
            'driver_sname' => 'required|min:5|max:10',
            'driver_lname' => 'required|min:10|max:30',
            'driver_KTP' => 'required|min:16|max:16',
            'driver_email' => 'email:rfc,dns|required',
            'driver_stnk' => 'required|min:8|max:8',
            'driver_phone' => 'required|min:11|max:12',
        ], [
            'driver_sname.required' => 'The driver surname field is required.',
            'driver_sname.min' => 'The driver surname must be at least :min characters.',
            'driver_sname.max' => 'The driver surname may not be greater than :max characters.',
            'driver_lname.required' => 'The driver full name field is required.',
            'driver_lname.min' => 'The driver full name must be at least :min characters.',
            'driver_lname.max' => 'The driver full name may not be greater than :max characters.',
            'driver_KTP.required' => 'The driver KTP field is required.',
            'driver_KTP.min' => 'The driver KTP must be exactly :min characters.',
            'driver_KTP.max' => 'The driver KTP must be exactly :max characters.',
            'driver_email.email' => 'The driver email must be a valid email address.',
            'driver_email.required' => 'The driver email field is required.',
            'driver_stnk.required' => 'The driver STNK field is required.',
            'driver_stnk.min' => 'The driver STNK must be exactly :min characters.',
            'driver_stnk.max' => 'The driver STNK must be exactly :max characters.',
            'driver_phone.required' => 'The driver phone number field is required.',
            'driver_phone.min' => 'The driver phone number must be at least :min characters.',
            'driver_phone.max' => 'The driver phone number may not be greater than :max characters.',
        ]);

        // Find record by id and driver_guid
        $driver = Driver::where('id', $id)
            ->where('driver_GUID', $driver_guid)
            ->firstOrFail();

        $driver->driver_GUID = fake()->uuid();
        $driver->driver_sname = $validate['driver_sname'];
        $driver->driver_lname = $validate['driver_lname'];
        $driver->driver_KTP = $validate['driver_KTP'];
        $driver->driver_email = $validate['driver_email'];
        $driver->driver_stnk = $validate['driver_stnk'];
        $driver->driver_phone = $validate['driver_phone'];
        $driver->save();

        // Set session flash only if validation succeeds
        if ($driver->save()) {
            session()->forget('showModalEdit');
        }

        // Redirect
        return redirect()->route('listing.driver')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $driver_guid)
    {
        $driver = Driver::where('id', $id)
            ->where('driver_GUID', $driver_guid)
            ->first();

        if (!$driver) {
            return redirect()->route('listing.unit')->with('error', 'Unit not found');
        }

        $driver->delete();

        return redirect()->route('listing.driver')->with('success', 'Driver has been deleted successfully');
    }

    // Get Driver
    public function getDriver($id, $driver_guid)
    {
        $driver = Driver::where('id', $id)
            ->where('driver_guid', $driver_guid)
            ->first();

        return response()->json($driver);
    }
}
