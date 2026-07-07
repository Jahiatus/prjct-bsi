<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../database/koneksi.php";

$id = $_SESSION['user_id'];

/* Ambil data user */
$user = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$u = mysqli_fetch_assoc($user);

$nama = $u['nama_depan'] . " " . $u['nama_belakang'];
$email = $u['email'];
$foto = "../img/profile.png";

/* Ambil riwayat */
$history = mysqli_query($koneksi, "
SELECT *
FROM booking
WHERE user_id='$id'
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Riwayat Perjalanan</title>

<link rel="stylesheet" href="../css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container">

<!-- SIDEBAR -->

<aside class="sidebar">

<div class="logo">
    <h2>Ombak Biru</h2>
</div>

<div class="profile">

    <img src="<?= $foto ?>">

    <h3><?= $nama ?></h3>

    <p><?= $email ?></p>

</div>

<ul>

<li>
<a href="dashboard.php">
<i class="fa-solid fa-house"></i>
Dashboard
</a>
</li>

<li>
<a href="booking.php">
<i class="fa-solid fa-ticket"></i>
Cek Booking
</a>
</li>

<li>
<a href="tiket.php">
<i class="fa-solid fa-ship"></i>
Tiket Saya
</a>
</li>

<li class="active">
<a href="history.php">
<i class="fa-solid fa-clock-rotate-left"></i>
Riwayat
</a>
</li>

<li>
<a href="profile.php">
<i class="fa-solid fa-user"></i>
Profil
</a>
</li>

</ul>

<a href="logout.php" class="logout">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</aside>

<!-- MAIN -->

<main class="main">

<div class="topbar">

<h2>Riwayat</h2>

<div class="user">

<img src="<?= $foto ?>">

<?= $nama ?>

</div>

</div>

<div class="welcome">

<h1>Riwayat Perjalanan</h1>

<p>Daftar seluruh perjalanan yang pernah Anda lakukan.</p>

</div>

<div class="history-list">

<?php if(mysqli_num_rows($history)>0){ ?>

<?php while($row=mysqli_fetch_assoc($history)){ ?>

<div class="history-card">

<div class="left">

<h2><?= $row['kapal']; ?></h2>

<p>

<?= $row['asal']; ?>

<i class="fa-solid fa-arrow-right"></i>

<?= $row['tujuan']; ?>

</p>

<span>

<?= $row['tanggal']; ?>

|

<?= $row['jam_berangkat']; ?>

</span>

</div>

<div class="right">

<h3>

Rp <?= number_format($row['total'],0,",","."); ?>

</h3>

<span class="status">

<?= $row['status']; ?>

</span>

<br>

<a href="e-tiket.php?id=<?= $row['id']; ?>" class="btn-ticket">

Lihat Tiket

</a>

</div>

</div>

<?php } ?>

<?php } else { ?>

<div class="empty">

<i class="fa-solid fa-clock-rotate-left"></i>

<h2>Belum Ada Riwayat</h2>

<p>Riwayat perjalanan akan muncul setelah Anda melakukan pemesanan.</p>

</div>

<?php } ?>

</div>

</main>

</div>

</body>
</html>