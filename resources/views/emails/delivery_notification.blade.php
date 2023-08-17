<!DOCTYPE html>
<html>

<head>
    <title>Notification for Delivery</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Notification for Delivery</h1>
        <p>Dear Customer,</p>
        <p>Your delivery information is as follows:</p>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nama Pembeli:</strong> {{ $deliveryData['delivery_senderName'] }}</li>
            <li class="list-group-item"><strong>Tipe Unit:</strong> {{ $deliveryData['unit_name'] }}</li>
            <li class="list-group-item"><strong>No. Rangka:</strong> {{ $deliveryData['unit_VIN'] }}</li>
            <li class="list-group-item"><strong>Daerah BBN:</strong> {{ $deliveryData['delivery_bbn'] }}</li>
            <li class="list-group-item"><strong>Nama Sales:</strong> {{ $deliveryData['delivery_sales'] }}</li>
            <li class="list-group-item"><strong>Nama SPV:</strong> {{ $deliveryData['delivery_spv'] }}</li>
            <li class="list-group-item"><strong>Tanggal Kirim:</strong> {{ $deliveryData['delivery_date'] }}</li>
            <li class="list-group-item"><strong>Alamat Kirim:</strong> {{ $deliveryData['delivery_addressTo'] }}</li>
            <li class="list-group-item"><strong>Email Customer:</strong> {{ $deliveryData['delivery_custemail'] }}</li>
            <li class="list-group-item"><strong>Note:</strong> {{ $deliveryData['delivery_description'] }}</li>
        </ul>
        <p class="mt-3">Thank you for choosing our delivery service! For more detailed and extensive information, please
            click <a href="http://127.0.0.1:8000/">here</a>.</p>
    </div>

    <!-- Load Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>