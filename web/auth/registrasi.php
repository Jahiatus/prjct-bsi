<?php
include "../../database/koneksi.php";

if (isset($_POST['register'])) {

    $nama_depan = mysqli_real_escape_string($conn, $_POST['nama_depan']);
    $nama_belakang = mysqli_real_escape_string($conn, $_POST['nama_belakang']);
    $umur = $_POST['umur'];
    $no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // enkripsi password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // cek email sudah ada atau belum
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($cek) > 0) {

        echo "Email sudah terdaftar";

    } else {

        $query = mysqli_query($conn, 
        "INSERT INTO users 
        (nama_depan, nama_belakang, umur, no_telp, email, password)
        VALUES
        ('$nama_depan','$nama_belakang','$umur','$no_telp','$email','$password')"
        );


        if ($query) {
            echo "Daftar berhasil";
            header("Location: login.php");
            exit();
        } else {
            echo "Gagal daftar";
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun OmbakBiru</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

<main class="login-page">

<section class="right-side">

<form class="login-card" method="post">

<h2>Buat Akun</h2>

<p class="subtitle">
Daftar untuk melanjutkan pemesanan tiket kapal
</p>


<div class="form-group">
<label>Nama Depan</label>
<input type="text" name="nama_depan" required>
</div>


<div class="form-group">
<label>Nama Belakang</label>
<input type="text" name="nama_belakang" required>
</div>


<div class="form-group">
<label>Umur</label>
<input type="number" name="umur" required>
</div>


<div class="form-group">
<label>No Telepon</label>
<input type="text" name="no_telp" required>
</div>


<div class="form-group">
<label>Email</label>
<input type="email" name="email" required>
</div>


<div class="form-group">
<label>Password</label>
<input type="password" name="password" required>
</div>


<button type="submit" name="register" class="login-btn">
Daftar Sekarang →
</button>


<p class="register-text">
Sudah punya akun?
<a href="login.php">Login</a>
</p>


</form>

</section>

</main>


</body>
</html>