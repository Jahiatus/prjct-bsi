<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: homepage.php");
    exit;
}

$kapal = $_POST['kapal'] ?? '';
$kelas = $_POST['kelas'] ?? '';
$asal = $_POST['asal'] ?? '';
$tujuan = $_POST['tujuan'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';
$jam_berangkat = $_POST['jam_berangkat'] ?? '';
$jam_tiba = $_POST['jam_tiba'] ?? '';
$harga = $_POST['harga'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesan - Ombak Biru</title>

    <link rel="stylesheet" href="../css/pemesanan.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

    <?php include __DIR__ . '/../form/header.php'; ?>

    <div class="booking-container">

        <!-- STEP -->
        <div class="stepper">

            <div class="step active">
                <div class="circle">1</div>
                <span>Isi Data</span>
            </div>

            <div class="line"></div>

            <div class="step">
                <div class="circle">2</div>
                <span>Verifikasi</span>
            </div>

            <div class="line"></div>

            <div class="step">
                <div class="circle">3</div>
                <span>Pembayaran</span>
            </div>

            <div class="line"></div>

            <div class="step">
                <div class="circle">4</div>
                <span>E-Tiket</span>
            </div>

        </div>

        <form action="verifikasi.php" method="POST">

            <!-- data kapal -->
            <input type="hidden" name="kapal" value="<?= $kapal ?>">
            <input type="hidden" name="kelas" value="<?= $kelas ?>">
            <input type="hidden" name="asal" value="<?= $asal ?>">
            <input type="hidden" name="tujuan" value="<?= $tujuan ?>">
            <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
            <input type="hidden" name="jam_berangkat" value="<?= $jam_berangkat ?>">
            <input type="hidden" name="jam_tiba" value="<?= $jam_tiba ?>">
            <input type="hidden" name="harga" value="<?= $harga ?>">

            <div class="content">

                <!-- LEFT -->
                <div class="left-content">

                    <!-- INFORMASI PEMESAN -->

                    <div class="card">

                        <h2>
                            <i class="fa-solid fa-user"></i>
                            Informasi Pemesan
                        </h2>

                        <div class="form-group">

                            <label>Nama Pemesan</label>

                            <input type="text" name="nama_pemesan" placeholder="Masukkan nama lengkap" required>

                        </div>

                        <div class="form-group">

                            <label>Nomor Handphone</label>

                            <input type="text" name="telepon" placeholder="08xxxxxxxxxx" required>

                        </div>

                        <div class="form-group">

                            <label>Alamat Email</label>

                            <input type="email" name="email" placeholder="contoh@email.com" required>

                        </div>

                    </div>

                    <!-- DETAIL PENUMPANG -->

                    <div class="card">

                        <h2>
                            <i class="fa-solid fa-id-card"></i>
                            Detail Penumpang
                        </h2>

                        <div class="grid">

                            <div class="form-group">

                                <label>Titel</label>

                                <select name="titel">

                                    <option>Tn.</option>
                                    <option>Ny.</option>
                                    <option>Nona</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label>Nama Lengkap</label>

                                <input type="text" name="nama_penumpang" required>

                            </div>

                            <div class="form-group">

                                <label>Jenis Identitas</label>

                                <select name="jenis_id">

                                    <option>KTP</option>
                                    <option>SIM</option>
                                    <option>Paspor</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label>Nomor Identitas</label>

                                <input type="text" name="nomor_id" required>

                            </div>

                            <div class="form-group">

                                <label>Usia</label>

                                <input type="number" name="usia" required>

                            </div>

                            <div class="form-group">

                                <label>Kota / Kabupaten</label>

                                <input type="text" name="kota" required>

                            </div>

                        </div>

                    </div>

                    <!-- INFORMASI -->

                    <div class="info-box">

                        <i class="fa-solid fa-circle-info"></i>

                        <div>

                            <h4>Informasi Penting</h4>

                            <ul>

                                <li>Pastikan nama sesuai identitas.</li>

                                <li>Penumpang wajib membawa identitas asli.</li>

                                <li>Tiket tidak dapat dipindahtangankan.</li>

                                <li>Datang minimal 60 menit sebelum keberangkatan.</li>

                            </ul>

                        </div>

                    </div>

                    <div class="button-area">

                        <a href="javascript:history.back()" class="btn-back">
                            Kembali
                        </a>

                        <button class="btn-next">

                            Lanjutkan

                        </button>

                    </div>

                </div>

                <!-- RIGHT -->

                <div class="right-content">

                    <div class="summary">

                        <h2>Detail Perjalanan</h2>

                        <div class="ship-box">

                            <i class="fa-solid fa-ship ship-icon"></i>

                            <div>

                                <h3><?= $kapal ?></h3>

                                <span class="badge"><?= $kelas ?></span>

                            </div>

                        </div>

                        <div class="route-box">

                            <div>

                                <small>Pelabuhan Asal</small>

                                <h4><?= $asal ?></h4>

                            </div>

                            <i class="fa-solid fa-arrow-down-long"></i>

                            <div>

                                <small>Pelabuhan Tujuan</small>

                                <h4><?= $tujuan ?></h4>

                            </div>

                        </div>

                        <div class="info-list">

                            <div>

                                <span>Tanggal</span>

                                <strong><?= $tanggal ?></strong>

                            </div>

                            <div>

                                <span>Jam Berangkat</span>

                                <strong><?= $jam_berangkat ?></strong>

                            </div>

                            <div>

                                <span>Jam Tiba</span>

                                <strong><?= $jam_tiba ?></strong>

                            </div>

                        </div>

                        <hr>

                        <h3>Rincian Harga</h3>

                        <div class="price-row">

                            <span>Tarif Penumpang</span>

                            <span>Rp <?= number_format($harga, 0, ',', '.') ?></span>

                        </div>

                        <div class="price-row">

                            <span>Biaya Admin</span>

                            <span>Rp 2.500</span>

                        </div>

                        <hr>

                        <div class="grand-total">

                            <span>Total Bayar</span>

                            <h2>

                                Rp <?= number_format($harga + 2500, 0, ',', '.') ?>

                            </h2>

                        </div>

                    </div>
                </div>

            </div>

        </form>

    </div>

    <?php include __DIR__ . '/../layout/ftr.html'; ?>

</body>

</html>