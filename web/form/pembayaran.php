<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: homepage.php");
    exit;
}

// =========================
// DATA PERJALANAN
// =========================

$kapal = $_POST['kapal'] ?? '';
$kelas = $_POST['kelas'] ?? '';
$asal = $_POST['asal'] ?? '';
$tujuan = $_POST['tujuan'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';
$jam_berangkat = $_POST['jam_berangkat'] ?? '';
$jam_tiba = $_POST['jam_tiba'] ?? '';
$harga = (int)($_POST['harga'] ?? 0);

// =========================
// DATA PEMESAN
// =========================

$nama_pemesan = $_POST['nama_pemesan'] ?? '';
$telepon = $_POST['telepon'] ?? '';
$email = $_POST['email'] ?? '';

// =========================
// DATA PENUMPANG
// =========================

$titel = $_POST['titel'] ?? '';
$nama_penumpang = $_POST['nama_penumpang'] ?? '';
$jenis_id = $_POST['jenis_id'] ?? '';
$nomor_id = $_POST['nomor_id'] ?? '';
$usia = $_POST['usia'] ?? '';
$kota = $_POST['kota'] ?? '';

$total = $harga + 2500;
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pembayaran | Ombak Biru</title>

<link rel="stylesheet" href="../css/pembayaran.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include __DIR__.'/../layout/hdr.html'; ?>

<div class="payment-page">

<!-- ======================
     STEPPER
======================= -->

<div class="stepper">

<div class="step done">
<div class="circle"><i class="fa fa-check"></i></div>
<span>Isi Data</span>
</div>

<div class="line active"></div>

<div class="step done">
<div class="circle"><i class="fa fa-check"></i></div>
<span>Verifikasi</span>
</div>

<div class="line active"></div>

<div class="step active">
<div class="circle">3</div>
<span>Pembayaran</span>
</div>

<div class="line"></div>

<div class="step">
<div class="circle">4</div>
<span>E-Tiket</span>
</div>

</div>

<div class="payment-card">

<div class="card-header">

<h2>Konfirmasi Pembayaran</h2>

</div>

<div class="card-body">

<!-- DETAIL PERJALANAN -->

<div class="trip-card">

<h4>Rute Perjalanan</h4>

<div class="route">

<span><?= $asal ?></span>

<span>🚢</span>

<span><?= $tujuan ?></span>

</div>

<hr>

<div class="detail-grid">

<div class="detail-item">

<div>

<small>Nama Kapal</small>

<p><?= $kapal ?></p>

</div>

</div>

<div class="detail-item">

<div>

<small>Kelas</small>

<p><?= $kelas ?></p>

</div>

</div>

<div class="detail-item">

<div>

<small>Tanggal</small>

<p><?= $tanggal ?></p>

</div>

</div>

<div class="detail-item">

<div>

<small>Jam</small>

<p><?= $jam_berangkat ?> - <?= $jam_tiba ?></p>

</div>

</div>

</div>

</div>

<!-- COUNTDOWN -->

<div class="countdown">

<h3>Selesaikan Pembayaran Dalam</h3>

<div class="timer" id="timer">

15:00

</div>

</div>

<!-- STATUS -->

<div class="status">

Menunggu Pembayaran

</div>

<!-- METODE -->

<div class="payment-section">

<h4>Metode Pembayaran</h4>

<div class="payment-option active">

<div class="payment-info">

<div>

<h5>QRIS</h5>

<small>Scan QR Code menggunakan aplikasi pembayaran.</small>

</div>

</div>

<strong>

Rp <?= number_format($total,0,',','.') ?>

</strong>

</div>

</div>

<!-- QRIS -->

<div class="qris">

<img src="../img/qris.png" alt="QRIS">

</div>

<!-- TOTAL -->

<div class="total-box">

<span>Total Bayar</span>

<h2>

Rp <?= number_format($total,0,',','.') ?>

</h2>

</div>

<form action="tiket.php" method="POST">

<?php
foreach($_POST as $key=>$value){
echo '<input type="hidden" name="'.$key.'" value="'.htmlspecialchars($value).'">';
}
?>

<input type="hidden" name="total" value="<?= $total ?>">

<div class="card-footer">

<button class="pay-btn">

Saya Sudah Bayar

</button>

</div>

</form>

</div>

</div>

</div>

<script>

let time = 900;

const timer = document.getElementById("timer");

setInterval(function(){

let menit = Math.floor(time/60);

let detik = time%60;

timer.innerHTML =
String(menit).padStart(2,"0")
+ ":"
+
String(detik).padStart(2,"0");

if(time>0){
time--;
}

},1000);

</script>

<?php include __DIR__.'/../layout/ftr.html'; ?>

</body>

</html>