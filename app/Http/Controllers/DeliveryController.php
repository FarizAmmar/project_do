<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Driver;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.listing.deliveries_listing', [
            'title' => 'Delivery Order Registration',
            'deliveries' => Delivery::latest()->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.entries.deliveries_entries', [
            'title' => 'Delivery Registration',
            'units' => Unit::all(),
            'drivers' => Driver::all()
        ]);
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

        $user_id = User::where('username', auth()->user()->username)->first();

        $delivery = new Delivery();
        $delivery->delivery_GUID  = fake()->uuid();
        $delivery->delivery_submited_by = $user_id->id;
        $delivery->delivery_unit = $request->input('unit_id');
        $delivery->delivery_driver = $request->input('driver_id');
        $delivery->delivery_senderName = $request->input('delivery_senderName');
        $delivery->delivery_codeUnit = $request->input('unit_code');
        $delivery->delivery_bbn = $request->input('delivery_bbn');
        $delivery->delivery_sales = $request->input('delivery_sales');
        $delivery->delivery_spv = $request->input('delivery_spv');
        $delivery->delivery_date = $request->input('delivery_date');
        $delivery->delivery_addressFrom = $request->input('delivery_addressFrom');
        $delivery->delivery_addressTo = $request->input('delivery_addressTo');
        $delivery->delivery_description = $request->input('delivery_description');
        $delivery->delivery_status = "P";

        // dd($delivery);
        $delivery->save();

        return redirect()->route('listing.delivery')->with('success', 'Driver has been deleted successfully');
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
