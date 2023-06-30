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
                                                <th>Option</th>
                                                <th rowspan="2" style="vertical-align: middle;">Nama</th>
                                                <th rowspan="2" style="vertical-align: middle;">BBN</th>
                                                <th rowspan="2" style="vertical-align: middle;">Sales</th>
                                                <th rowspan="2" style="vertical-align: middle;">SPV</th>
                                                <th rowspan="2" style="vertical-align: middle;">Tanggal</th>
                                                <th colspan="2" style="vertical-align: middle;">Address</th>
                                                <th rowspan="2" style="vertical-align: middle;">Deskripsi</th>
                                                <th rowspan="2" style="vertical-align: middle">Status</th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <a href="{{ route('entries.deliveries') }}"
                                                        class="btn btn-secondary">New</a>
                                                </th>
                                                <th style="vertical-align: middle">Asal</th>
                                                <th style="vertical-align: middle">Tujuan</th>
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
                                                            <button class="btn btn-sm btn-light btn-approve" id="btnEdit">
                                                                <i class="fas fa-pen-to-square"></i>
                                                            </button>
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-danger btn-reject">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                        <td>{{ $delivery->delivery_senderName }}</td>
                                                        <td>{{ $delivery->delivery_bbn }}</td>
                                                        <td>{{ $delivery->delivery_sales }}</td>
                                                        <td>{{ $delivery->delivery_spv }}</td>
                                                        <td>{{ $delivery->delivery_date }}</td>
                                                        <td>{{ $delivery->delivery_addressFrom }}</td>
                                                        <td>{{ $delivery->delivery_addressTo }}</td>
                                                        <td>{{ $delivery->delivery_description }}</td>
                                                        <td>
                                                            @switch($delivery->delivery_status)
                                                                @case('P')
                                                                    Pending
                                                                @break

                                                                @case('A')
                                                                    Approve
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
@endsection
