@extends('layouts.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <div
            class="bg-light text-uppercase d-flex justify-content-between align-items-center mt-4 mb-3 rounded p-3 shadow-sm">
            <h3 class="m-0">Delivery Order</h3>
        </div>


        <hr>
        <div class="ms-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Listing</li>
                    <li class="breadcrumb-item active" aria-current="page">Delivery Order</li>
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
                                            <th style="width:20px;">Option</th>
                                            <th rowspan="2" style="vertical-align: middle;">Nama</th>
                                            <th rowspan="2" style="vertical-align: middle;">BBN</th>
                                            <th rowspan="2" style="vertical-align: middle;">Sales</th>
                                            <th rowspan="2" style="vertical-align: middle;">SPV</th>
                                            <th rowspan="2" style="vertical-align: middle;">Tanggal</th>
                                            <th rowspan="2" style="vertical-align: middle;">Address</th>
                                            <th rowspan="2" style="vertical-align: middle;">Email</th>
                                            <th rowspan="2" style="vertical-align: middle;">Deskripsi</th>
                                            <th rowspan="2" style="vertical-align: middle">Status</th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <a href="{{ route('entries.deliveries') }}"
                                                    class="btn btn-secondary btn-sm">New</a>
                                            </th>
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
                                            <td>
                                                @if ($delivery->delivery_status == "P")
                                                <div class="d-flex align-items-center">
                                                    <form
                                                        action="{{ route('entries.deliveries.edit', ['id' => $delivery->id, 'delivery_GUID' => $delivery->delivery_GUID]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button class="btn btn-sm btn-light btn-approve" id="btnEdit"
                                                            type="submit">
                                                            <i class="fas fa-pen-to-square"></i>
                                                        </button>
                                                    </form>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-danger btn-reject"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#confirmModal-{{ $delivery->id }}-{{ $delivery->delivery_GUID }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_senderName }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_bbn }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_sales }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_spv }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_date }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_addressTo }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">{{
                                                $delivery->delivery_custemail }}</td>
                                            <td style="white-space: nowrap; vertical-align: middle;">
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

<!-- Modal Confirmation Delete -->
@foreach ($deliveries as $delivery)
<div class="modal fade" id="confirmModal-{{ $delivery->id }}-{{ $delivery->delivery_GUID }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Important Message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus data record tersebut?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form
                    action="{{ route('entries.deliveries.delete', ['id' => $delivery->id, 'delivery_GUID' => $delivery->delivery_GUID]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection