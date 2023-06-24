@extends('layouts.main')

@section('container')
    <main>
        <div class="container-fluid px-4">
            <h3 class="bg-light text-uppercase mt-4 mb-5 rounded p-3 shadow-sm">Registrasi Unit</h3>
            <div id="newCard" style="display: none;">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">New Unit Registration</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <form id="unitForm">
                                    <div class="mb-3">
                                        <label for="unit_brand" class="form-label">Merk<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-bg-light" id="unit_brand" name="unit_brand" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="unit_type" class="form-label">Model<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-bg-light" id="unit_type" name="unit_type" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="unit_condition" class="form-label">Kondisi Unit<span class="text-danger">*</span></label>
                                        <select class="form-control custom-bg-light" id="unit_condition" name="unit_condition" required>
                                            <option value="">Pilih Kondisi Unit</option>
                                            <option value="New">New</option>
                                            <option value="Second">Second</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="unit_VIN" class="form-label">No. Rangka<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-bg-light" id="unit_VIN" name="unit_VIN" required>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form id="unitForm">
                                    <div class="mb-3">
                                        <label for="unit_LICENSE" class="form-label">No. Polisi<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-bg-light" id="unit_LICENSE" name="unit_LICENSE" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="unit_LICENSE_type" class="form-label">Jenis No. Polisi<span class="text-danger">*</span></label>
                                        <select class="form-control custom-bg-light" id="unit_LICENSE_type" name="unit_LICENSE_type" required>
                                            <option value="">Pilih Jenis No. Polisi</option>
                                            <option value="Provit">Provit</option>
                                            <option value="Polsek">Polsek</option>
                                            <option value="Sementara">Sementara</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="unit_color" class="form-label">Warna<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-bg-light" id="unit_color" name="unit_color" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="unit_RegYear" class="form-label">Tahun Registrasi<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-bg-light" id="unit_RegYear" name="unit_RegYear" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                                        <button type="button" class="btn btn-secondary float-end ms-2" id="closeForm">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="row ms-1 d-flex justify-content-center align-items-center mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end m-3">

                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-bordered table-striped table">
                                        <thead>
                                            <tr>
                                                <th>Option</th>
                                                <th colspan="2">Brand</th>
                                                <th rowspan="2" style="vertical-align: middle;">Kondisi Unit</th>
                                                <th rowspan="2" style="vertical-align: middle;">No. Rangka</th>
                                                <th colspan="2">No. Polisi</th>
                                                <th rowspan="2" style="vertical-align: middle;">Warna</th>
                                                <th rowspan="2" style="vertical-align: middle;">Tahun Registrasi</th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <button class="btn btn-secondary" id="newButton">New</button>
                                                </th>
                                                <th>Merk</th>
                                                <th>Model</th>
                                                <th>Tipe</th>
                                                <th>Jenis</th>
                                            </tr>
                                        </thead>

                                        <tbody id="unitTableBody">
                                            @foreach ($units as $unit)
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
                                                    <td>{{ $unit->unit_brand }}</td>
                                                    <td>{{ $unit->unit_type }}</td>
                                                    <td>{{ $unit->unit_condition }}</td>
                                                    <td>{{ $unit->unit_VIN }}</td>
                                                    <td>{{ $unit->unit_LICENSE }}</td>
                                                    <td>{{ $unit->unit_LICENSE_type }}</td>
                                                    <td>{{ $unit->unit_color }}</td>
                                                    <td>{{ $unit->unit_RegYear }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
@endsection
