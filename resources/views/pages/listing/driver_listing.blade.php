@extends('layouts.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h3 class="bg-light text-uppercase mt-4 mb-5 rounded p-3 shadow-sm">Registrasi Driver</h3>

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
                                                <button class="btn btn-secondary" type="button" data-bs-target="#modalnew" data-bs-toggle="modal">New</button>
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
                                                    <button class="btn btn-sm btn-light btn-approve" id="btnEdit" data-bs-toggle="modal" data-bs-target="#editmodal-{{ $driver->id }}-{{ $driver->driver_GUID }}">
                                                        <i class="fas fa-pen-to-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger btn-reject" data-bs-toggle="modal" data-bs-target="#modalConf{{ $driver->id }}-{{ $driver->driver_GUID }}">
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

{{-- Modal New --}}
<div class="modal fade" id="modalnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="text-danger">New</span> Registration Driver</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="clearErrors()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('listing.driver.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_sname" class="form-label">Nama Panggilan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('driver_sname')
                                            is-invalid
                                        @enderror" id="driver_sname" name="driver_sname" value="{{ old('driver_sname') }}">
                                @error('driver_sname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_lname" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('driver_lname')
                                        is-invalid
                                    @enderror" id="driver_lname" name="driver_lname" value="{{ old('driver_lname') }}">
                                @error('driver_lname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_KTP" class="form-label">Nomer KTP<span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm custom-bg-light @error('driver_KTP')
                                    is-invalid
                                @enderror" type="text" id="driver_KTP" name="driver_KTP" value="{{ old('driver_KTP') }}">
                                @error('driver_KTP')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_email" class="form-label">E-Mail<span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm custom-bg-light @error('driver_email')
                                    is-invalid
                                @enderror" id="driver_email" name="driver_email" value="{{ old('driver_email') }}">
                                @error('driver_email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_stnk" class="form-label">No. STNK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('driver_stnk')
                                    is-invalid
                                @enderror" id="driver_stnk" name="driver_stnk" value="{{ old('driver_stnk') }}">
                                @error('driver_stnk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_phone" class="form-label">No. Telp<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('driver_phone')
                                    is-invalid
                                @enderror" id="driver_phone" name="driver_phone" value="{{ old('driver_phone') }}">
                                @error('driver_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2" name="BtnNew">Save</button>
                        <button type="button" class="btn btn-secondary" id="closeNewForm" data-bs-dismiss="modal" onclick="clearErrors()">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
@foreach ($drivers as $driver)
<div class="modal fade" id="editmodal-{{ $driver->id }}-{{ $driver->driver_GUID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="text-primary">Edit</span> Registrasi Driver</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearErrors()"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('listing.driver.update', ['id' => $driver->id, 'driver_guid' => $driver->driver_GUID]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_sname" class="form-label">Nama Panggilan
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm @error('driver_sname')
                                            is-invalid
                                        @enderror" id="driver_sname" name="driver_sname" value="{{ old('driver_sname') ? old('driver_sname') : $driver->driver_sname }}">
                                @error('driver_sname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_lname" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('driver_lname')
                                        is-invalid
                                    @enderror" id="driver_lname" name="driver_lname" value="{{ old('driver_lname') ? old('driver_lname') : $driver->driver_lname }}">
                                @error('driver_lname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_KTP" class="form-label">Nomer KTP<span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm @error('driver_KTP')
                                    is-invalid
                                @enderror" type="text" id="driver_KTP" name="driver_KTP" value="{{ old('driver_KTP') ? old('driver_KTP') : $driver->driver_KTP }}">
                                @error('driver_KTP')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_email" class="form-label">E-Mail<span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm @error('driver_email')
                                    is-invalid
                                @enderror" id="driver_email" name="driver_email" value="{{ old('driver_email') ? old('driver_email') : $driver->driver_email }}">
                                @error('driver_email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_stnk" class="form-label">No. STNK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('driver_stnk')
                                    is-invalid
                                @enderror" id="driver_stnk" name="driver_stnk" value="{{ old('driver_stnk') ? old('driver_stnk') : $driver->driver_stnk }}">
                                @error('driver_stnk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="driver_phone" class="form-label">No. Telp<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('driver_phone')
                                    is-invalid
                                @enderror" id="driver_phone" name="driver_phone" value="{{ old('driver_phone') ? old('driver_phone') : $driver->driver_phone }}">
                                @error('driver_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2" name="BtnUpdate">Update</button>
                        <button type="button" class="btn btn-secondary" id="closeNewForm" data-bs-dismiss="modal" onclick="clearErrors()">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Confirmation Delete -->
@foreach ($drivers as $driver)
<div class="modal fade" id="modalConf{{ $driver->id . "-" . $driver->driver_GUID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Important Message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus data unit tersebut?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('listing.driver.delete', ['id' => $driver->id, 'driver_guid' => $driver->driver_GUID]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-success">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@if(session('showModalNew'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('modalnew'));
        modal.show();
    });

</script>


@elseif(session('showModalEdit'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editData = @json(session('editData'));
        console.log(editData);
        if (editData) {
            var modal = new bootstrap.Modal(document.getElementById('editmodal-' + editData.id + '-' + editData.driver_guid));
            modal.show();
        }
    });

</script>
@endif
@endsection
