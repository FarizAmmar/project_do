<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery Order | {{ $title }}</title>

    {{-- CSS Bundle --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    @switch($title)
        @case($title == 'Login')
            {{-- Login CSS --}}
            <link rel="stylesheet" href="/assets/css/login.css">
        @break

        @case($title != 'Login')
            {{-- Style CSS --}}
            <link rel="stylesheet" href="/assets/css/styles.css">
        @break
    @endswitch
</head>

<body class="sb-nav-fixed">

    @if ($title == 'Login')
        <div class="container-fluid">
            @yield('login-container')
        </div>
    @elseif ($title != 'Login')
        @include('partials.navbar')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('partials.sidebar')
            </div>
            <div id="layoutSidenav_content">
                @yield('container')
                @include('partials.footer')
            </div>
        </div>
    @endif

    {{-- Javascript Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    {{-- Javascript --}}
    <script src="/assets/js/datatables.js"></script>
    <script src="/assets/js/registrasi.js"></script>
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/tindakan.js"></script>
    <script src="/assets/js/driver.js"></script>
</body>

</html>
