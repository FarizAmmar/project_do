// Simpan data driver yang diinputkan
let drivers = [];

// Fungsi untuk menampilkan data driver ke dalam tabel
function displayDrivers() {
  const tbody = document.querySelector("table tbody");
  tbody.innerHTML = "";

  drivers.forEach((driver, index) => {
    const row = document.createElement("tr");

    // Kolom Option
    const optionCol = document.createElement("td");
    const editBtn = document.createElement("a");
    editBtn.classList.add("text-primary", "text-underline");
    editBtn.setAttribute("role", "button");
    editBtn.setAttribute("data-bs-toggle", "modal");
    editBtn.setAttribute("data-bs-target", "#approveModal");
    editBtn.innerText = "Edit";
    editBtn.addEventListener("click", () => {
      // Mengisi form edit dengan data driver yang akan diubah
      fillEditForm(index);
    });

    optionCol.appendChild(editBtn);
    row.appendChild(optionCol);

    // Kolom Nama Panggilan
    const snameCol = document.createElement("td");
    snameCol.innerText = driver.sname;
    row.appendChild(snameCol);

    // Kolom Nama Lengkap
    const lnameCol = document.createElement("td");
    lnameCol.innerText = driver.lname;
    row.appendChild(lnameCol);

    // Kolom KTP
    const KTPCol = document.createElement("td");
    KTPCol.innerText = driver.KTP;
    row.appendChild(KTPCol);

    // Kolom Email
    const emailCol = document.createElement("td");
    emailCol.innerText = driver.email;
    row.appendChild(emailCol);

    // Kolom STNK
    const stnkCol = document.createElement("td");
    stnkCol.innerText = driver.stnk;
    row.appendChild(stnkCol);

    // Kolom No. Telp
    const phoneCol = document.createElement("td");
    phoneCol.innerText = driver.phone;
    row.appendChild(phoneCol);

    tbody.appendChild(row);
  });
}

// Fungsi untuk mengisi form edit dengan data driver yang akan diubah
function fillEditForm(index) {
  const driver = drivers[index];
  document.getElementById("driver_index").value = index;
  document.getElementById("driver_sname").value = driver.sname;
  document.getElementById("driver_lname").value = driver.lname;
  document.getElementById("driver_KTP").value = driver.KTP;
  document.getElementById("driver_email").value = driver.email;
  document.getElementById("driver_stnk").value = driver.stnk;
  document.getElementById("driver_phone").value = driver.phone;
}

// Fungsi untuk menambahkan driver baru
function addDriver() {
  const sname = document.getElementById("driver_sname").value;
  const lname = document.getElementById("driver_lname").value;
  const KTP = document.getElementById("driver_KTP").value;
  const email = document.getElementById("driver_email").value;
  const stnk = document.getElementById("driver_stnk").value;
  const phone = document.getElementById("driver_phone").value;

  const newDriver = {
    sname,
    lname,
    KTP,
    email,
    stnk,
    phone,
  };

  drivers.push(newDriver);
  displayDrivers();

  // Reset form setelah data berhasil ditambahkan
  document.getElementById("newForm").reset();
  document.getElementById("modalnew").classList.remove("show");
  document.body.classList.remove("modal-open");
  document.querySelector(".modal-backdrop").remove();
}

// Fungsi untuk mengupdate data driver
function updateDriver() {
  const index = document.getElementById("driver_index").value;
  const sname = document.getElementById("driver_sname").value;
  const lname = document.getElementById("driver_lname").value;
  const KTP = document.getElementById("driver_KTP").value;
  const email = document.getElementById("driver_email").value;
  const stnk = document.getElementById("driver_stnk").value;
  const phone = document.getElementById("driver_phone").value;

  const updatedDriver = {
    sname,
    lname,
    KTP,
    email,
    stnk,
    phone,
  };

  drivers[index] = updatedDriver;
  displayDrivers();

  // Reset form setelah data berhasil diupdate
  document.getElementById("newForm").reset();
  document.getElementById("approveModal").classList.remove("show");
  document.body.classList.remove("modal-open");
  document.querySelector(".modal-backdrop").remove();
}

// Event listener untuk tombol Register pada modal New
document.getElementById("submitBtn").addEventListener("click", () => {
  if (document.getElementById("modalnew").classList.contains("show")) {
    addDriver();
  } else if (document.getElementById("approveModal").classList.contains("show")) {
    updateDriver();
  }
});

// Event listener untuk tombol Close pada modal New
document.getElementById("modalnew").addEventListener("hidden.bs.modal", () => {
  document.getElementById("newForm").reset();
});

// Event listener untuk tombol Close pada modal Edit
document.getElementById("approveModal").addEventListener("hidden.bs.modal", () => {
  document.getElementById("newForm").reset();
});

// Menampilkan data driver awal saat halaman dimuat
displayDrivers();
