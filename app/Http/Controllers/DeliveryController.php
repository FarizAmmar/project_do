<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Unit;
use App\Models\User;
use App\Models\Driver;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Models\Request_Status;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeliveryNotificationEmail;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.listing.deliveries_listing', [
            'title' => 'Delivery Order Registration',
            'deliveries' => Delivery::latest()->paginate(6),
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'delivery_senderName' => 'required',
            'unit_selection' => 'required',
            'delivery_bbn' => 'required',
            'delivery_sales' => 'required',
            'delivery_spv' => 'required',
            'delivery_date' => 'required',
            'delivery_addressTo' => 'required',
            'delivery_custemail' => 'required|email',
        ]);

        $isvaliddate = $this->CheckRecord($request->input('delivery_date'));

        if (!$isvaliddate) {
            return redirect()->back()->with('warning', 'Oops! It seems like this date is in high demand! They already have a lot of pending deliveries. Please consider assigning this delivery to another date.');
        }

        $user_id = User::where('username', auth()->user()->username)->first();

        $delivery = new Delivery();
        $delivery->delivery_GUID = fake()->uuid();
        $delivery->unit_id = $request->input('unit_id');
        $delivery->delivery_senderName = $request->input('delivery_senderName');
        // $delivery->delivery_codeUnit = $request->input('unit_code');
        $delivery->delivery_bbn = $request->input('delivery_bbn');
        $delivery->delivery_sales = $request->input('delivery_sales');
        $delivery->delivery_spv = $request->input('delivery_spv');
        $delivery->delivery_date = $request->input('delivery_date');
        $delivery->delivery_addressTo = $request->input('delivery_addressTo');
        $delivery->delivery_custemail = $request->input('delivery_custemail');
        $delivery->delivery_description = $request->input('delivery_description');
        $delivery->delivery_status = "P";

        $delivery->save();

        // Cari Unit
        $unit = Unit::where('id', $delivery->unit_id = $request->input('unit_id'))->first();

        // Kirim email notifikasi
        $data = [
            'delivery_senderName' => $request->input('delivery_senderName'),
            'unit_name' => $unit->unit_type,
            'unit_VIN' => $unit->unit_VIN,
            'delivery_bbn' => $request->input('delivery_bbn'),
            'delivery_sales' => $request->input('delivery_sales'),
            'delivery_spv' => $request->input('delivery_spv'),
            'delivery_date' => $request->input('delivery_date'),
            'delivery_addressTo' => $request->input('delivery_addressTo'),
            'delivery_custemail' => $request->input('delivery_custemail'),
            'delivery_description' => $request->input('delivery_description'),
        ];


        Mail::to($request->input('delivery_custemail'))
            ->send(new DeliveryNotificationEmail($data));

        return redirect()->route('listing.delivery')->with('success', 'Delivery has been added successfully');
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
    public function edit(string $id, string $delivery_GUID)
    {
        $delivery = Delivery::where('id', $id)
            ->where('delivery_GUID', $delivery_GUID)
            ->first();

        $units = Unit::all();

        return view('pages.entries.deliveries_edit_entries', [
            'title' => 'Delivery Registration',
            'units' => $units,
            'delivery' => $delivery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $delivery_GUID)
    {
        // Validasi input
        $request->validate([
            'delivery_senderName' => 'required',
            // 'unit_code' => 'required',
            'delivery_bbn' => 'required',
            'delivery_sales' => 'required',
            'delivery_spv' => 'required',
            'delivery_date' => 'required',
            'delivery_addressTo' => 'required',
            'delivery_custemail' => 'required|email',
        ]);

        // Temukan delivery berdasarkan id dan delivery_GUID
        $delivery = Delivery::where('id', $id)
            ->where('delivery_GUID', $delivery_GUID)
            ->firstOrFail();

        // Update data delivery
        $user_id = User::where('username', auth()->user()->username)->first();

        $delivery->unit_id = $request->input('unit_id');
        $delivery->delivery_senderName = $request->input('delivery_senderName');
        // $delivery->delivery_codeUnit = $request->input('unit_code');
        $delivery->delivery_bbn = $request->input('delivery_bbn');
        $delivery->delivery_sales = $request->input('delivery_sales');
        $delivery->delivery_spv = $request->input('delivery_spv');
        $delivery->delivery_date = $request->input('delivery_date');
        $delivery->delivery_addressTo = $request->input('delivery_addressTo');
        $delivery->delivery_custemail = $request->input('delivery_custemail');
        $delivery->delivery_description = $request->input('delivery_description');
        $delivery->delivery_status = "P";
        $delivery->save();

        return redirect()->route('listing.delivery')->with('success', 'Delivery has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $delivery_GUID)
    {
        $delivery = Delivery::where('id', $id)
            ->where('delivery_GUID', $delivery_GUID)
            ->first();

        $delivery->delete();

        return redirect()->route('listing.delivery')->with('success', 'Delivery has been deleted successfully');
    }

    public function status(Request $request, string $id, string $guid)
    {
        $delivery = Delivery::where('id', $id)
            ->where('delivery_GUID', $guid)
            ->firstOrFail();

        $status = new Request_Status();

        // Update data delivery
        $delivery->delivery_status = $request->input('request_status');
        $status->status_process = $request->input('request_status');

        $status->delivery_id = $id;
        $status->status_guid = $guid;
        $status->status_resi = $request->input('status_resi');

        $delivery->save();
        $status->save();

        return redirect()->route('listing.request.status')->with('success', 'Delivery status has been updated successfully');
    }

    private function CheckRecord(string $date)
    {
        $datetime = Delivery::where('delivery_date', $date)->count();
        if ($datetime > 6) {
            return false;
        }

        return true;
    }
}
