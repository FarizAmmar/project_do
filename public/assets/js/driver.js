        // Variables
        var drivers = [];

        // Register Driver
        document.getElementById('registerDriverBtn').addEventListener('click', function() {
            var driverName = document.getElementById('driverName').value;
            var driverKTP = document.getElementById('driverKTP').value;
            var driverSTNK = document.getElementById('driverSTNK').value;
            var driverKendaraan = document.getElementById('driverKendaraan').value;
            var driverNoPolisi = document.getElementById('driverNoPolisi').value;
            var driverNoHP = document.getElementById('driverNoHP').value;
            var driverEmail = document.getElementById('driverEmail').value;
            var driverPasfoto = document.getElementById('driverPasfoto').value;

            var driver = {
                id: drivers.length + 1,
                nama: driverName,
                no_ktp: driverKTP,
                no_stnk: driverSTNK,
                kendaraan: driverKendaraan,
                no_polisi: driverNoPolisi,
                no_hp: driverNoHP,
                no_email: driverEmail,
                pasfoto: driverPasfoto
            };

            drivers.push(driver);
            showDrivers();

            document.getElementById('newDriverForm').reset();
            $('#newDriverModal').modal('hide');
        });

        // Edit Driver
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            var driver = drivers.find(function(d) {
                return d.id === id;
            });

            document.getElementById('editDriverId').value = driver.id;
            document.getElementById('editDriverName').value = driver.nama;
            document.getElementById('editDriverKTP').value = driver.no_ktp;
            document.getElementById('editDriverSTNK').value = driver.no_stnk;
            document.getElementById('editDriverKendaraan').value = driver.kendaraan;
            document.getElementById('editDriverNoPolisi').value = driver.no_polisi;
            document.getElementById('editDriverNoHP').value = driver.no_hp;
            document.getElementById('editDriverEmail').value = driver.no_email;

            $('#editDriverModal').modal('show');
        });

        // Update Driver
        document.getElementById('updateDriverBtn').addEventListener('click', function() {
            var id = document.getElementById('editDriverId').value;
            var driver = drivers.find(function(d) {
                return d.id === parseInt(id);
            });

            driver.nama = document.getElementById('editDriverName').value;
            driver.no_ktp = document.getElementById('editDriverKTP').value;
            driver.no_stnk = document.getElementById('editDriverSTNK').value;
            driver.kendaraan = document.getElementById('editDriverKendaraan').value;
            driver.no_polisi = document.getElementById('editDriverNoPolisi').value;
            driver.no_hp = document.getElementById('editDriverNoHP').value;
            driver.no_email = document.getElementById('editDriverEmail').value;

            showDrivers();

            $('#editDriverModal').modal('hide');
        });

        // Delete Driver
        $(document).on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            var driverIndex = drivers.findIndex(function(d) {
                return d.id === id;
            });

            document.getElementById('confirmDeleteDriverBtn').setAttribute('data-id', id);

            $('#deleteDriverModal').modal('show');
        });

        document.getElementById('confirmDeleteDriverBtn').addEventListener('click', function() {
            var id = document.getElementById('confirmDeleteDriverBtn').getAttribute('data-id');
            var driverIndex = drivers.findIndex(function(d) {
                return d.id === parseInt(id);
            });

            drivers.splice(driverIndex, 1);
            showDrivers();

            $('#deleteDriverModal').modal('hide');
        });

        // Show Photo
        $(document).on('click', '.btn-show-photo', function() {
            var id = $(this).data('id');
            var driver = drivers.find(function(d) {
                return d.id === id;
            });

            document.getElementById('showPhotoImage').src = driver.pasfoto;

            $('#showPhotoModal').modal('show');
        });

        // Show Drivers
        function showDrivers() {
            var tableBody = document.getElementById('driversTableBody');
            tableBody.innerHTML = '';

            drivers.forEach(function(driver) {
                var row = document.createElement('tr');
                row.innerHTML = `
                    <td>${driver.id}</td>
                    <td>${driver.nama}</td>
                    <td>${driver.no_ktp}</td>
                    <td>${driver.no_stnk}</td>
                    <td>${driver.kendaraan}</td>
                    <td>${driver.no_polisi}</td>
                    <td>${driver.no_hp}</td>
                    <td>${driver.no_email}</td>
                    <td>
                        <button class="btn btn-primary btn-sm btn-show-photo" data-id="${driver.id}">Show Photo</button>
                        <button class="btn btn-info btn-sm btn-edit" data-id="${driver.id}">Edit</button>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="${driver.id}">Delete</button>
                    </td>
                `;

                tableBody.appendChild(row);
            });
        }
