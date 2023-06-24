@extends('layouts.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h3 class="bg-light text-uppercase mt-4 mb-5 rounded p-3 shadow-sm">Registrasi Driver</h3>

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

                                    </tbody>

                                </table>
                                <div class="row">
                                    <div class="col">
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
                    <span class="text-danger">New</span> Registrasi Driver
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
                                <label for="driver_sname" class="col-form-label">Nama Panggilan<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="driver_lname" class="col-form-label">Nama Lengkap<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="driver_KTP" class="col-form-label">KTP<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_sname"
                                    name="driver_sname">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_lname"
                                    name="driver_lname">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_KTP"
                                    name="driver_KTP">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="driver_email" class="col-form-label">Email<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="driver_stnk" class="col-form-label">STNK<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="driver_phone" class="col-form-label">No. Telepon<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_email"
                                    name="driver_email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_stnk"
                                    name="driver_stnk">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_phone"
                                    name="driver_phone">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitBtn">
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
                    <span class="text-danger">Edit</span> Registrasi Driver
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
                                <label for="driver_sname" class="col-form-label">Nama Panggilan<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="driver_lname" class="col-form-label">Nama Lengkap<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="driver_KTP" class="col-form-label">KTP<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_sname"
                                    name="driver_sname">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_lname"
                                    name="driver_lname">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_KTP"
                                    name="driver_KTP">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="driver_email" class="col-form-label">Email<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="driver_stnk" class="col-form-label">STNK<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="driver_phone" class="col-form-label">No. Telepon<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_email"
                                    name="driver_email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_stnk"
                                    name="driver_stnk">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control custom-bg-light" id="driver_phone"
                                    name="driver_phone">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitBtn">
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
