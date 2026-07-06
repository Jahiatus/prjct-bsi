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

    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = $_POST['password'];

    if ($password != "") {

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($koneksi, "
UPDATE users SET
nama_depan='$nama_depan',
nama_belakang='$nama_belakang',
email='$email',
telepon='$telepon',
password='$password'
WHERE id='$id'
");

    } else {

        mysqli_query($koneksi, "
UPDATE users SET
nama_depan='$nama_depan',
nama_belakang='$nama_belakang',
email='$email',
telepon='$telepon'
WHERE id='$id'
");

    }

    header("Location: profile.php?success=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profile Saya</title>

    <link rel="stylesheet" href="../css/profile.css">
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

        <div class="profile-user">
            <img src="../img/profile.png">
            <h3><?= $user['nama_depan'] . " " . $user['nama_belakang']; ?></h3>
            <p><?= $user['email']; ?></p>
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

    <!-- Main -->
    <main class="main">

        <div class="topbar">
            <h2>Profile Saya</h2>
        </div>

        <?php if (isset($_GET['success'])) { ?>

            <div class="success-box">
                Data profile berhasil diperbarui.
            </div>

        <?php } ?>

        <div class="profile-card">

            <h2>Edit Profile</h2>

            <form method="POST">

                <div class="grid">

                    <div class="input-group">
                        <label>Nama Depan</label>
                        <input type="text" name="nama_depan" value="<?= $user['nama_depan']; ?>" required>
                    </div>

                    <div class="input-group">
                        <label>Nama Belakang</label>
                        <input type="text" name="nama_belakang" value="<?= $user['nama_belakang']; ?>" required>
                    </div>

                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= $user['email']; ?>" required>
                    </div>

                    <div class="input-group">
                        <label>No. Telepon</label>
                        <input type="text" name="telepon" value="<?= $user['no_telp']; ?>" required>
                    </div>

                    <div class="input-group full">
                        <label>Password Baru</label>
                        <input type="password" name="password"
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