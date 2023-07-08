@extends('layouts.main')

@section('container')
{{-- {{ dd() }} --}}
<main>
    <div class="container px-4">
        <div
            class="bg-light text-uppercase d-flex justify-content-between align-items-center mt-4 mb-3 rounded p-3 shadow-sm">
            <h3 class="m-0">Request Status</h3>
            <span class="text-danger">
                <h3>Approval</h3>
            </span>
        </div>

        <hr>
        {{-- Breadcumb --}}
        <div class="ms-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Entries</li>
                    <li class="breadcrumb-item" aria-current="page">Request Status</li>
                    <li class="breadcrumb-item active" aria-current="page">Approval</li>
                </ol>
            </nav>
        </div>
        <hr>

        <div class="row mb-3">
            <div class="col-6">
                {{-- Unit Registration --}}
                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Unit Details
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="unit_code" class="col-3 col-form-label text-end">Kode Unit</label>
                                    <div class="col-3">
                                        <input type="text" class="form-control form-control-sm bg-light" id="unit_id"
                                            name="unit_id" value="{{ $delivery->unit->id }}" hidden>
                                        <input type="text" class="form-control form-control-sm bg-light" id="unit_code"
                                            name="unit_code" value="{{ $delivery->unit->unit_code }}" readonly>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="unit_type" class="col-3 col-form-label text-end">Tipe Unit</label>
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm bg-light" id="unit_type"
                                            name="unit_type" value="{{ $delivery->unit->unit_type }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="unit_license" class="col-3 col-form-label text-end">No.
                                        Polisi</label>
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm bg-light"
                                            id="unit_license" name="unit_license"
                                            value="{{ $delivery->unit->unit_LICENSE }}" readonly>
                                    </div>
                                    <label for="unit_license" class="col-2 col-form-label text-end">Tipe</label>
                                    <div class="col-3">
                                        <input type="text" class="form-control form-control-sm bg-light"
                                            id="unit_license_type" name="unit_license_type"
                                            @switch($delivery->unit->unit_LICENSE_type)
                                        @case('plsk')
                                        value="Polsek"
                                        @break
                                        @case('prvt')
                                        value="Polsek"
                                        @break
                                        @case('smnt')
                                        value="Sementara"
                                        @break
                                        @default

                                        @endswitch
                                        readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="unit_condition" class="col-3 col-form-label text-end">Kondisi
                                        Unit</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm bg-light"
                                            id="unit_condition" name="unit_condition"
                                            @switch($delivery->unit->unit_condition)
                                        @case('used')
                                        value="Second"
                                        @break
                                        @case('new')
                                        value="baru"
                                        @break
                                        @default

                                        @endswitch
                                        readonly>
                                    </div>
                                    <label for="unit_color" class="col-3 col-form-label text-end">Warna Unit</label>
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm bg-light" id="unit_color"
                                            name="unit_color" value="{{ $delivery->unit->unit_color }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="unit_vin" class="col-3 col-form-label text-end">No. Rangka</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm bg-light" id="unit_vin"
                                            name="unit_vin" value="{{ $delivery->unit->unit_VIN }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Driver Details
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-3">
                                    <label for="driver_lname" class="col-sm-3 col-form-label text-end">Last
                                        Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-sm bg-light" id="driver_id"
                                            name="driver_id" hidden value="{{ $delivery->driver->id }}">
                                        <input type="text" class="form-control form-control-sm bg-light"
                                            id="driver_lname" name="driver_lname"
                                            value="{{ $delivery->driver->driver_lname }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="driver_KTP" class="col-sm-3 col-form-label text-end">KTP</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm bg-light" id="driver_KTP"
                                            name="driver_KTP" readonly value="{{ $delivery->driver->driver_KTP }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="driver_email" class="col-sm-3 col-form-label text-end">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control form-control-sm bg-light"
                                            id="driver_email" name="driver_email" readonly
                                            value="{{ $delivery->driver->driver_email }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="driver_stnk" class="col-sm-3 col-form-label text-end">STNK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm bg-light"
                                            id="driver_stnk" name="driver_stnk" readonly
                                            value="{{ $delivery->driver->driver_stnk }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-5">
                                    <label for="driver_phone" class="col-sm-3 col-form-label text-end">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm bg-light"
                                            id="driver_phone" name="driver_phone" readonly
                                            value="{{ $delivery->driver->driver_phone }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-6 h-100">
                {{-- Personal Selection --}}
                <div class="card" style="padding-bottom: 5px;">
                    <div class="card-header">
                        Detail Registration
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="delivery_senderName" class="col-sm-3 col-form-label text-end text-end">Atas
                                Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm bg-light"
                                    id="delivery_senderName" name="delivery_senderName"
                                    value="{{ $delivery->delivery_senderName }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="delivery_bbn" class="col-sm-3 col-form-label text-end">Daerah BBN</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm bg-light" id="delivery_bbn"
                                    name="delivery_bbn" value="{{ $delivery->delivery_bbn }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="delivery_sales" class="col-sm-3 col-form-label text-end">Sales</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm bg-light" id="delivery_sales"
                                    name="delivery_sales" value="{{ $delivery->delivery_sales }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="delivery_spv" class="col-sm-3 col-form-label text-end">Supervisor</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm bg-light" id="delivery_spv"
                                    name="delivery_spv" value="{{ $delivery->delivery_spv }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="unit_selection" class="col-3 col-form-label text-end">Select
                                Unit</label>
                            <div class="col-sm-9">
                                <select class="form-control bg-light" name="unit_selection" id="unit_selection" required
                                    disabled>

                                    @if ($delivery->unit_id != '')
                                    <option value="{{ $delivery->unit_id }}" selected hidden>
                                        {{ $delivery->unit->unit_code . ' - ' . $delivery->unit->unit_type }}
                                    </option>
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->id . '/' . $unit->unit_GUID . '/' . $unit->unit_code }}">
                                        {{ $unit->unit_code . ' - ' . $unit->unit_type }}
                                    </option>
                                    @endforeach
                                    @else
                                    <option value="" selected hidden>Pilih Unit</option>
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->id . '/' . $unit->unit_GUID . '/' . $unit->unit_code }}">
                                        {{ $unit->unit_code . ' - ' . $unit->unit_type }}
                                    </option>
                                    @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group row mb-3">
                            <label for="driver_selection" class="col-sm-3 col-form-label text-end">Select Driver</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="driver_selection" id="driver_selection" required>
                                    <option value="" selected hidden>Pilih Driver</option>
                                    @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id . '/' . $driver->driver_GUID }}">
                                        {{ 'DRV-0' . $driver->id . ' - ' . $driver->driver_lname }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-group row mb-3">
                            <label for="delivery_date" class="col-sm-3 col-form-label text-end">Tanggal
                                Kirim</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm bg-light" id="delivery_date"
                                    name="delivery_date" value="{{ $delivery->delivery_date }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="delivery_addressTo" class="col-sm-3 col-form-label text-end">Alamat
                                Tujuan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm bg-light" id="delivery_addressTo"
                                    name="delivery_addressTo" value="{{ $delivery->delivery_addressTo }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="delivery_custemail" class="col-sm-3 col-form-label text-end">Alamat
                                Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control form-control-sm bg-light"
                                    id="delivery_custemail" name="delivery_custemail"
                                    value="{{ $delivery->delivery_custemail }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="delivery_description" class="col-sm-3 col-form-label text-end">Note</label>
                            <div class="col-sm-9">
                                <textarea class="form-control form-control-sm bg-light" name="delivery_description"
                                    id="delivery_description" cols="1-" rows="4"
                                    readonly>{{ $delivery->delivery_description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row me-1 mb-5">
                        <div class="col-12 d-flex justify-content-end" style="margin-bottom: 68px;">
                            {{-- <button type="submit" class="btn btn-primary me-2" name="BtnSave"
                                id="BtnSave">Save</button>
                            <a class="btn btn-secondary" href="{{ route('listing.delivery') }}" role="button">
                                Close
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                Additional Option
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ route('entries.request.status.update', ['id' => $delivery->id, 'guid' => $delivery->delivery_GUID]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-3">
                                        <label for="delivery_queue" class="col-sm-4 col-form-label text-end">Nomer
                                            Antrian</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                name="delivery_queue" id="delivery_queue" value="{{ $delivery->id }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="driver_selection" class="col-sm-4 col-form-label text-end">Select
                                            Driver</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="driver_selection" id="driver_selection"
                                                required>

                                                @if ($delivery->driver_id != null)
                                                <option
                                                    value="{{ $delivery->driver_id. '/' . $delivery->driver->driver_GUID }}"
                                                    selected hidden>{{ 'DRV-' .
                                                    str_pad($delivery->driver_id, 2,'0', STR_PAD_LEFT) . ' -
                                                    ' . $delivery->driver->driver_lname }}</option>
                                                @foreach ($drivers as $driver)
                                                <option value="{{ $driver->id . '/' . $driver->driver_GUID }}">
                                                    {{ 'DRV-' . str_pad($driver->id, 2, '0', STR_PAD_LEFT) . ' - ' .
                                                    $driver->driver_lname }}
                                                </option>
                                                @endforeach
                                                @else
                                                <option value="" selected hidden>Pilih Driver</option>
                                                @foreach ($drivers as $driver)
                                                <option value="{{ $driver->id . '/' . $driver->driver_GUID }}">
                                                    {{ 'DRV-' . str_pad($driver->id, 2, '0', STR_PAD_LEFT) . ' - ' .
                                                    $driver->driver_lname }}
                                                </option>
                                                @endforeach
                                                @endif


                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="delivery_additional"
                                            class="col-sm-4 col-form-label text-end">Aksesoris
                                            Tambahan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm"
                                                name="delivery_additional" id="delivery_additional"
                                                value="{{ $delivery->delivery_additional }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="delivery_status"
                                            class="col-sm-4 col-form-label text-end">Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="delivery_status"
                                                id="delivery_status">
                                                <option value="{{ $delivery->delivery_status }}" selected hidden>
                                                    @switch($delivery->delivery_status)
                                                    @case('P')
                                                    Pending
                                                    @break

                                                    @case('PSJ')
                                                    Proses Surat Jalan
                                                    @break

                                                    @case('PP')
                                                    Proses PDI
                                                    @break

                                                    @case('PCP')
                                                    Proses cuci dan poles
                                                    @break

                                                    @case('PAK')
                                                    Proses antrian kirim
                                                    @break

                                                    @case('S')
                                                    Proses Kirim
                                                    @break
                                                    @default

                                                    @endswitch
                                                </option>
                                                <option value="PSJ">Proses Surat Jalan</option>
                                                <option value="PP">Proses Pdi</option>
                                                <option value="PCP">Proses cuci dan poles</option>
                                                <option value="PAK">Proses antrian kirim</option>
                                                <option value="S">Proses Kirim</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-success btn-sm me-2" type="submit">Save</button>
                                        <a href="{{ route('listing.request.status') }}"
                                            class="btn btn-outline-danger btn-sm">Close</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>
@endsection