<?php
include "../../database/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $umur = $_POST['umur'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM users WHERE email='$email'"
    );

    if (mysqli_num_rows($cek) > 0) {

        echo "<script>
        alert('Email sudah terdaftar!');
        </script>";

    } else {

        $query = mysqli_query(
            $koneksi,
            "INSERT INTO users
            (nama_depan,nama_belakang,umur,no_telp,email,password,created_at)

            VALUES

            ('$nama_depan',
            '$nama_belakang',
            '$umur',
            '$no_telp',
            '$email',
            '$password',
            NOW())"
        );

        if ($query) {

            echo "<script>
            alert('Registrasi berhasil!');
            window.location='login.php';
            </script>";

        } else {

            echo "Registrasi gagal";

        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | Ombak Biru</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

<main class="login-page">

    <section class="left-side">

        <a href="login.php" class="back-btn">
            ← Kembali
        </a>

        <div class="brand-content">

            <div class="logo-wrap">
                <img src="../img/Asset 10.svg" class="logo">
            </div>

            <h1>
                Perjalanan Laut yang Dapat Diandalkan.
            </h1>

            <p class="description">
                Daftar akun untuk melakukan pemesanan tiket kapal feri dengan lebih mudah.
            </p>

        </div>

    </section>

    <section class="right-side">

        <form class="login-card" action="registrasi.php" method="post">

            <h2>
                Buat Akun
            </h2>

            <p class="subtitle">
                Daftar untuk melanjutkan perjalanan Anda.
            </p>

            <div class="form-group">

                <label>
                    Nama Depan
                </label>

                <div class="input-box">
                    <input
                        type="text"
                        name="nama_depan"
                        required>
                </div>

            </div>

            <div class="form-group">

                <label>
                    Nama Belakang
                </label>

                <div class="input-box">
                    <input
                        type="text"
                        name="nama_belakang"
                        required>
                </div>

            </div>

            <div class="form-group">

                <label>
                    Umur
                </label>

                <div class="input-box">
                    <input
                        type="number"
                        name="umur"
                        required>
                </div>

            </div>

            <div class="form-group">

                <label>
                    Nomor Telepon
                </label>

                <div class="input-box">
                    <input
                        type="text"
                        name="no_telp"
                        required>
                </div>

            </div>

            <div class="form-group">

                <label>
                    Email
                </label>

                <div class="input-box">
                    <input
                        type="email"
                        name="email"
                        placeholder="nama@email.com"
                        required>
                </div>

            </div>

            <div class="form-group">

                <label>
                    Password
                </label>

                <div class="input-box">
                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required>
                </div>

            </div>

            <button type="submit" class="login-btn">
                Daftar Sekarang →
            </button>

            <div class="divider">
            </div>

            <div class="social-login">
            </div>

            <p class="register-text">
                Sudah punya akun?
                <a href="login.php">
                    Login
                </a>
            </p>

        </form>

    </section>

</main>

</body>

</html>