@extends('layouts.main')

@section('container')
    <main>
        <div class="container-fluid px-4">
            <h3 class="bg-light text-uppercase mt-4 mb-5 rounded p-3 shadow-sm">Registrasi Driver</h3>

            <div class="card mb-4">
                <div class="row ms-1 d-flex justify-content center align-items-center mt-3">
                    <div class="row text-center">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-bordered table-striped mt-4 table">
                                        <thead>
                                            <tr>
                                                <th>Option</th>
                                                <th colspan="2">Nama</th>
                                                <th rowspan="2" style="vertical-align: middle;">KTP</th>
                                                <th rowspan="2" style="vertical-align: middle;">Email</th>
                                                <th rowspan="2" style="vertical-align: middle;">STNK</th>
                                                <th rowspan="2" style="vertical-align: middle;">No. Telp</th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <a class="text-primary text-underline" role="button"
                                                        data-bs-toggle="modal" data-bs-target="#modalnew">New</a>
                                                </th>
                                                <th>Panggilan</th>
                                                <th>Lengkap</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($drivers as $driver)
                                                <tr>
                                                    <td class="align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <button type="button" class="btn btn-sm btn-light btn-approve"
                                                                data-bs-toggle="modal" data-bs-target="#approveModal">
                                                                <i class="fas fa-pen-to-square"></i>
                                                            </button>
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-danger btn-reject"
                                                                data-bs-toggle="modal" data-bs-target="#rejectModal">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>{{ $driver->driver_sname }}</td>
                                                    <td>{{ $driver->driver_lname }}</td>
                                                    <td>{{ $driver->driver_KTP }}</td>
                                                    <td>{{ $driver->driver_email }}</td>
                                                    <td>{{ $driver->driver_stnk }}</td>
                                                    <td>{{ $driver->driver_phone }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    <div class="row">
                                        <div class="col">
                                            {{ $drivers->links() }}
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
