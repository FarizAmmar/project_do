<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Request_Status;
use App\Models\Unit;
use Illuminate\Http\Request;

class ResiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Mengirim data ke view untuk ditampilkan
        return view('pages.resi', [
            'title' => 'Search Resi',
            'info' => null,
        ]);
    }

    public function search(Request $request)
    {
        $no_vin = $request->input('no_vin');

        $unit = Unit::where('unit_VIN', $no_vin)->first();

        if ($unit != null) {

            $info = Delivery::where('unit_id', $unit->id)->first();

            $track = Request_Status::where('status_resi', $no_vin)->get();

            if ($info != null) {
                return view('pages.resi', [
                    'title' => 'Search Resi',
                    'info' => $info,
                    'tracks' => $track,
                ]);
            }
        }


        return redirect()->route('resi.search')->with('failed', 'No records found.');
    }
}
