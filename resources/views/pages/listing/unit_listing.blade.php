@extends('layouts.main')

@section('container')
    <main>
        <div class="container-fluid px-4">
            <h3 class="bg-light text-uppercase mt-4 mb-5 rounded p-3 shadow-sm">Registrasi Unit</h3>

            <div id="newCard" style="display: none;">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">New Unit Registration</h5>
                        <form action="{{ route('listing.unit.store') }}" method="POST">
                            @csrf
                            <!-- Ntar taro form di sini -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
                <div class="row ms-1 d-flex justify-content center align-items-center mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end me-10 m-3">

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
                                                    <button class="btn btn-primary" id="newButton">New</button>
                                                </th>
                                                <th>Merk</th>
                                                <th>Model</th>
                                                <th>Tipe</th>
                                                <th>Jenis</th>
                                            </tr>
                                        </thead>

                                        <tbody>
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
                                    <div class="row">
                                        <div class="col">
                                            {{ $units->links() }}
                                        </div>
                                    </div>
                                    <div id="newCard" style="display: none;">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">New Unit Registration</h5>
                                                <form action="{{ route('listing.unit.store') }}" method="POST">
                                                    @csrf
                                                    <!-- Add form fields here -->
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <!-- Modal New -->
    <!-- <div class="modal fade" id="modalnew" tabindex="-1" role="dialog" aria-labelledby="modalnewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalnewLabel">
                        <span class="text-danger">New</span> Registration Unit
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('listing.unit.store') }}" method="POST" id="newForm">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="unitBrand" class="col-form-label">Brand<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitVin" class="col-form-label">No. Rangka<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitType" class="col-form-label">Tipe<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitRegYear" class="col-form-label">Tahun Registrasi<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-control custom-bg-light @error('unitBrand') is-invalid @enderror"
                                        id="unitBrand" name="unitBrand">
                                    @error('unitBrand')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-control custom-bg-light @error('unitVin') is-invalid @enderror"
                                        id="unitVin" name="unitVin">
                                    @error('unitVin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-control custom-bg-light @error('unitType') is-invalid @enderror"
                                        id="unitType" name="unitType">
                                    @error('unitType')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="number"
                                        class="form-control custom-bg-light @error('unitRegYear') is-invalid @enderror"
                                        id="unitRegYear" name="unitRegYear" min="1900" max="2099">
                                    @error('unitRegYear')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="unitCondition" class="col-form-label">Kondisi<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitLicense" class="col-form-label">No. Polisi<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitLicenseType" class="col-form-label">Jenis No. Polisi<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitColor" class="col-form-label">Warna Unit<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <select
                                        class="form-select custom-bg-light @error('unitCondition') is-invalid @enderror"
                                        id="unitCondition" name="unitCondition">
                                        <option value="new" selected>New</option>
                                        <option value="used">Used</option>
                                    </select>
                                    @error('unitCondition')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-control custom-bg-light @error('unitLicense') is-invalid @enderror"
                                        id="unitLicense" name="unitLicense">
                                    @error('unitLicense')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <select
                                        class="form-select custom-bg-light @error('unitLicenseType') is-invalid @enderror"
                                        id="unitLicenseType" name="unitLicenseType">
                                        <option value="prvt">Provit</option>
                                        <option value="plsk">Polsek</option>
                                        <option value="smnt">Sementara</option>
                                    </select>
                                    @error('unitLicenseType')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-control custom-bg-light @error('unitColor') is-invalid @enderror"
                                        id="unitColor" name="unitColor">
                                    @error('unitColor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">
                            Register
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <!-- Modal: Edit -->
    <!-- <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalnewLabel">
                        <span class="text-danger">Edit</span> Registration Unit
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="newForm">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="unitBrand" class="col-form-label">Brand<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitVin" class="col-form-label">No. Rangka<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitType" class="col-form-label">Tipe<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitRegYear" class="col-form-label">Tahun Registrasi<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <input type="text" class="form-control custom-bg-light" id="unitBrand"
                                        name="unitBrand">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control custom-bg-light" id="unitVin"
                                        name="unitVin">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control custom-bg-light" id="unitType"
                                        name="unitType">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control custom-bg-light" id="unitRegYear"
                                        name="unitRegYear" min="1900" max="2099">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="unitCondition" class="col-form-label">Kondisi<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitLicense" class="col-form-label">No. Polisi<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitLicenseType" class="col-form-label">Jenis No. Polisi<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="unitColor" class="col-form-label">Warna Unit<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <select class="form-select custom-bg-light" id="unitCondition" name="unitCondition">
                                        <option value="new" selected>New</option>
                                        <option value="used">Used</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control custom-bg-light" id="unitLicense"
                                        name="unitLicense">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select custom-bg-light" id="unitLicenseType"
                                        name="unitLicenseType">
                                        <option value="Provit">Provit</option>
                                        <option value="Polsek">Polsek</option>
                                        <option value="Sementara">Sementara</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control custom-bg-light" id="unitColor"
                                        name="unitColor">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="submitBtn">
                        Register
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div> -->

@endsection
