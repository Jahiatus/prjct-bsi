<?php
session_start();
include "../../database/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama_depan'] . " " . $user['nama_belakang'];
            $_SESSION['email'] = $user['email'];

            header("Location: homepage.php");
            exit();
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ombak Biru</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

<main class="login-page">

    <section class="left-side">
        <a href="bdy.html" class="back-btn">← Kembali</a>

        <div class="brand-content">
            <div class="logo-wrap">
                <img src="../img/Asset 10.svg" alt="Logo Ombak Biru" class="logo">
            </div>

            <h1>Perjalanan Laut yang Dapat Diandalkan.</h1>

            <p class="description">
                Masuk untuk melanjutkan pemesanan tiket kapal feri dengan lebih mudah.
            </p>
        </div>
    </section>

    <section class="right-side">
        <form class="login-card" action="login.php" method="post">

            <h2>Selamat Datang</h2>

            <p class="subtitle">
                Masuk ke akun Anda untuk melanjutkan.
            </p>

            <div class="form-group">
                <label>Email</label>

                <div class="input-box">
                    <span class="icon">✉</span>

                    <input
                        type="email"
                        name="email"
                        placeholder="nama@email.com"
                        required>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>

                <div class="input-box">
                    <span class="icon">🔒</span>

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required>
                </div>
            </div>

            <button type="submit" class="login-btn">
                Masuk Sekarang →
            </button>

            <p class="register-text">
                Belum punya akun?
                <a href="registrasi.php">Daftar di sini</a>
            </p>

        </form>
    </section>

</main>

<script type="module" src="../js/firebase.js"></script>

</body>
</html>