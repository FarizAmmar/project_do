@extends('layouts.main')

@section('container')
<main>
    <div class="container px-4">
        <div
            class="bg-light text-uppercase d-flex justify-content-between align-items-center mt-4 mb-3 rounded p-3 shadow-sm">
            <h3 class="m-0">Delivery Order</h3>
            <span class="text-danger">
                <h3>New</h3>
            </span>
        </div>

        <hr>
        {{-- Breadcumb --}}
        <div class="ms-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Listing</li>
                    <li class="breadcrumb-item" aria-current="page">Delivery Order</li>
                    <li class="breadcrumb-item active" aria-current="page">Delivery Registration</li>
                </ol>
            </nav>
        </div>
        <hr>

        @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('listing.delivery.store') }}" class="mb-5" method="POST">
            @csrf
            @method('POST')
            <div class="row">
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
                                        <label for="unit_type" class="col-3 col-form-label text-end">Tipe Unit</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="unit_id" name="unit_id" hidden>
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="unit_type" name="unit_type" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="unit_license" class="col-3 col-form-label text-end">No.
                                            Polisi</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="unit_license" name="unit_license" readonly>
                                        </div>
                                        <label for="unit_license" class="col-2 col-form-label text-end">Tipe</label>
                                        <div class="col-3">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="unit_license_type" name="unit_license_type" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        {{-- <label for="unit_condition" class="col-3 col-form-label text-end">Kondisi
                                            Unit</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="unit_condition" name="unit_condition" readonly>
                                        </div> --}}
                                        <label for="unit_color" class="col-3 col-form-label text-end">Warna Unit</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="unit_color" name="unit_color" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="unit_vin" class="col-3 col-form-label text-end">No. Rangka</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="unit_vin" name="unit_vin" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="row mt-3">
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
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="driver_id" name="driver_id" hidden>
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="driver_lname" name="driver_lname" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="driver_KTP" class="col-sm-3 col-form-label text-end">KTP</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="driver_KTP" name="driver_KTP" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="driver_email" class="col-sm-3 col-form-label text-end">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control form-control-sm bg-light"
                                                id="driver_email" name="driver_email" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="driver_stnk" class="col-sm-3 col-form-label text-end">STNK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="driver_stnk" name="driver_stnk" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5">
                                        <label for="driver_phone" class="col-sm-3 col-form-label text-end">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm bg-light"
                                                id="driver_phone" name="driver_phone" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> --}}

                </div>

                <div class="col-6 h-100">
                    {{-- Personal Selection --}}
                    <div class="card">
                        <div class="card-header">
                            Detail Registration
                        </div>
                        <div class="card-body">
                            <!-- Form fields -->
                            <form action="{{ route('listing.delivery.store') }}" method="POST">
                                @csrf

                                <!-- Atas Nama -->
                                <div class="form-group row mb-3">
                                    <label for="delivery_senderName" class="col-sm-3 col-form-label text-end">Atas
                                        Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('delivery_senderName') is-invalid @enderror"
                                            id="delivery_senderName" name="delivery_senderName"
                                            value="{{ old('delivery_senderName') }}">
                                        @error('delivery_senderName')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Daerah BBN -->
                                <div class="form-group row mb-3">
                                    <label for="delivery_bbn" class="col-sm-3 col-form-label text-end">Daerah
                                        BBN</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('delivery_bbn') is-invalid @enderror"
                                            id="delivery_bbn" name="delivery_bbn" value="{{ old('delivery_bbn') }}">
                                        @error('delivery_bbn')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Sales -->
                                <div class="form-group row mb-3">
                                    <label for="delivery_sales" class="col-sm-3 col-form-label text-end">Sales</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('delivery_sales') is-invalid @enderror"
                                            id="delivery_sales" name="delivery_sales"
                                            value="{{ old('delivery_sales') }}">
                                        @error('delivery_sales')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Supervisor -->
                                <div class="form-group row mb-3">
                                    <label for="delivery_spv"
                                        class="col-sm-3 col-form-label text-end">Supervisor</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('delivery_spv') is-invalid @enderror"
                                            id="delivery_spv" name="delivery_spv" value="{{ old('delivery_spv') }}">
                                        @error('delivery_spv')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Select Unit -->
                                <div class="form-group row mb-3">
                                    <label for="unit_selection" class="col-3 col-form-label text-end">Select
                                        Unit</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('unit_selection') is-invalid @enderror"
                                            name="unit_selection" id="unit_selection">
                                            <option value="" selected hidden>Pilih Unit</option>
                                            @foreach ($units as $unit)
                                            <option
                                                value="{{ $unit->id . '/' . $unit->unit_GUID . '/' . $unit->unit_VIN }}">
                                                {{ $unit->unit_type . ' - ' . $unit->unit_VIN }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('unit_selection')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tanggal Kirim -->
                                <div class="form-group row mb-3">
                                    <label for="delivery_date" class="col-sm-3 col-form-label text-end">Tanggal
                                        Kirim</label>
                                    <div class="col-sm-9">
                                        <input type="date"
                                            class="form-control form-control-sm @error('delivery_date') is-invalid @enderror"
                                            id="delivery_date" name="delivery_date" value="{{ old('delivery_date') }}">
                                        @error('delivery_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Alamat Tujuan -->
                                <div class="form-group row mb-3">
                                    <label for="delivery_addressTo" class="col-sm-3 col-form-label text-end">Alamat
                                        Tujuan</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('delivery_addressTo') is-invalid @enderror"
                                            id="delivery_addressTo" name="delivery_addressTo"
                                            value="{{ old('delivery_addressTo') }}">
                                        @error('delivery_addressTo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Alamat Email -->
                                <div class="form-group row mb-3">
                                    <label for="delivery_custemail" class="col-sm-3 col-form-label text-end">Alamat
                                        Email</label>
                                    <div class="col-sm-9">
                                        <input type="email"
                                            class="form-control form-control-sm @error('delivery_custemail') is-invalid @enderror"
                                            id="delivery_custemail" name="delivery_custemail"
                                            value="{{ old('delivery_custemail') }}">
                                        @error('delivery_custemail')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Note -->
                                <div class="form-group row mb-3">
                                    <label for="delivery_description"
                                        class="col-sm-3 col-form-label text-end">Note</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control form-control-sm" name="delivery_description"
                                            id="delivery_description" cols="1-"
                                            rows="4">{{ old('delivery_description') }}</textarea>
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="row me-1 mb-4">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-2" name="BtnSave"
                                            id="BtnSave">Save</button>
                                        <a class="btn btn-secondary" href="{{ route('listing.delivery') }}"
                                            role="button">Close</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
</main>
@endsection