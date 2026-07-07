<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../database/koneksi.php";

$id = $_SESSION['user_id'];

/*
Ambil data user
*/

$user = mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");
$data = mysqli_fetch_assoc($user);

$nama = $data['nama_depan']." ".$data['nama_belakang'];
$email = $data['email'];
$foto = "../img/profile.png";

/*
Ambil semua tiket user
*/

$tiket = mysqli_query($koneksi,"
SELECT *
FROM tiket
WHERE user_id='$id'
AND status='Lunas'
ORDER BY id DESC
");

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Tiket Saya</title>

    <link rel="stylesheet" href="../css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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

                <li class="active">
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

            <a href="logout.php" class="logout">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </a>

        </aside>

        <!-- CONTENT -->

        <main class="main">

            <div class="topbar">

                <h2>Tiket Saya</h2>

                <div class="user">

                    <img src="<?= $foto ?>">

                    <?= $nama ?>

                </div>

            </div>

            <div class="welcome">

                <h1>Tiket Saya</h1>

                <p>Tiket aktif yang telah Anda pesan.</p>

            </div>

            <div class="ticket-list">

                <?php

                if (mysqli_num_rows($tiket) > 0) {

                    while ($row = mysqli_fetch_assoc($tiket)) {

                        ?>

                        <div class="ticket-card">

                            <div class="ticket-header">

                                <div>

                                    <h2><?= $row['kapal']; ?></h2>

                                    <p>

                                        <?= $row['asal']; ?>

                                        <i class="fa-solid fa-arrow-right"></i>

                                        <?= $row['tujuan']; ?>

                                    </p>

                                </div>

                                <span class="status">

                                    <?= $row['status']; ?>

                                </span>

                            </div>

                            <hr>

                            <div class="ticket-detail">

                                <div>

                                    <label>Tanggal</label>

                                    <p><?= $row['tanggal']; ?></p>

                                </div>

                                <div>

                                    <label>Berangkat</label>

                                    <p><?= $row['jam_berangkat']; ?></p>

                                </div>

                                <div>

                                    <label>Tiba</label>

                                    <p><?= $row['jam_tiba']; ?></p>

                                </div>

                                <div>

                                    <label>Total</label>

                                    <p>

                                        Rp <?= number_format($row['total'], 0, ',', '.'); ?>

                                    </p>

                                </div>

                            </div>

                            <a href="e-tiket.php?id=<?= $row['id']; ?>" class="btn-ticket">

                                Lihat E-Tiket

                            </a>

                        </div>

                        <?php

                    }

                } else {

                    ?>

                    <div class="empty">

                        <i class="fa-solid fa-ticket"></i>

                        <h2>Belum Ada Tiket</h2>

                        <p>Anda belum melakukan pemesanan tiket.</p>

                        <a href="homepage.php">

                            Booking Sekarang

                        </a>

                    </div>

                <?php } ?>

            </div>

        </main>

    </div>

</body>

</html>