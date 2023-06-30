@extends('layouts.main')

@section('container')
<main id="mainContainer">
    <div class="container-fluid px-4">
        <h3 class="bg-light text-uppercase mt-4 mb-3 rounded p-3 shadow-sm">Registrasi Unit</h3>

        <hr>
        <div class="ms-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Listing</li>
                    <li class="breadcrumb-item active" aria-current="page">Unit</li>
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

        <div class=" card mb-4">
            <div class="row d-flex justify-content-center align-items-center mt-3">
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
                                            <th rowspan="2" style="vertical-align: middle; width: 100px;">Unit Code</th>
                                            <th colspan="2" style="vertical-align: middle;">Brand</th>
                                            <th rowspan="2" style="vertical-align: middle;">Kondisi Unit</th>
                                            <th rowspan="2" style="vertical-align: middle;">No. Rangka</th>
                                            <th colspan="2">No. Polisi</th>
                                            <th rowspan="2" style="vertical-align: middle;">Warna</th>
                                            <th rowspan="2" style="vertical-align: middle;">Tahun Registrasi</th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <button class="btn btn-secondary" type="button" data-bs-target="#modalnew" data-bs-toggle="modal">New</button>
                                            </th>
                                            <th style="vertical-align: middle; width: 150px;">Merk</th>
                                            <th style="vertical-align: middle;">Model</th>
                                            <th style="vertical-align: middle; width: 130px;">No</th>
                                            <th style="vertical-align: middle;">Jenis</th>
                                        </tr>
                                    </thead>

                                    <tbody id="unitTableBody">
                                        @foreach ($units as $unit)
                                        <tr>
                                            <td class="align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <button class="btn btn-sm btn-light btn-approve" id="btnEdit" data-bs-toggle="modal" data-bs-target="#editmodal-{{ $unit->id }}-{{ $unit->unit_GUID }}">
                                                        <i class="fas fa-pen-to-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger btn-reject" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $unit->id }}-{{ $unit->unit_GUID }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>{{ $unit->unit_code }}</td>
                                            <td>{{ $unit->unit_brand }}</td>
                                            <td>{{ $unit->unit_type }}</td>
                                            <td>
                                                @switch($unit->unit_condition)
                                                @case('new')
                                                Baru
                                                @break
                                                @case('used')
                                                Second
                                                @break
                                                @default

                                                @endswitch
                                            </td>
                                            <td>{{ $unit->unit_VIN }}</td>
                                            <td>{{ $unit->unit_LICENSE }}</td>
                                            <td>
                                                @switch($unit->unit_LICENSE_type)
                                                @case('prvt')
                                                Provit
                                                @break
                                                @case('plsk')
                                                Polsek
                                                @break
                                                @case('smnt')
                                                Sementara
                                                @break
                                                @default
                                                @endswitch
                                            </td>
                                            <td>{{ $unit->unit_color }}</td>
                                            <td>{{ $unit->unit_RegYear }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div>
                                {{ $units->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Modal Confirmation Delete -->
@foreach ($units as $unit)
<div class="modal fade" id="confirmModal-{{ $unit->id }}-{{ $unit->unit_GUID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('listing.unit.delete', ['id' => $unit->id, 'unit_guid' => $unit->unit_GUID]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-success">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Edit --}}
@foreach ($units as $unit)
<div class="modal fade" id="editmodal-{{ $unit->id }}-{{ $unit->unit_GUID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="text-primary">Edit</span> Registrasi Unit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearErrors()"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('listing.unit.update', ['id' => $unit->id, 'unit_guid' => $unit->unit_GUID]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_brand" class="form-label">Merk<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('unit_brand')
                                        is-invalid
                                    @enderror" id="unit_brand" name="unit_brand" value="{{ old('unit_brand') ? old('unit_brand') : $unit->unit_brand }}">
                                @error('unit_brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_type" class="form-label">Model<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('unit_type')
                                    is-invalid
                                @enderror" id="unit_type" name="unit_type" value="{{ old('unit_type') ? old('unit_type') : $unit->unit_type }}">
                                @error('unit_type')
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
                                <label for="unit_condition" class="form-label">Kondisi Unit<span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm @error('unit_condition')
                                    is-invalid
                                @enderror" id="unit_condition" name="unit_condition">
                                    @if (old('unit_type'))
                                    <option value="{{ old('unit_type') }}" selected hidden>{{ old('unit_type') == 'new' ? 'Baru' : 'Second' }}</option>
                                    @elseif ($unit->unit_condition)
                                    <option value="{{ $unit->unit_condition }}" selected hidden>{{ $unit->unit_condition == 'new' ? 'Baru' : 'Second' }}</option>
                                    @else
                                    <option value="" hidden>Pilih Kondisi Unit</option>
                                    @endif
                                    <option value="new">Baru</option>
                                    <option value="used">Second</option>
                                </select>
                                @error('unit_condition')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_VIN" class="form-label">No. Rangka<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('unit_VIN')
                                    is-invalid
                                @enderror" id="unit_VIN" name="unit_VIN" value="{{ old('unit_VIN') ? old('unit_VIN'): $unit->unit_VIN  }}" oninput="this.value = this.value.toUpperCase()">
                                @error('unit_VIN')
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
                                <label for="unit_LICENSE" class="form-label">No. Polisi<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('unit_LICENSE')
                                    is-invalid
                                @enderror" id="unit_LICENSE" name="unit_LICENSE" value="{{ old('unit_LICENSE') ? old('unit_LICENSE') : $unit->unit_LICENSE }}" oninput="this.value = this.value.toUpperCase()">
                                @error('unit_LICENSE')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_LICENSE_type" class="form-label">Jenis No. Polisi<span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm @error('unit_LICENSE_type')
                                    is-invalid
                                @enderror" id="unit_LICENSE_type" name="unit_LICENSE_type">
                                    @if (old('unit_LICENSE') )
                                    <option value="{{ old('unit_LICENSE') }}" selected hidden>
                                        @switch(old('unit_LICENSE'))
                                        @case('prvt')
                                        Provit
                                        @break
                                        @case('plsk')
                                        Polsek
                                        @break
                                        @case('smnt')
                                        Sementara
                                        @break
                                        @default
                                        @endswitch
                                    </option>
                                    @elseif ($unit->unit_LICENSE_type)
                                    <option value="{{ $unit->unit_LICENSE_type }}" selected hidden>
                                        @switch($unit->unit_LICENSE_type)
                                        @case('prvt')
                                        Provit
                                        @break
                                        @case('plsk')
                                        Polsek
                                        @break
                                        @case('smnt')
                                        Sementara
                                        @break
                                        @default
                                        @endswitch
                                    </option>
                                    @else
                                    <option value="" hidden>Pilih Jenis No. Polisi</option>
                                    @endif
                                    <option value="prvt">Provit</option>
                                    <option value="plsk">Polsek</option>
                                    <option value="smnt">Sementara</option>
                                </select>
                                @error('unit_LICENSE_type')
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
                                <label for="unit_color" class="form-label">Warna<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('unit_color')
                                    is-invalid
                                @enderror" id="unit_color" name="unit_color" value="{{ old('unit_color') ? old('unit_color') : $unit->unit_color }}">
                                @error('unit_color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_RegYear" class="form-label">Tahun Registrasi<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('unit_RegYear')
                                    is-invalid
                                @enderror" id="unit_RegYear" name="unit_RegYear" value="{{ old('unit_RegYear') ? old('unit_RegYear') : $unit->unit_RegYear }}">
                                @error('unit_RegYear')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2" name="BtnUpdate">Update</button>
                            <button type="button" class="btn btn-secondary" id="closeFormEdit" data-bs-dismiss="modal" onclick="clearErrors()">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Modal New --}}
<div class="modal fade" id="modalnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="text-danger">New</span> Registration Unit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="clearErrors()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('listing.unit.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="unit_code" class="form-label">Unit Code</label>
                                <input class="form-control form-control-sm bg-light" type="text" name="unit_code" id="unit_code" value="{{ "UNT-" . fake()->unique()->randomNumber(4) }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_brand" class="form-label">Merk<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('unit_brand')
                                            is-invalid
                                        @enderror" id="unit_brand" name="unit_brand" value="{{ old('unit_brand') }}">
                                @error('unit_brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_type" class="form-label">Model<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('unit_type')
                                        is-invalid
                                    @enderror" id="unit_type" name="unit_type" value="{{ old('unit_type') }}">
                                @error('unit_type')
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
                                <label for="unit_condition" class="form-label">Kondisi Unit<span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm custom-bg-light @error('unit_condition')
                                    is-invalid
                                @enderror" id="unit_condition" name="unit_condition">
                                    @if (old('unit_condition'))
                                    <option value="{{ old('unit_condition') }}" selected hidden>{{ old('unit_condition') == 'new' ? 'Baru' : 'Second' }}</option>
                                    @else
                                    <option value="" hidden>Pilih Kondisi Unit</option>
                                    @endif
                                    <option value="new">Baru</option>
                                    <option value="used">Second</option>
                                </select>
                                @error('unit_condition')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_VIN" class="form-label">No. Rangka<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('unit_VIN')
                                    is-invalid
                                @enderror" id="unit_VIN" name="unit_VIN" value="{{ old('unit_VIN') }}">
                                @error('unit_VIN')
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
                                <label for="unit_LICENSE" class="form-label">No. Polisi<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('unit_LICENSE')
                                    is-invalid
                                @enderror" id="unit_LICENSE" name="unit_LICENSE" value="{{ old('unit_LICENSE') }}">
                                @error('unit_LICENSE')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_LICENSE_type" class="form-label">Jenis No. Polisi<span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm custom-bg-light @error('unit_LICENSE_type')
                                    is-invalid
                                @enderror" id="unit_LICENSE_type" name="unit_LICENSE_type">
                                    @if (old('unit_LICENSE_type'))
                                    <option value="{{ old('unit_LICENSE_type') }}" selected hidden>
                                        @switch(old('unit_LICENSE_type'))
                                        @case('prvt')
                                        Provit
                                        @break
                                        @case('plsk')
                                        Polsek
                                        @break
                                        @case('smnt')
                                        Sementara
                                        @break
                                        @default
                                        @endswitch
                                    </option>
                                    @else
                                    <option value="" hidden>Pilih Jenis No. Polisi</option>
                                    @endif
                                    <option value="prvt">Provit</option>
                                    <option value="plsk">Polsek</option>
                                    <option value="smnt">Sementara</option>
                                </select>
                                @error('unit_LICENSE_type')
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
                                <label for="unit_color" class="form-label">Warna<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('unit_color')
                                    is-invalid
                                @enderror" id="unit_color" name="unit_color" value="{{ old('unit_color') }}">
                                @error('unit_color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unit_RegYear" class="form-label">Tahun Registrasi<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm custom-bg-light @error('unit_RegYear')
                                    is-invalid
                                @enderror" id="unit_RegYear" name="unit_RegYear" value="{{ old('unit_RegYear') }}">
                                @error('unit_RegYear')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2" name="BtnNew">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearErrors()">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
        if (editData) {
            var modal = new bootstrap.Modal(document.getElementById('editmodal-' + editData.id + '-' + editData.unit_guid));
            modal.show();
        }
    });

</script>

@endif
@endsection
