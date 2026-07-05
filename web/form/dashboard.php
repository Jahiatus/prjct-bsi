<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../database/koneksi.php";

/*
Mengambil data terbaru dari database
supaya kalau profile diubah,
dashboard langsung ikut berubah.
*/

$id = $_SESSION['user_id'];

$query = mysqli_query($koneksi,
"SELECT * FROM users WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

$nama = $data['nama_depan']." ".$data['nama_belakang'];
$email = $data['email'];

/*
Kalau nanti ada foto profile di database
tinggal ganti bagian ini
*/

$foto = "../img/profile-default.png";
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Dashboard Pengguna</title>

<link rel="stylesheet" href="../css/dasboard.css">

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container">

    <!-- Sidebar -->

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

            <li class="active">
                <a href="dashboard.php">
                    <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="booking.php">
                    <i class="fa-solid fa-ticket"></i>
                    Booking
                </a>
            </li>

            <li>
                <a href="tiket.php">
                    <i class="fa-solid fa-ship"></i>
                    Tiket Saya
                </a>
            </li>

            <li>
                <a href="history.php">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    Riwayat
                </a>
            </li>

            <li>
                <a href="profile.php">
                    <i class="fa-solid fa-user"></i>
                    Profile
                </a>
            </li>

        </ul>

        <a class="logout" href="logout.php">

            <i class="fa-solid fa-right-from-bracket"></i>

            Logout

        </a>

    </aside>

    <!-- Content -->

    <main class="main">

        <div class="topbar">

            <h2>Dashboard</h2>

            <div class="user">

                <img src="<?= $foto ?>">

                <?= $nama ?>

            </div>

        </div>

        <div class="welcome">

            <h1>Selamat Datang, <?= $nama ?></h1>

            <p>Kelola pemesanan tiket kapal laut Anda di sini.</p>

        </div>

        <div class="card-container">

            <a href="booking.php" class="card">

                <i class="fa-solid fa-ticket"></i>

                <h3>Booking Tiket</h3>

                <p>Pesan tiket kapal.</p>

            </a>

            <a href="tiket.php" class="card">

                <i class="fa-solid fa-ship"></i>

                <h3>Tiket Saya</h3>

                <p>Lihat tiket aktif.</p>

            </a>

            <a href="profile.php" class="card">

                <i class="fa-solid fa-user"></i>

                <h3>Profil</h3>

                <p>Edit data akun.</p>

            </a>

        </div>

    </main>

</div>

</body>

</html>