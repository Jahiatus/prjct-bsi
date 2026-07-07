<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../database/koneksi.php";

$id = $_SESSION['user_id'];

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

        $error="Kode booking tidak ditemukan.";

    }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Cek Booking | Ombak Biru</title>

<link rel="stylesheet" href="../css/cekbook.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include __DIR__.'/../layout/hdr.html'; ?>

<div class="booking-container">

    <div class="booking-card">

        <h2>
            <i class="fa-solid fa-magnifying-glass"></i>
            Cek Booking
        </h2>

        <p>
            Masukkan kode booking untuk melihat status pemesanan.
        </p>

        <form method="POST">

            <input
                type="text"
                name="booking"
                placeholder="Contoh : OB202607061234"
                required>

            <button
                type="submit"
                name="cari">

                Cari Booking

            </button>

        </form>

        <?php if($error!=""){ ?>

        <div class="error">

            <?= $error ?>

        </div>

        <?php } ?>

        <?php if($data){ ?>

        <div class="result">

            <h3>Detail Booking</h3>

            <table>

                <tr>

                    <td>Kode Booking</td>

                    <td><?= $data['booking'] ?></td>

                </tr>

                <tr>

                    <td>Status</td>

                    <td>

                    <?php
                    if($data['status']=="Lunas"){
                        echo "<span class='success'>Lunas</span>";
                    }else{
                        echo "<span class='waiting'>Menunggu Pembayaran</span>";
                    }
                    ?>

                    </td>

                </tr>

                <tr>

                    <td>Kapal</td>

                    <td><?= $data['kapal'] ?></td>

                </tr>

                <tr>

                    <td>Kelas</td>

                    <td><?= $data['kelas'] ?></td>

                </tr>

                <tr>

                    <td>Rute</td>

                    <td><?= $data['asal'] ?> → <?= $data['tujuan'] ?></td>

                </tr>

                <tr>

                    <td>Tanggal</td>

                    <td><?= $data['tanggal'] ?></td>

                </tr>

                <tr>

                    <td>Jam</td>

                    <td><?= $data['jam_berangkat'] ?> - <?= $data['jam_tiba'] ?></td>

                </tr>

                <tr>

                    <td>Total</td>

                    <td>

                    Rp <?= number_format($data['total'],0,',','.') ?>

                    </td>

                </tr>

            </table>

            <div class="button-group">

                <?php if($data['status']=="Lunas"){ ?>

                <a
                    href="tiket.php?booking=<?= $data['booking'] ?>"
                    class="btn-blue">

                    <i class="fa-solid fa-ticket"></i>

                    Lihat E-Tiket

                </a>

                <?php } ?>

                <a
                    href="dashboard.php"
                    class="btn-grey">

                    <i class="fa-solid fa-house"></i>

                    Dashboard

                </a>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

<?php include __DIR__.'/../layout/ftr.html'; ?>

</body>

</html>