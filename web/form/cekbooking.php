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

$nama  = $u['nama_depan']." ".$u['nama_belakang'];
$email = $u['email'];
$foto  = "../img/profile.png";

$data = null;
$error = "";

if(isset($_POST['cari'])){

    $booking = mysqli_real_escape_string($koneksi,$_POST['booking']);

    $query = mysqli_query($koneksi,"
        SELECT *
        FROM tiket
        WHERE booking='$booking'
        AND user_id='$id'
    ");

    if(mysqli_num_rows($query)>0){
        $data = mysqli_fetch_assoc($query);
    }else{
        $error = "Kode booking tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Cek Booking</title>

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

            <li class="active">
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

    <!-- MAIN -->
    <main class="main">

        <div class="topbar">

            <h2>Cek Booking</h2>

            <div class="user">
                <img src="<?= $foto ?>">
                <?= $nama ?>
            </div>

        </div>

        <!-- Judul -->
        <div class="welcome">

            <h1>
                <i class="fa-solid fa-magnifying-glass"></i>
                Cek Booking
            </h1>

            <p>Masukkan kode booking untuk melihat status pemesanan.</p>

        </div>

        <!-- Form -->
        <div class="card-container">

            <div class="card">

                <form method="POST">

                    <div style="display:flex;gap:15px;flex-wrap:wrap;align-items:center;">

                        <input
                            type="text"
                            name="booking"
                            placeholder="Contoh : OB202607061234"
                            required

                            style="
                            flex:1;
                            padding:15px;
                            border:1px solid #ddd;
                            border-radius:10px;
                            font-size:15px;
                            ">

                        <button
                            type="submit"
                            name="cari"

                            style="
                            padding:15px 30px;
                            background:#2e73e5;
                            color:#fff;
                            border:none;
                            border-radius:10px;
                            cursor:pointer;
                            font-weight:600;
                            ">

                            Cari Booking

                        </button>

                    </div>

                </form>

            </div>

        </div>

        <!-- Error -->
        <?php if($error!=""){ ?>

        <div class="last-ticket">

            <p style="color:red;font-weight:600;">
                <?= $error ?>
            </p>

        </div>

        <?php } ?>

        <!-- Hasil -->
        <?php if($data){ ?>

        <div class="last-ticket">

            <h2>Detail Booking</h2>

            <div class="ticket-info">

                <div>
                    <h3><?= $data['kapal']; ?></h3>
                    <p><?= $data['asal']; ?> → <?= $data['tujuan']; ?></p>
                </div>

                <div>
                    <p>Status</p>

                    <?php if($data['status']=="Lunas"){ ?>

                        <span class="status">
                            Lunas
                        </span>

                    <?php }else{ ?>

                        <span style="
                        background:#f59e0b;
                        color:white;
                        padding:8px 18px;
                        border-radius:20px;">
                            Menunggu Pembayaran
                        </span>

                    <?php } ?>

                </div>

            </div>

            <br>

            <div class="ticket-detail">

                <div>
                    <label>Kode Booking</label>
                    <p><?= $data['booking']; ?></p>
                </div>

                <div>
                    <label>Kelas</label>
                    <p><?= $data['kelas']; ?></p>
                </div>

                <div>
                    <label>Tanggal</label>
                    <p><?= $data['tanggal']; ?></p>
                </div>

                <div>
                    <label>Jam</label>
                    <p><?= $data['jam_berangkat']; ?> - <?= $data['jam_tiba']; ?></p>
                </div>

                <div>
                    <label>Total</label>
                    <p>
                        Rp <?= number_format($data['total'],0,",","."); ?>
                    </p>
                </div>

            </div>

            <br>

            <?php if($data['status']=="Lunas"){ ?>

                <a href="e-tiket.php?id=<?= $data['id']; ?>" class="btn-ticket">

                    <i class="fa-solid fa-ticket"></i>

                    Lihat E-Tiket

                </a>

            <?php } ?>

        </div>

        <?php } ?>

    </main>

</div>

</body>
</html>