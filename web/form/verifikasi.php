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

$nama_pemesan = $_POST['nama_pemesan'] ?? '';
$telepon = $_POST['telepon'] ?? '';
$email = $_POST['email'] ?? '';

$titel = $_POST['titel'] ?? '';
$nama_penumpang = $_POST['nama_penumpang'] ?? '';
$jenis_id = $_POST['jenis_id'] ?? '';
$nomor_id = $_POST['nomor_id'] ?? '';
$usia = $_POST['usia'] ?? '';
$kota = $_POST['kota'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Verifikasi Data | Ombak Biru</title>

<link rel="stylesheet" href="../css/verifikasi.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include __DIR__.'/../layout/hdr.html'; ?>

<div class="container">

<!-- STEP -->

<div class="stepper">

<div class="step done">
<div class="circle">
<i class="fa-solid fa-check"></i>
</div>
<span>Isi Data</span>
</div>

<div class="line active"></div>

<div class="step active">
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

<form action="pembayaran.php" method="POST">

<?php
foreach($_POST as $key=>$value){
echo '<input type="hidden" name="'.$key.'" value="'.htmlspecialchars($value).'">';
}
?>

<div class="content">

<div class="left">

<div class="card">

<h2>
<i class="fa-solid fa-user"></i>
Data Pemesan
</h2>

<table>

<tr>
<td>Nama</td>
<td><?= $nama_pemesan ?></td>
</tr>

<tr>
<td>No. Handphone</td>
<td><?= $telepon ?></td>
</tr>

<tr>
<td>Email</td>
<td><?= $email ?></td>
</tr>

</table>

</div>

<div class="card">

<h2>

<i class="fa-solid fa-id-card"></i>

Data Penumpang

</h2>

<table>

<tr>

<td>Titel</td>

<td><?= $titel ?></td>

</tr>

<tr>

<td>Nama</td>

<td><?= $nama_penumpang ?></td>

</tr>

<tr>

<td>Jenis Identitas</td>

<td><?= $jenis_id ?></td>

</tr>

<tr>

<td>Nomor Identitas</td>

<td><?= $nomor_id ?></td>

</tr>

<tr>

<td>Usia</td>

<td><?= $usia ?> Tahun</td>

</tr>

<tr>

<td>Kota</td>

<td><?= $kota ?></td>

</tr>

</table>

</div>

<div class="agreement">

<label>

<input type="checkbox" required>

Saya menyatakan bahwa seluruh data yang diisi sudah benar dan sesuai dengan identitas asli.

</label>

</div>

<div class="button-group">

<button
type="button"
class="btn-back"
onclick="history.back()">

Kembali

</button>

<button
type="submit"
class="btn-next">

Lanjut Pembayaran

</button>

</div>

</div>

<!-- RIGHT -->

<div class="right">

<div class="summary">

<h2>

Detail Perjalanan

</h2>

<div class="ship">

<i class="fa-solid fa-ship"></i>

<div>

<h3><?= $kapal ?></h3>

<span><?= $kelas ?></span>

</div>

</div>

<hr>

<div class="detail">

<span>Rute</span>

<strong><?= $asal ?> → <?= $tujuan ?></strong>

</div>

<div class="detail">

<span>Tanggal</span>

<strong><?= $tanggal ?></strong>

</div>

<div class="detail">

<span>Berangkat</span>

<strong><?= $jam_berangkat ?></strong>

</div>

<div class="detail">

<span>Tiba</span>

<strong><?= $jam_tiba ?></strong>

</div>

<hr>

<div class="detail">

<span>Harga Tiket</span>

<strong>Rp <?= number_format($harga,0,',','.') ?></strong>

</div>

<div class="detail">

<span>Biaya Admin</span>

<strong>Rp 2.500</strong>

</div>

<hr>

<div class="total">

<span>Total</span>

<h2>

Rp <?= number_format($harga+2500,0,',','.') ?>

</h2>

</div>

</div>

</div>

</div>

</form>

</div>

<?php include __DIR__.'/../layout/ftr.html'; ?>

</body>

</html>