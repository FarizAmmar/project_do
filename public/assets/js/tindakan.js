// Simpan data ke tabel
document.getElementById('submitBtn').addEventListener('click', function() {
  var brand = document.getElementById('unitBrand').value;
  var rangka = document.getElementById('unitVim').value;
  var tipe = document.getElementById('unitType').value;
  var kondisi = document.getElementById('unitCondition').value;
  var noPolisi = document.getElementById('unitLicense').value;
  var warna = document.getElementById('unitColor').value;
  var jenisPolisi = document.getElementById('unitLicenseType').value;
  var tahunRegistrasi = document.getElementById('unitRegYear').value;
  var note = document.getElementById('unitNote').value;

  // Buat baris baru di tabel
  var table = document.querySelector('.table');
  var newRow = table.insertRow(-1);

  // Kolom tombol
  var actionsCell = newRow.insertCell(0);
  actionsCell.classList.add('align-items-center');
  actionsCell.innerHTML = `
    <div class="d-flex align-items-center">
      <button type="button" class="btn btn-sm btn-light btn-approve" data-bs-toggle="modal" data-bs-target="#approveModal">
        <i class="fas fa-pen-to-square"></i>
      </button>
      <button type="button" class="btn btn-sm btn-outline-danger btn-reject" data-bs-toggle="modal" data-bs-target="#rejectModal">
        <i class="fas fa-trash"></i>
      </button>
    </div>
  `;

  // Kolom data
  newRow.insertCell(1).textContent = brand;
  newRow.insertCell(2).textContent = tipe;
  newRow.insertCell(3).textContent = kondisi;
  newRow.insertCell(4).textContent = rangka;
  newRow.insertCell(5).textContent = noPolisi;
  newRow.insertCell(6).textContent = jenisPolisi;
  newRow.insertCell(7).textContent = warna;
  newRow.insertCell(8).textContent = tahunRegistrasi;

  // Bersihkan nilai formulir
  document.getElementById('unitBrand').value = '';
  document.getElementById('unitVim').value = '';
  document.getElementById('unitType').value = '';
  document.getElementById('unitCondition').value = 'new';
  document.getElementById('unitLicense').value = '';
  document.getElementById('unitColor').value = '';
  document.getElementById('unitLicenseType').value = 'Provit';
  document.getElementById('unitRegYear').value = '';
  document.getElementById('unitNote').value = '';

  // Tutup modal
  var modal = document.getElementById('modalnew');
  var bootstrapModal = bootstrap.Modal.getInstance(modal);
  bootstrapModal.hide();
});

