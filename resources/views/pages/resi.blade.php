@extends('layouts.main')

@section('container')
{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="navbar-brand">
                    Sistem Pengiriman Unit
                </div>
            </div>
        </div>
        <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
    </div>
</nav>

{{-- Form --}}
<div class="container-fluid">
    @if (session('failed'))
    <div class="alert alert-danger alert-dismissible mt-3 mb-3 fade show" role="alert">
        <strong>{{ session('failed') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row mt-5">
        <div class="col-2">
            <form action="{{ route('search.resi') }}" method="POST">
                @csrf
                @method('POST')
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" name="no_vin"
                        placeholder="Masukan nomer rangka" value="{{ old('no_vin') }}">
                    <button class="btn btn-dark btn-sm" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Status Pesanan</h5>
                    <hr>
                    <div class="row mt-4">
                        @if ($info != null)
                        <div class="col-5">
                            <form>
                                <div class="row mb-3">
                                    <label for="delivery_codeUnit"
                                        class="col-sm-3 col-form-label col-form-label-sm text-end">Code Unit</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" id="delivery_codeUnit"
                                            readonly value="{{ $info->delivery_codeUnit }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="delivery_senderName"
                                        class="col-sm-3 col-form-label col-form-label-sm text-end">Atas Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control form-control-sm" id="delivery_senderName"
                                            readonly value="{{ $info->delivery_senderName }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="unit_type"
                                        class="col-sm-3 col-form-label col-form-label-sm text-end">Tipe Unit</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" id="unit_type" readonly
                                            value="{{ $info->unit->unit_type }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="delivery_senderName"
                                        class="col-sm-3 col-form-label col-form-label-sm text-end">Supervisor</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control form-control-sm" id="delivery_senderName"
                                            readonly value="{{ $info->delivery_spv }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="delivery_senderName"
                                        class="col-sm-3 col-form-label col-form-label-sm text-end">Sales</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control form-control-sm" id="delivery_senderName"
                                            readonly value="{{ $info->delivery_sales }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="delivery_date"
                                        class="col-sm-3 col-form-label col-form-label-sm text-end">Tanngal Kirim</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control form-control-sm" id="delivery_date"
                                            readonly value="{{ $info->delivery_date }}">
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-6">
                            <ul class="list-group">
                                @foreach ($tracks as $track)
                                <li class="list-group-item">
                                    <strong>Tanggal:</strong>
                                    {{ $track->created_at }}
                                    <br>
                                    <strong>Status:</strong>
                                    @switch($track->status_process)
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

                                    @case('A')
                                    Approve
                                    @break
                                    @default

                                    @endswitch
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        <hr class="mb-5">
                        <div class="d-flex justify-content-center">
                            <div class="alert alert-dark text-center w-100" role="alert">
                                Cari untuk menampilkan pesanan anda
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection