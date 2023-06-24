@extends('layouts.main')

@section('container')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            {{-- <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ini biar rame aja</li>
            </ol> --}}
            <div class="row mx-auto">
                <div class="col-xl-5 col-md-6">
                    <div class="card bg-text-white mb-4 shadow">
                        <a href="{{ route('listing.unit') }}" class="text-decoration-none text-black">
                            <div class="card-body"><i class="fas fa-truck mx-1"></i>Unit</div>
                        </a>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="card bg-text-white mb-4 shadow">
                        <a href="{{ route('listing.unit') }}" class="text-decoration-none text-black">
                            <div class="card-body"><i class="fas fa-user mx-1"></i>Admin</div>
                        </a>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="card bg-text-white mb-4 shadow">
                        <div class="card-body"><i class="fas fa-paperclip mx-1"></i>Laporan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="card bg-text-white mb-4 shadow">
                        <div class="card-body"><i class="fas fa-question mx-1"></i>FAQ</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!-- Pop-up Modal -->
    <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteModalLabel">
                        Catatan Pengiriman
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Input Baru:</h6>
                    <form id="inputForm">
                        <div class="mb-3">
                            <label for="courierName" class="form-label">Nama Kurir</label>
                            <input type="text" class="form-control" id="courierName" required />
                        </div>
                        <div class="mb-3">
                            <label for="additionalAccessories" class="form-label">Aksesoris Tambahan</label>
                            <input type="text" class="form-control" id="additionalAccessories" required />
                        </div>
                        <div class="mb-3">
                            <label for="trackingNumber" class="form-label">No. Resi</label>
                            <input type="text" class="form-control" id="trackingNumber" required />
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" required readonly>
                                <option value="Dalam Pengiriman">Dalam Pengiriman</option>
                                <option value="Sampai Tujuan">Sampai Tujuan</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submitBtn">
                        Submit
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Approve -->
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">
                        Lanjutkan Pengiriman?
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="handleApprove()">
                        Iya
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Reject -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered align-item-start" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Tolak?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="handleReject()">
                        Iya
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
