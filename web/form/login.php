<?php
session_start();
include "../../database/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) > 0) {

        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {

            // Simpan data user ke Session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];

            // Pindah ke Homepage
            header("Location: ../form/homepage.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<body>
    <main class="login-page">
      <section class="left-side">
        <a href="bdy.html" class="back-btn">← Kembali</a>

        <div class="brand-content">
          <div class="logo-wrap">
            <img src="../img/Asset 10.svg" alt="Logo Ombak Biru" class="logo" />
          </div>
          <h1>Perjalanan Laut yang Dapat Diandalkan.</h1>

          <p class="description">
            Masuk untuk melanjutkan pemesanan tiket kapal feri dengan lebih
            mudah.
          </p>
        </div>
      </section>

      <section class="right-side">
        <form class="login-card" action="#" method="post">
          <h2>Selamat Datang</h2>
          <p class="subtitle">Masuk ke akun Anda untuk melanjutkan.</p>

          <div class="form-group">
            <label for="email">Email</label>

            <div class="input-box">
              <span class="icon">✉</span>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="nama@email.com"
                required
              />
            </div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>

            <div class="input-box">
              <span class="icon">🔒</span>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password"
                required
              />
            </div>
          </div>

          <div class="login-option">
            <label class="remember">
              <input type="checkbox" name="remember" />
              <span>Ingat saya</span>
            </label>

            <a href="#" class="forgot-password">Lupa password?</a>
          </div>

          <button type="submit" class="login-btn">Masuk Sekarang →</button>

          <div class="divider">
            <span>Atau masuk dengan</span>
          </div>

          <div class="social-login">
            <button type="button" class="social-btn google-btn">
              <span>G</span> Google
            </button>

            <button type="button" class="social-btn discord-btn">
              <span>◉</span> Discord
            </button>
          </div>

          <p class="register-text">
            Belum punya akun?
            <a href="daftar.html">Daftar di sini</a>
          </p>
        </form>
      </section>
    </main>
  </body>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>