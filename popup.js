// ==============================
// Ambil elemen popup
// ==============================
const popupSuccess = document.getElementById("popupSuccess");

const btnCloseSuccess = document.getElementById("btnCloseSuccess");

const btnKembali = document.getElementById("btnKembali");

const btnCekStatus = document.getElementById("btnCekStatus");
const popupQris = document.getElementById("popupQris");

const btnCloseQris = document.getElementById("btnCloseQris");

const btnLanjutPembayaran = document.getElementById("btnLanjutPembayaran");

const qrisHarga = document.getElementById("qrisHarga");

const countdown = document.getElementById("countdown");

console.log("popup.js berhasil dimuat");

const popupKonfirmasi = document.getElementById("popupKonfirmasi");

const btnCloseKonfirmasi = document.getElementById("btnCloseKonfirmasi");

const tombolPilih = document.querySelectorAll(".pilih-btn");

// ==============================
// Semua elemen yang akan diisi
// ==============================

const popupKapal = document.getElementById("popupKapal");
const popupAsal = document.getElementById("popupAsal");
const popupTujuan = document.getElementById("popupTujuan");
const popupTanggal = document.getElementById("popupTanggal");
const popupBerangkat = document.getElementById("popupBerangkat");
const popupTiba = document.getElementById("popupTiba");
const popupKelas = document.getElementById("popupKelas");
const popupHarga = document.getElementById("popupHarga");

// ==============================
// Format Rupiah
// ==============================

function formatRupiah(angka) {
  return "Rp " + Number(angka).toLocaleString("id-ID");
}

// ==============================
// Event Tombol Pilih
// ==============================

tombolPilih.forEach(function (button) {
  button.addEventListener("click", function () {
    popupKapal.textContent = this.dataset.kapal;

    popupAsal.textContent = this.dataset.asal;

    popupTujuan.textContent = this.dataset.tujuan;

    popupTanggal.textContent = this.dataset.tanggal;

    popupBerangkat.textContent = this.dataset.berangkat;

    popupTiba.textContent = this.dataset.tiba;

    popupKelas.textContent = this.dataset.kelas;

    popupHarga.textContent = formatRupiah(this.dataset.harga);

    popupKonfirmasi.style.display = "flex";
  });
});
btnCekStatus.addEventListener("click", function () {
  // Tutup popup QRIS
  document.getElementById("popupQris").style.display = "none";

  // Tampilkan popup sukses
  popupSuccess.style.display = "flex";
});
// ==============================
// Tutup Popup
// ==============================

btnCloseKonfirmasi.addEventListener("click", function () {
  popupKonfirmasi.style.display = "none";
});

// ==============================
// Klik area luar popup
// ==============================

popupKonfirmasi.addEventListener("click", function (e) {
  if (e.target === popupKonfirmasi) {
    popupKonfirmasi.style.display = "none";
  }
});
btnLanjutPembayaran.addEventListener("click", function () {
  popupKonfirmasi.style.display = "none";

  popupQris.style.display = "flex";

  qrisHarga.textContent = popupHarga.textContent;
});
btnCloseSuccess.addEventListener("click", function () {
  popupSuccess.style.display = "none";
});
popupSuccess.addEventListener("click", function (e) {
  if (e.target === popupSuccess) {
    popupSuccess.style.display = "none";
  }
});
btnKembali.addEventListener("click", function () {
  window.location.href = "../for";
});
