<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../database/koneksi.php";

$id = $_SESSION['user_id'];
$total = mysqli_fetch_assoc(mysqli_query($koneksi,"
SELECT COUNT(*) total
FROM tiket
WHERE user_id='$id'
"));

$aktif = mysqli_fetch_assoc(mysqli_query($koneksi,"
SELECT COUNT(*) aktif
FROM tiket
WHERE user_id='$id'
AND status='Lunas'
"));

$history = mysqli_fetch_assoc(mysqli_query($koneksi,"
SELECT COUNT(*) history
FROM tiket
WHERE user_id='$id'
"));

$last = mysqli_query($koneksi,"
SELECT *
FROM tiket
WHERE user_id='$id'
ORDER BY id DESC
LIMIT 1
");

$data = mysqli_fetch_assoc($last);

$query = mysqli_query($koneksi,"
SELECT *
FROM users
WHERE id='$id'
");

$user = mysqli_fetch_assoc($query);

if (!$user) {
    die("Data user tidak ditemukan.");
}

$nama = $user['nama_depan'] . " " . $user['nama_belakang'];
$email = $user['email'];

$lastTicket = mysqli_fetch_assoc($last);

/*
Kalau nanti ada foto profile di database
tinggal ganti bagian ini
*/

$foto = "../img/profile.png";
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Dashboard Pengguna</title>

    <link rel="stylesheet" href="../css/dasboard.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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
                    <a href="homepage.php">
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

            <div class="stats">

                <div class="box">

                    <h3><?= $total['total'] ?></h3>

                    <p>Total Tiket</p>

                </div>

                <div class="box">

                    <h3><?= $aktif['aktif'] ?></h3>

                    <p>Tiket Aktif</p>

                </div>

                <div class="box">

                    <h3><?= $history['history'] ?></h3>

                    <p>Riwayat Perjalanan</p>

                </div>

            </div>

            <div class="last-ticket">

                <h2>Perjalanan Terakhir</h2>

                <?php if($lastTicket){ ?>

                    <div class="ticket-info">

                        <h3><?= $lastTicket['asal'] ?> → <?= $lastTicket['tujuan'] ?></h3>

                        <p>
                            <?= $lastTicket['tanggal'] ?>
                            |
                            <?= $lastTicket['jam_berangkat'] ?>
                        </p>

                        <p><?= $lastTicket['kapal'] ?></p>

                        <strong>
                            Rp <?= number_format($lastTicket['total'], 0, ',', '.') ?>
                        </strong>

                    </div>

                <?php } else { ?>

                    <p>Belum ada tiket yang dipesan.</p>

                <?php } ?>

            </div>

            <div class="card-container">

                <a href="../web/form/cekkbooking.php" class="card">

                    <i class="fa-solid fa-ticket"></i>

                    <h3>Cek Booking</h3>

                    <p>Lihat status booking Anda.</p>

                </a>

                <a href="tiket.php" class="card">

                    <i class="fa-solid fa-ship"></i>

                    <h3>Tiket Saya</h3>

                    <p>Lihat e-ticket yang aktif.</p>

                </a>

                <a href="profile.php" class="card">

                    <i class="fa-solid fa-user"></i>

                    <h3>Profil</h3>

                    <p>Kelola akun Anda.</p>

                </a>

            </div>

        </main>

    </div>

</body>

</html>