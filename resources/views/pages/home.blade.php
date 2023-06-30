@extends('layouts.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col">
                <h3 class="bg-light text-uppercase mt-4 mb-3 rounded p-3 shadow-sm">Dashboard</h3>
                <hr>
                <div class="ms-2">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="/">Home</a></li>
                        </ol>
                    </nav>
                </div>

                <hr>

                <div class="row">
                    @if (auth()->user()->access == 'marketing')
                    <div class="col-md-6">
                        <div class="card mb-4 shadow">
                            <a href="{{ route('listing.unit') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <i class="fas fa-truck me-2"></i>
                                    Units
                                </div>
                            </a>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 shadow">
                            <a href="{{ route('listing.driver') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <i class="fas fa-user me-2"></i>
                                    Drivers
                                </div>
                            </a>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-6">
                        <div class="card mb-4 shadow">
                            <div class="card-body">
                                <i class="fas fa-paperclip me-2"></i>
                                Laporan
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 shadow">
                            <div class="card-body">
                                <i class="fas fa-question me-2"></i>
                                FAQ
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <div class="card bg-light mt-4 mb-3 rounded p-3 shadow-sm">
                    <h5 class="card-title">Notifications</h5>
                    <hr>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="me-2">New Order Received</span>
                                <span class="badge bg-primary rounded-pill">5</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="me-2">New Message</span>
                                <span class="badge bg-primary rounded-pill">3</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="me-2">Upcoming Events</span>
                                <span class="badge bg-primary rounded-pill">2</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</main>
@endsection
