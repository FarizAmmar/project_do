<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery Order | {{ $title }}</title>

    {{-- CSS Bundle --}}
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
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
    @elseif ($title == 'Search Resi')
    @yield('container')
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Javascript --}}
    <script src="/assets/js/scripts.js"></script>

    {{-- Clear session error --}}
    <script>
        function clearErrors() {
            window.location.href = '/clear-errors';
        }

    </script>

    {{-- Selection Unit --}}
    <script>
        $(document).ready(function() {
            $('#unit_selection').select2({
                theme: 'bootstrap-5'
                , width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
                , placeholder: $(this).data('placeholder')
                , selectionCssClass: 'select2--small bg-light'
                , dropdownCssClass: 'select2--small bg-light',

            });
            $('#driver_selection').select2({
                theme: 'bootstrap-5'
                , width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
                , placeholder: $(this).data('placeholder')
                , selectionCssClass: 'select2--small'
                , dropdownCssClass: 'select2--small',

            });

            $('#unit_selection').on('change', function() {
                var selectedOption = $(this).val();
                var selectedData = selectedOption.split('/');

                var id = selectedData[0];
                var unit_GUID = selectedData[1];
                var unit_code = selectedData[2];

                if (selectedOption !== '') {
                    $.get('/get-unit/' + id + '/' + unit_GUID + '/' + unit_code, function(response) {
                        var unitLicenseType = response.unit_LICENSE_type;
                        var unitLicenseTypeText = '';

                        switch (unitLicenseType) {
                            case 'smnt':
                                unitLicenseTypeText = 'Sementara';
                                break;
                            case 'prvt':
                                unitLicenseTypeText = 'Provit';
                                break;
                            case 'plsk':
                                unitLicenseTypeText = 'Polsek';
                                break;
                            default:
                                unitLicenseTypeText = '';
                                break;
                        }

                        var unitCondition = response.unit_condition;
                        var unitConditionText = '';

                        switch (unitCondition) {
                            case 'used':
                                unitConditionText = 'Second';
                                break;
                            case 'new':
                                unitConditionText = 'Baru';
                                break;
                            default:
                                unitConditionText = '';
                                break;
                        }

                        $('#unit_id').val(response.id);
                        $('#unit_code').val(response.unit_code);
                        $('#unit_type').val(response.unit_type);
                        $('#unit_license').val(response.unit_LICENSE);
                        $('#unit_license_type').val(unitLicenseTypeText);
                        $('#unit_condition').val(unitConditionText);
                        $('#unit_color').val(response.unit_color);
                        $('#unit_vin').val(response.unit_VIN);
                    }).fail(function(error) {
                        console.log(error);
                    });
                } else {
                    $('#unit_id').val('');
                    $('#unit_code').val('');
                    $('#unit_brand').val('');
                    $('#unit_license').val('');
                    $('#unit_license_type').val('');
                    $('#unit_condition').val('');
                    $('#unit_color').val('');
                    $('#unit_vin').val('');
                }
            });

            $('#driver_selection').on('change', function() {
                var selectedOption = $(this).val();
                var selectedData = selectedOption.split('/');

                var id = selectedData[0];
                var driver_guid = selectedData[1];

                if (selectedOption !== '') {
                    $.get('/get-driver/' + id + '/' + driver_guid, function(response) {

                        $('#driver_id').val(response.id);
                        $('#driver_lname').val(response.driver_lname);
                        $('#driver_KTP').val(response.driver_KTP);
                        $('#driver_email').val(response.driver_email);
                        $('#driver_phone').val(response.driver_phone);
                        $('#driver_stnk').val(response.driver_stnk);
                    });
                } else {
                    $('#driver_id').val('');
                    $('#driver_lname').val('');
                    $('#driver_KTP').val('');
                    $('#driver_email').val('');
                    $('#driver_phone').val('');
                    $('#driver_stnk').val('');
                }
            });

        });

    </script>

</body>

</html>