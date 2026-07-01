<?php

include "../../database/koneksi.php";

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM jadwal_kapal
    ORDER BY tanggal, jam_berangkat"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kapal UI</title>

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../css/jadwal.css">
</head>

<body>
<?php include __DIR__ .'/../layout/hdr.html'; ?>
<div class="container">
      <!-- HERO -->
      <section class="hero" id="hero">
        <h1>Eksplorasi Laut Nusantara.</h1>

        <p>
          Pesan tiket feri dan pengiriman logistik dengan aman, cepat, dan
          transparan bersama SeaLink.
        </p>
      </section>

    <main class="schedule-widget">

        <section class="schedule-list">

            <?php while ($kapal = mysqli_fetch_assoc($query)) { ?>

                <article class="schedule-card">

                    <div class="ship-info">

                        <div class="material-symbols-outlined">
                            directions_boat
                        </div>

                        <div class="ship-details">
                            <h3 class="ship-name">
                                <?= $kapal['nama_kapal']; ?>
                            </h3>

                            <p class="ship-class">
                                <?= $kapal['kelas']; ?>
                            </p>
                        </div>

                    </div>

                    <div class="route-info">

                        <div class="time-block">
                            <h2 class="time">
                                <?= $kapal['jam_berangkat']; ?>
                            </h2>

                            <p class="port">
                                <?= $kapal['asal']; ?>
                            </p>
                        </div>

                        <div class="duration-block">

                            <span class="duration">
                                Langsung
                            </span>

                            <hr class="timeline-divider">

                            <span class="route-type">
                                <?= $kapal['tanggal']; ?>
                            </span>

                        </div>

                        <div class="time-block">

                            <h2 class="time">
                                <?= $kapal['jam_tiba']; ?>
                            </h2>

                            <p class="port">
                                <?= $kapal['tujuan']; ?>
                            </p>

                        </div>

                    </div>

                    <div class="booking-info">

                        <span class="badge badge-success">
                            <?= $kapal['jumlah_tiket']; ?> Tiket Tersisa
                        </span>

                        <p class="price-label">
                            Total Harga
                        </p>

                        <h3 class="price">
                            Rp <?= number_format($kapal['harga']); ?>
                        </h3>

                        <button class="btn btn-primary">
                            Pilih
                        </button>

                    </div>

                </article>

            <?php } ?>

        </section>

    </main>
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
    <?php include __DIR__ .'/../layout/ftr.html'; ?>

</body>

</html>