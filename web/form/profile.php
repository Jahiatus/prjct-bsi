<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../database/koneksi.php";

$id = $_SESSION['user_id'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($query);

if (isset($_POST['simpan'])) {

    $nama_depan = mysqli_real_escape_string($koneksi,$_POST['nama_depan']);
    $nama_belakang = mysqli_real_escape_string($koneksi,$_POST['nama_belakang']);
    $email = mysqli_real_escape_string($koneksi,$_POST['email']);
    $telepon = mysqli_real_escape_string($koneksi,$_POST['telepon']);
    $password = $_POST['password'];

    if($password!=""){

        $password=password_hash($password,PASSWORD_DEFAULT);

        mysqli_query($koneksi,"
        UPDATE users SET
        nama_depan='$nama_depan',
        nama_belakang='$nama_belakang',
        email='$email',
        telepon='$telepon',
        password='$password'
        WHERE id='$id'
        ");

    }else{

        mysqli_query($koneksi,"
        UPDATE users SET
        nama_depan='$nama_depan',
        nama_belakang='$nama_belakang',
        email='$email',
        telepon='$telepon'
        WHERE id='$id'
        ");

    }

    header("Location: profile.php?success=1");
    exit();
}

$foto="../img/profile.png";
$nama=$user['nama_depan']." ".$user['nama_belakang'];
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profile Saya</title>

<link rel="stylesheet" href="../css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        <p><?= $user['email'] ?></p>

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

        <li>
            <a href="history.php">
                <i class="fa-solid fa-clock-rotate-left"></i>
                Riwayat
            </a>
        </li>

        <li class="active">
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

    <h2>Profile Saya</h2>

    <div class="user">

        <img src="<?= $foto ?>">

        <?= $nama ?>

    </div>

</div>

<div class="welcome">

    <h1>Profile Saya</h1>

    <p>Kelola informasi akun Anda.</p>

</div>

<?php if(isset($_GET['success'])){ ?>

<div class="alert-success" style="margin:0 35px 25px;">
    Data profile berhasil diperbarui.
</div>

<?php } ?>

<div class="profile-card">

<h2 style="margin-bottom:30px;">Edit Profile</h2>

<form method="POST">

<div class="form-row">
<div class="form-group">

    <label>Nama Depan</label>

    <input
        type="text"
        name="nama_depan"
        value="<?= $user['nama_depan']; ?>"
        required>

</div>

<div class="form-group">

    <label>Nama Belakang</label>

    <input
        type="text"
        name="nama_belakang"
        value="<?= $user['nama_belakang']; ?>"
        required>

</div>

<div class="form-group">

    <label>Email</label>

    <input
        type="email"
        name="email"
        value="<?= $user['email']; ?>"
        required>

</div>

<div class="form-group">

    <label>No. Telepon</label>

    <input
        type="text"
        name="telepon"
        value="<?= $user['no_telp']; ?>"
        required>

</div>

<div class="form-group full">

    <label>Password Baru</label>

    <input
        type="password"
        name="password"
        placeholder="Kosongkan jika tidak ingin mengubah password">

</div>

</div>

<button type="submit" name="simpan" class="btn-save">

    <i class="fa-solid fa-floppy-disk"></i>

    Simpan Perubahan

</button>

</form>

</div>
</main>

</div>

</body>

</html>