@extends('layouts.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <div class="row mt-3">
            <div class="col">
                <div class="ms-2">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Layanan</li>
                        </ol>
                    </nav>
                </div>

                <hr>

                <div class="row">
                    @if (auth()->user()->access == 'marketing')
                    <div class="col-md-2">
                        <div class="card mb-4 shadow">
                            <a href="{{ route('listing.unit') }}" class="text-decoration-none text-dark">
                                <div class="card-body">
                                    <i class="fas fa-truck me-2"></i>
                                    Units
                                </div>
                            </a>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mb-4 shadow">
                            <a href="{{ route('listing.delivery') }}" class="text-decoration-none text-dark">
                                <div class="card-body">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Delivery Order
                                </div>
                            </a>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    @elseif(auth()->user()->access == 'admin')
                    <div class="col-md-2">
                        <div class="card mb-4 shadow">
                            <a href="{{ route('listing.driver') }}" class="text-decoration-none text-dark">
                                <div class="card-body">
                                    <i class="fas fa-user me-2"></i>
                                    Drivers
                                </div>
                            </a>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mb-4 shadow">
                            <a href="{{ route('listing.request.status') }}" class="text-decoration-none text-dark">
                                <div class="card-body">
                                    <i class="fas fa-code-pull-request me-2"></i>
                                    Request Status
                                </div>
                            </a>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
