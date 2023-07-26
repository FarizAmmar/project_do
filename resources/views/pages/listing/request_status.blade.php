@extends('layouts.main')

@section('container')
<main>

    <div class="container-fluid px-4">
        <div
            class="bg-light text-uppercase d-flex justify-content-between align-items-center mt-4 mb-3 rounded p-3 shadow-sm">
            <h3 class="m-0">Request Status</h3>
        </div>


        <hr>
        <div class="ms-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Listing</li>
                    <li class="breadcrumb-item active" aria-current="page">Request Status</li>
                </ol>
            </nav>
        </div>
        <hr>

        {{-- Success Alert --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session('reject'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('reject') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card mb-4">
            <div class="row ms-1 d-flex justify-content center align-items-center mt-3">
                <div class="row text-center">
                    <div class="col-12">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-bordered table-striped table">
                                    <thead>
                                        <tr>
                                            <th style="width:20px;">Details</th>
                                            <th style="vertical-align: middle;">Nama</th>
                                            <th style="vertical-align: middle;">BBN</th>
                                            <th style="vertical-align: middle;">Sales</th>
                                            <th style="vertical-align: middle;">SPV</th>
                                            <th style="vertical-align: middle;">Driver</th>
                                            <th style="vertical-align: middle;">Tanggal</th>
                                            <th style="vertical-align: middle;">Address</th>
                                            <th style="vertical-align: middle;">Email</th>
                                            <th style="vertical-align: middle;">Deskripsi</th>
                                            <th style="vertical-align: middle">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($deliveries->count() == 0)
                                        <tr>
                                            <td colspan="10">
                                                No items found
                                            </td>
                                        </tr>
                                        @else
                                        @foreach ($deliveries as $delivery)
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    @if ($delivery->delivery_status == "P")
                                                    <form
                                                        action="{{ route('entries.request.status', ['id' => $delivery->id, 'guid' => $delivery->delivery_GUID]) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button class="btn btn-sm btn-light btn-approve" id="btnEdit"
                                                            type="submit">
                                                            <i class="far fa-sticky-note"></i>
                                                        </button>
                                                    </form>
                                                    @elseif ($delivery->delivery_status == "R")
                                                    -
                                                    @else
                                                    <button class="btn btn-outline-warning btn-sm" type="button"
                                                        name="BtnStatus" data-bs-toggle="modal"
                                                        data-bs-target="#StatusModal-{{ $delivery->id }}-{{ $delivery->delivery_GUID }}">
                                                        Status
                                                    </button>
                                                    @endif
                                                    {{-- <button type="button"
                                                        class="btn btn-sm btn-outline-danger btn-reject"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#confirmModal-{{ $delivery->id }}-{{ $delivery->delivery_GUID }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button> --}}
                                                </div>
                                            </td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_senderName }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_bbn }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_sales }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_spv }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">
                                                {{ $delivery->driver ? $delivery->driver->driver_lname : '-' }}
                                            </td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_date }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_addressTo }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_custemail }}</td>
                                            <td>
                                                <button class="btn btn-outline-dark btn-sm" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#notesModal{{ $delivery->id . '-' . $delivery->delivery_GUID }}"">
                                                                <i class=" fas fa-sticky-note"></i>
                                                </button>
                                            </td>
                                            <td style="white-space: nowrap; vertical-align: middle;">
                                                @switch($delivery->delivery_status)
                                                @case('P')
                                                <span class="btn btn-danger btn-sm">Pending</span>
                                                @break

                                                @case('PSJ')
                                                <span class="btn btn-info btn-sm">Proses Surat Jalan</span>
                                                @break

                                                @case('PP')
                                                <span class="btn btn-info btn-sm">Proses PDI</span>
                                                @break

                                                @case('PCP')
                                                <span class="btn btn-info btn-sm">Proses cuci dan poles</span>
                                                @break

                                                @case('PAK')
                                                <span class="btn btn-info btn-sm">Proses antrian kirim</span>
                                                @break

                                                @case('S')
                                                <span class="btn btn-info btn-sm">Proses Kirim</span>
                                                @break

                                                @case('A')
                                                <span class="btn btn-success btn-sm">Approve</span>
                                                @break

                                                @case('R')
                                                <span class="btn btn-danger btn-sm">Rejected</span>
                                                @break
                                                @default

                                                @endswitch
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>

                                </table>
                                <div class="row">
                                    <div class="col">
                                        {{ $deliveries->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<!-- Modal Note -->
@foreach ($deliveries as $delivery)
<div class="modal fade" id="notesModal{{ $delivery->id . '-' . $delivery->delivery_GUID }}" tabindex="-1"
    aria-labelledby="notesModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="notesModal">Note</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <textarea class="form-control form-control-sm bg-light" name="notes" id="notes" cols="15"
                            rows="3" readonly>{{ $delivery->delivery_description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Statu -->
@foreach ($deliveries as $delivery)
<div class="modal fade" id="StatusModal-{{ $delivery->id }}-{{ $delivery->delivery_GUID }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">STATUS OPTION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form
                action="{{ route('entries.deliveries.status', ['id' => $delivery->id, 'delivery_GUID' => $delivery->delivery_GUID]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <label for="status_resi" class="col-sm-3 col-form-label text-end">No. Rangka</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm bg-light" type="text" name="status_resi"
                                id="status_resi" value="{{ $delivery->unit->unit_VIN }}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label for="request_status" class="col-sm-3 col-form-label text-end">Status</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="request_status" id="request_status">
                                <option value="{{ $delivery->delivery_status }}" selected hidden>
                                    @switch($delivery->delivery_status)
                                    @case('A')
                                    Approve
                                    @break

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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>


                    <button type="submit" class="btn btn-outline-success btn-sm">Changes</button>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach
@endsection