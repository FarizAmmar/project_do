<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="/home">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-home"></i>
                </div>
                Beranda
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-columns"></i>
                </div>
                Layanan
                <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="#">Admin</a>
                    <a class="nav-link" href="{{ route('listing.unit') }}">Registrasi Unit</a>
                    <a class="nav-link" href="{{ route('listing.driver') }}">Registrasi Driver</a>
                </nav>
            </div> <!-- Perbaikan sidebar -->
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
        </div>
</nav>
