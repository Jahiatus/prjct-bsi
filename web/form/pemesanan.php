<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: homepage.php");
    exit;
}

$kapal = $_POST['kapal'];
$kelas = $_POST['kelas'];
$asal = $_POST['asal'];
$tujuan = $_POST['tujuan'];
$tanggal = $_POST['tanggal'];
$jam_berangkat = $_POST['jam_berangkat'];
$jam_tiba = $_POST['jam_tiba'];
$harga = $_POST['harga'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pemesan</title>
</head>
<body>

<h2>Informasi Pemesan</h2>

<form action="penumpang.php" method="POST">

    <!-- Data dari jadwal.php -->
    <input type="hidden" name="kapal" value="<?= $kapal ?>">
    <input type="hidden" name="kelas" value="<?= $kelas ?>">
    <input type="hidden" name="asal" value="<?= $asal ?>">
    <input type="hidden" name="tujuan" value="<?= $tujuan ?>">
    <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
    <input type="hidden" name="jam_berangkat" value="<?= $jam_berangkat ?>">
    <input type="hidden" name="jam_tiba" value="<?= $jam_tiba ?>">
    <input type="hidden" name="harga" value="<?= $harga ?>">

    <label>Nama Pemesan</label><br>
    <input type="text" name="nama_pemesan" required><br><br>

    <label>Nomor Handphone</label><br>
    <input type="text" name="telepon" required><br><br>

    <label>Alamat Email</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Lanjut</button>

</form>

</body>
</html>