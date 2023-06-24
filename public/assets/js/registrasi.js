
      // Fungsi untuk menampilkan popup konfirmasi
      function showConfirmationPopup() {
        // Menggunakan komponen modal dari Bootstrap
        var modal = new bootstrap.Modal(
          document.getElementById("confirmation-modal")
        );
        modal.show();
      }

      // Menggunakan event listener untuk menangani klik tombol "Kembali"
      document
        .getElementById("btn-kembali")
        .addEventListener("click", function () {
          showConfirmationPopup();
        });

      document
        .getElementById("form-order")
        .addEventListener("submit", function (event) {
          event.preventDefault(); // Menghentikan pengiriman form standar

          // Mendapatkan nilai-nilai input
          var tanggal = document.getElementById("tanggal").value;
          var tipeKendaraan = document.getElementById("tipe-kendaraan").value;
          var pelanggan = document.getElementById("pelanggan").value;
          var daerahBBN = document.getElementById("daerah-bbn").value;
          var alamatKirim = document.getElementById("alamat-kirim").value;

          // Membuat objek data
          var data = {
            tanggal: tanggal,
            tipeKendaraan: tipeKendaraan,
            pelanggan: pelanggan,
            daerahBBN: daerahBBN,
            alamatKirim: alamatKirim,
          };

          // Mengirim data ke server (misalnya menggunakan AJAX)
          // Ganti URL dengan URL yang sesuai di backend
          fetch("/pages/registrasi", {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
              "Content-Type": "application/json",
            },
          })
            .then(function (response) {
              if (response.ok) {
                // Redirect ke halaman laporan.html setelah berhasil submit
                window.location.href = "/pages/laporan.html";
              } else {
                throw new Error("Terjadi kesalahan saat mengirim data.");
              }
            })
            .catch(function (error) {
              console.error(error);
            });
        });

        function populateData() {
            // Ambil data dari parameter URL
            var urlParams = new URLSearchParams(window.location.search);
    
            // Ambil elemen tbody dari tabel
            var tbody = document.querySelector(".data-table tbody");
    
            // Buat elemen baris baru
            var newRow = document.createElement("tr");
            newRow.classList.add("data-row");
    
            // Buat elemen sel untuk setiap kolom
            var tanggalCell = document.createElement("td");
            var tipeKendaraanCell = document.createElement("td");
            var noRangkaCell = document.createElement("td");
            var pelangganCell = document.createElement("td");
            var daerahBbnCell = document.createElement("td");
            var salesCell = document.createElement("td");
            var supervisorCell = document.createElement("td");
            var jenisNoPolCell = document.createElement("td");
            var alamatKirimCell = document.createElement("td");
            var noteCell = document.createElement("td");
    
            // Set nilai dari setiap sel sesuai dengan data yang diinputkan
            tanggalCell.textContent = urlParams.get("tanggal") || "";
            tipeKendaraanCell.textContent = urlParams.get("tipe-kendaraan") || "";
            noRangkaCell.textContent = urlParams.get("no-rangka") || "";
            pelangganCell.textContent = urlParams.get("pelanggan") || "";
            daerahBbnCell.textContent = urlParams.get("daerah-bbn") || "";
            salesCell.textContent = urlParams.get("sales") || "";
            supervisorCell.textContent = urlParams.get("supervisor") || "";
            jenisNoPolCell.textContent = urlParams.get("jenis-no-pol") || "";
            alamatKirimCell.textContent = urlParams.get("alamat-kirim") || "";
            noteCell.textContent = urlParams.get("note") || "";
    
            // Tambahkan sel ke dalam baris
            newRow.appendChild(tanggalCell);
            newRow.appendChild(tipeKendaraanCell);
            newRow.appendChild(noRangkaCell);
            newRow.appendChild(pelangganCell);
            newRow.appendChild(daerahBbnCell);
            newRow.appendChild(salesCell);
            newRow.appendChild(supervisorCell);
            newRow.appendChild(jenisNoPolCell);
            newRow.appendChild(alamatKirimCell);
            newRow.appendChild(noteCell);
    
            // Tambahkan baris ke dalam tbody
            tbody.appendChild(newRow);
    
            // Sembunyikan pesan "Tidak ada pengiriman" jika ada data yang ditambahkan
            var noOrderMessage = document.querySelector(".no-order-message");
            if (tbody.children.length > 1) {
              noOrderMessage.style.display = "none";
            } else {
              noOrderMessage.style.display = "table-row";
            }
          }
    
          window.addEventListener("DOMContentLoaded", function () {
            populateData();
          });
    
          document.addEventListener("DOMContentLoaded", function () {
            // Mengecek apakah ada data yang disubmit sebelumnya di Local Storage
            var submittedData = localStorage.getItem("submittedData");
            if (submittedData) {
              // Mengambil elemen tabel dengan ID "order-table"
              var orderTable = document.getElementById("order-table");
    
              // Mendekode data JSON yang disimpan di Local Storage
              var data = JSON.parse(submittedData);
    
              // Membuat baris HTML baru untuk data yang disubmit sebelumnya
              var newRow = document.createElement("tr");
    
              // Menambahkan data ke dalam baris
              newRow.innerHTML = `
            <td>${data.tanggal}</td>
            <td>${data.tipeKendaraan}</td>
            <td>${data.noRangka}</td>
            <td>${data.pelanggan}</td>
            <td>${data.daerahBBN}</td>
            <td>${data.sales}</td>
            <td>${data.supervisor}</td>
            <td>${data.jenisNoPol}</td>
            <td>${data.alamatKirim}</td>
            <td>${data.note}</td>
          `;
    
              // Menambahkan baris ke dalam tabel
              orderTable.appendChild(newRow);
    
              // Menghapus data dari Local Storage setelah ditampilkan
              localStorage.removeItem("submittedData");
            }
    
            // Menggunakan event listener untuk menangani submit form
            document
              .getElementById("order-form")
              .addEventListener("submit", function (event) {
                // Mencegah pengiriman form secara default
                event.preventDefault();
    
                // Mengambil nilai input
                var tanggal = document.getElementById("tanggal").value;
                var tipeKendaraan = document.getElementById("tipe-kendaraan").value;
                var noRangka = document.getElementById("no-rangka").value;
                var pelanggan = document.getElementById("pelanggan").value;
                var daerahBBN = document.getElementById("daerah-bbn").value;
                var sales = document.getElementById("sales").value;
                var supervisor = document.getElementById("supervisor").value;
                var jenisNoPol = document.getElementById("jenis-no-pol").value;
                var alamatKirim = document.getElementById("alamat-kirim").value;
                var note = document.getElementById("note").value;
    
                // Menyimpan data ke dalam objek
                var data = {
                  tanggal: tanggal,
                  tipeKendaraan: tipeKendaraan,
                  noRangka: noRangka,
                  pelanggan: pelanggan,
                  daerahBBN: daerahBBN,
                  sales: sales,
                  supervisor: supervisor,
                  jenisNoPol: jenisNoPol,
                  alamatKirim: alamatKirim,
                  note: note,
                };
    
                // Menyimpan data ke dalam Local Storage
                localStorage.setItem("submittedData", JSON.stringify(data));
    
                // Mengarahkan pengguna kembali ke halaman tambah.html
                location.href = "/registrasi.html";
              });
          });
    
          // Menghilangkan loading screen setelah selesai memuat halaman
          window.addEventListener("DOMContentLoaded", function () {
            document.querySelector(".loading-screen").style.display = "none";
          });
    
          document
            .getElementById("form-order")
            .addEventListener("submit", function (event) {
              event.preventDefault(); // Menghentikan pengiriman form standar
    
              // Mendapatkan nilai-nilai input
              var tanggal = document.getElementById("tanggal").value;
              var tipeKendaraan = document.getElementById("tipe-kendaraan").value;
              var pelanggan = document.getElementById("pelanggan").value;
              var daerahBBN = document.getElementById("daerah-bbn").value;
              var alamatKirim = document.getElementById("alamat-kirim").value;
    
              // Membuat objek data
              var data = {
                tanggal: tanggal,
                tipeKendaraan: tipeKendaraan,
                pelanggan: pelanggan,
                daerahBBN: daerahBBN,
                alamatKirim: alamatKirim,
              };
    
              // Mengirim data ke server (misalnya menggunakan AJAX)
              // Ganti URL dengan URL yang sesuai di backend
              fetch("/pages/registrasi", {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                  "Content-Type": "application/json",
                },
              })
                .then(function (response) {
                  if (response.ok) {
                    // Jika berhasil, tambahkan data ke tabel pada halaman tambah.html
                    var newRow = document.createElement("tr");
                    newRow.innerHTML = `
                <td>${tanggal}</td>
                <td>${tipeKendaraan}</td>
                <td>${pelanggan}</td>
                <td>${daerahBBN}</td>
                <td>${alamatKirim}</td>
                <td>
                  <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#noteModal">
                    <i class="fas fa-sticky-note"></i>
                  </button>
                  <button class="btn btn-sm btn-success">
                    <i class="fas fa-check"></i>
                  </button>
                  <button class="btn btn-sm btn-danger">
                    <i class="fas fa-times"></i>
                  </button>
                </td>
              `;
    
                    var orderTable = document.getElementById("order-table");
                    var noOrderMessage =
                      document.querySelector(".no-order-message");
    
                    // Jika tidak ada data sebelumnya, sembunyikan pesan "Tidak ada pengiriman"
                    if (noOrderMessage.style.display === "block") {
                      noOrderMessage.style.display = "none";
                    }
    
                    // Tambahkan baris data baru ke tabel
                    orderTable.appendChild(newRow);
    
                    // Reset form
                    document.getElementById("form-order").reset();
                  } else {
                    throw new Error("Terjadi kesalahan saat mengirim data.");
                  }
                })
                .catch(function (error) {
                  console.error(error);
                });
            });