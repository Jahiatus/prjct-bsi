<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: homepage.php");
    exit;
}

// ======================
// DATA PERJALANAN
// ======================

$kapal = $_POST['kapal'] ?? '';
$kelas = $_POST['kelas'] ?? '';
$asal = $_POST['asal'] ?? '';
$tujuan = $_POST['tujuan'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';
$jam_berangkat = $_POST['jam_berangkat'] ?? '';
$jam_tiba = $_POST['jam_tiba'] ?? '';
$total = $_POST['total'] ?? 0;

// ======================
// DATA PEMESAN
// ======================

$nama_pemesan = $_POST['nama_pemesan'] ?? '';
$telepon = $_POST['telepon'] ?? '';
$email = $_POST['email'] ?? '';

// ======================
// DATA PENUMPANG
// ======================

$titel = $_POST['titel'] ?? '';
$nama_penumpang = $_POST['nama_penumpang'] ?? '';
$jenis_id = $_POST['jenis_id'] ?? '';
$nomor_id = $_POST['nomor_id'] ?? '';
$usia = $_POST['usia'] ?? '';
$kota = $_POST['kota'] ?? '';

// ======================
// NOMOR BOOKING
// ======================

$booking = $_POST['booking'];

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>E-Tiket Ombak Biru</title>

<link rel="stylesheet" href="../css/e-tiket.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include __DIR__.'/../layout/hdr.html'; ?>

<div class="container">

<div class="stepper">

<div class="step done">
<div class="circle"><i class="fa-solid fa-check"></i></div>
<span>Isi Data</span>
</div>

<div class="line active"></div>

<div class="step done">
<div class="circle"><i class="fa-solid fa-check"></i></div>
<span>Verifikasi</span>
</div>

<div class="line active"></div>

<div class="step done">
<div class="circle"><i class="fa-solid fa-check"></i></div>
<span>Pembayaran</span>
</div>

<div class="line active"></div>

<div class="step active">
<div class="circle"><i class="fa-solid fa-ticket"></i></div>
<span>E-Tiket</span>
</div>

</div>

<div class="ticket-card">

<div class="ticket-header">

<div>

<h1>Ombak Biru</h1>

<p>E-Ticket Penyeberangan</p>

</div>

<div class="status">

LUNAS

</div>

</div>

<div class="booking-box">

<div>

<small>Nomor Booking</small>

<h2><?= $booking ?></h2>

</div>

<div>

<small>Tanggal Pemesanan</small>

<h3><?= date("d M Y") ?></h3>

</div>

</div>

<hr>

<h2>Detail Perjalanan</h2>

<div class="trip-grid">

<div>

<label>Nama Kapal</label>

<h3><?= $kapal ?></h3>

</div>

<div>

<label>Kelas</label>

<h3><?= $kelas ?></h3>

</div>

<div>

<label>Pelabuhan Asal</label>

<h3><?= $asal ?></h3>

</div>

<div>

<label>Pelabuhan Tujuan</label>

<h3><?= $tujuan ?></h3>

</div>

<div>

<label>Tanggal</label>

<h3><?= $tanggal ?></h3>

</div>

<div>

<label>Jam Berangkat</label>

<h3><?= $jam_berangkat ?></h3>

</div>

<div>

<label>Jam Tiba</label>

<h3><?= $jam_tiba ?></h3>

</div>

<div>

<label>Total Bayar</label>

<h3>

Rp <?= number_format($total,0,',','.') ?>

</h3>

</div>

</div>
<hr>

<h2>Data Pemesan</h2>

<div class="info-grid">

    <div class="info-item">
        <label>Nama Pemesan</label>
        <p><?= $nama_pemesan ?></p>
    </div>

    <div class="info-item">
        <label>Nomor Handphone</label>
        <p><?= $telepon ?></p>
    </div>

    <div class="info-item full">
        <label>Email</label>
        <p><?= $email ?></p>
    </div>

</div>

<hr>

<h2>Data Penumpang</h2>

<div class="info-grid">

    <div class="info-item">
        <label>Titel</label>
        <p><?= $titel ?></p>
    </div>

    <div class="info-item">
        <label>Nama Lengkap</label>
        <p><?= $nama_penumpang ?></p>
    </div>

    <div class="info-item">
        <label>Jenis Identitas</label>
        <p><?= $jenis_id ?></p>
    </div>

    <div class="info-item">
        <label>Nomor Identitas</label>
        <p><?= $nomor_id ?></p>
    </div>

    <div class="info-item">
        <label>Usia</label>
        <p><?= $usia ?> Tahun</p>
    </div>

    <div class="info-item">
        <label>Kota/Kabupaten</label>
        <p><?= $kota ?></p>
    </div>

</div>

<hr>

<div class="ticket-bottom">

    <div class="barcode">

        <h3>Scan Saat Check-in</h3>

        <img src="../img/qr.png" alt="QR Code">

        <p><?= $booking ?></p>

    </div>

    <div class="important">

        <h3>Informasi Penting</h3>

        <ul>

            <li>Harap datang minimal 60 menit sebelum keberangkatan.</li>

            <li>Tunjukkan E-Tiket dan identitas asli saat check-in.</li>

            <li>E-Tiket hanya berlaku untuk satu kali perjalanan.</li>

            <li>Simpan tiket ini hingga perjalanan selesai.</li>

        </ul>

    </div>

</div>

<div class="button-group">

    <button onclick="window.print()" class="download-btn">

        <i class="fa-solid fa-download"></i>

        Download PDF

    </button>

    <a href="homepage.php" class="home-btn">

        <i class="fa-solid fa-house"></i>

        Kembali ke Beranda

    </a>

</div>

</div>

</div>

<?php include __DIR__.'/../layout/ftr.html'; ?>

</body>
</html>