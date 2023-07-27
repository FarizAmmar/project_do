<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Driver;
use App\Models\Request_Status;
use App\Models\Unit;
use Illuminate\Http\Request;

class RequestStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.listing.request_status', [
            'title' => 'Request Status',
            'deliveries' => Delivery::latest()->paginate(6),
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $guid)
    {
        $delivery = Delivery::where('id', $id)
            ->where('delivery_GUID', $guid)
            ->first();

        $units = Unit::all();
        $drivers = Driver::all();

        return view('pages.entries.request_status_entries', [
            'title' => 'Request Entries',
            'units' => $units,
            'drivers' => $drivers,
            'delivery' => $delivery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $guid)
    {
        $delivery = Delivery::where('id', $id)
            ->where('delivery_GUID', $guid)
            ->firstOrFail();

        $drivers = explode('/', $request->input('driver_selection'));

        //Check Driver Record
        $isDriverValid = $this->CheckRecord($drivers[0], $delivery['delivery_date']);

        if (!$isDriverValid) {
            return redirect()->back()->with('warning', 'Oops! It seems like this driver is currently busy with other deliveries. Please consider assigning this delivery to another driver.');
        }

        $status = new Request_Status();

        if ($request->input('btn-approve') == 'A') {

            $delivery->driver_id = $drivers[0];
            $delivery->delivery_submited_by = auth()->user()->name;
            $delivery->delivery_additional = $request->input('delivery_additional');
            $delivery->delivery_status = "A";

            $status->delivery_id = $id;
            $status->status_guid = $guid;
            $status->status_process = "A";

            $status->status_resi = $delivery->unit->unit_VIN;

            $delivery->save();
            $status->save();

            return redirect()->route('listing.request.status')->with('success', 'Record has been submit successfully.');
        } elseif ($request->input('btn-reject') == 'R') {
            $delivery->delivery_status = "R";
            $delivery->save();

            return redirect()->route('listing.request.status')->with('reject', 'Record has been rejected.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function splitData($data)
    {
        $parts = explode('/', $data);
        $frontPart = $parts[0];

        // Lakukan apa pun yang Anda inginkan dengan $frontPart

        return $frontPart;
    }

    private function CheckRecord(int $driver_id, string $date)
    {
        // Hitung jumlah orderan yang sudah diambil oleh driver pada tanggal tertentu
        $drvCount = Delivery::where('driver_id', $driver_id)
            ->where('delivery_date', $date)
            ->count();

        if ($drvCount >= 2) {
            // Jika driver telah mengambil 2 orderan pada tanggal tersebut, kembalikan false
            return false;
        } else {
            // Jika driver belum mengambil 2 orderan pada tanggal tersebut, kembalikan true
            return true;
        }
    }
}
