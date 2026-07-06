<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ombak Biru - Solusi Transportasi Bahari Anda</title>
    <link rel="icon" type="image/svg+xml" href="../img/Asset 10.svg">
</head>
<link rel="stylesheet" href="../css/bdy.css" />
<body>

<?php include __DIR__ .'/../layout/hdr.html'; ?>

<main>

    <section class="banner-slider">
      <div class="slides">
        <div class="slide">
          <img src="../img/banner1.png" alt="Banner 1" />
        </div>
        <div class="slide">
          <img src="../img/banner2.png" alt="Banner 2" />
        </div>
        <div class="slide">
          <img src="../img/banner1.png" alt="Banner 1" />
        </div>
      </div>
    </section>
    <div class="container">
      <section class="hero" id="hero">
        <h1>Eksplorasi Laut Nusantara.</h1>

        <p>
          Pesan tiket feri dan pengiriman logistik dengan aman, cepat, dan
          transparan bersama Ombak Biru.
        </p>
      </section>
      <section class="booking-card" id="booking-card">
<form action="jadwal.php" method="GET">
    <h2 class="booking-title">Cari Tiket Anda</h2>
    <p class="booking-subtitle">
        Atur jadwal keberangkatan Anda di Pelabuhan
    </p>

    <div class="booking-grid">
        <div class="form-group">
            <label>Pelabuhan Asal</label>

            <select id="asal" name="asal">
                <option value="merak">Merak, Banten</option>
                <option value="bakauheni">Bakauheni, Lampung</option>
                <option value="gilimanuk">Gilimanuk, Bali</option>
                <option value="ketapang">Ketapang, Jawa Timur</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kelas Layanan</label>

            <select name="kelas" required>
                <option value="">Pilih Kelas</option>
                <option value="Reguler">Reguler</option>
                <option value="Eksekutif">Eksekutif</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk Pelabuhan</label>
            <input
              type="date"
              name="tanggal"
              required
            >
        </div>
        <div class="form-group">
            <label>Pelabuhan Tujuan</label>

            <select id="tujuan" name="tujuan">

            </select>
        </div>
        <div class="form-group">
            <label>Jenis Pengguna Jasa</label>

            <select>
                <option>Jalan Kaki</option>
                <option>Berkendara</option>
            </select>
        </div>
        <div class="form-group">
            <label>Penumpang</label>

            <select>
                <option>1 Dewasa</option>
                <option>2 Dewasa</option>
                <option>2 Dewasa, 1 Anak</option>
                <option>2 Dewasa, 2 Anak</option>
            </select>
        </div>

    </div>

    <div class="booking-btn">

        <button type="submit">
            Cari Jadwal
        </button>

    </div>
</form>

</section>
      <section class="promo-section">
        <div class="promo-header">
          <div>
            <h2>Promo Terkini</h2>
            <p>Nikmati penawaran eksklusif untuk perjalanan Anda berikutnya.</p>
          </div>

          <a href="#">Lihat Semua Promo</a>
        </div>

        <div class="promo-grid">
          <div class="promo-card">
            <img
              src="https://asset.kompas.com/crops/3mbSpWQrASvkS9wlpqdrRk7ZuO0=/133x14:808x464/750x500/data/photo/2020/05/22/5ec749564036c.jpg"
            />

            <div class="promo-content">
              <span class="badge orange">DISKON 20%</span>

              <h3>Liburan Keluarga Merak-Bakauheni</h3>

              <p>
                Dapatkan potongan harga khusus untuk pemesanan grup keluarga.
              </p>
            </div>
          </div>

          <div class="promo-card">
            <img
              src="https://marostrans.com/wp-content/uploads/2024/07/ezgif.com-webp-to-jpg-converter-5.jpg"
            />

            <div class="promo-content">
              <span class="badge green">CASHBACK</span>

              <h3>Cashback Pengiriman Logistik</h3>

              <p>Kirim barang lebih hemat dengan cashback hingga Rp1.500.000.</p>
            </div>
          </div>

          <div class="promo-card">
            <img src="../img/Tanpa Judul.jpg" />

            <div class="promo-content">
              <span class="badge blue">UPGRADE GRATIS</span>

              <h3>Upgrade Eksekutif Voyage</h3>

              <p>
                Gunakan poin Ombak Biru untuk upgrade gratis ke kelas Eksekutif.
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="app-section">
        <div class="app-content">
          <span class="rating"> ⭐ 4.9/5 dari 100rb ulasan </span>

          <h2>Perjalanan Lebih Mudah di Genggaman</h2>

          <p>
            Download aplikasi Ombak Biru sekarang untuk kemudahan check-in
            mandiri, pelacakan kapal real-time, dan promo eksklusif hingga 30%.
          </p>

          <div class="store-buttons">
            <button>
              <i class="fa-brands fa-google-play"></i>
              Play Store
            </button>

            <button>
              <i class="fa-brands fa-apple"></i>
              App Store
            </button>
          </div>
        </div>

        <div class="phone-area">
          <div class="phone"></div>
        </div>
      </section>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {

    const asal = document.getElementById("asal");
    const tujuan = document.getElementById("tujuan");

    function updateTujuan() {

        switch (asal.value) {

            case "merak":
                tujuan.innerHTML =
                    "<option value='bakauheni'>Pelabuhan Bakauheni, Lampung</option>";
                break;

            case "bakauheni":
                tujuan.innerHTML =
                    "<option value='merak'>Pelabuhan Merak, Banten</option>";
                break;

            case "gilimanuk":
                tujuan.innerHTML =
                    "<option value='ketapang'>Pelabuhan Ketapang, Jawa Timur</option>";
                break;

            case "ketapang":
                tujuan.innerHTML =
                    "<option value='gilimanuk'>Pelabuhan Gilimanuk, Bali</option>";
                break;
        }

    }

    updateTujuan();

    asal.addEventListener("change", updateTujuan);

});


function cekLogin(){

<?php if(isset($_SESSION['user_id'])){ ?>

    window.location="jadwal.php";

<?php }else{ ?>

    window.location="login.php";

<?php } ?>

}
</script>


</main>


<?php include __DIR__ . '/../layout/ftr.html'; ?>

</body>
</html>