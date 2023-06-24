@extends('layouts.main')

@section('container')
    <main>
        <div class="container-fluid px-4">
            <h3 class="bg-light text-uppercase mt-4 mb-5 rounded p-3 shadow-sm">Registrasi Unit</h3>

            <div class="card mb-4">
                <div class="card-header">

                </div>
                <div class="row ms-1 d-flex justify-content center align-items-center mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end me-10 m-3">
                                <form action="" class="form-inline">
                                    <input class="form-control" type="search" name="search-unit" id="search"
                                        style="width: 250px" placeholder="Search..">
                                </form>
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
                                                    <a class="text-primary text-underline" role="button"
                                                        data-bs-toggle="modal" data-bs-target="#modalnew">New</a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <!-- Modal New -->
    <div class="modal fade" id="modalnew" tabindex="-1" role="dialog" aria-labelledby="modalnewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalnewLabel">
                        <span class="text-danger">New</span> Registration Unit
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
                                    <label for="unitVim" class="col-form-label">No. Rangka<span
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
                                    <input type="text" class="form-control custom-bg-light" id="unitVim"
                                        name="unitVim">
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
    </div>

    <!-- Modal: Edit -->
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel"
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
                                    <label for="unitVim" class="col-form-label">No. Rangka<span
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
                                    <input type="text" class="form-control custom-bg-light" id="unitVim"
                                        name="unitVim">
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
    </div>
@endsection
