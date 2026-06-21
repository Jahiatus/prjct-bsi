-- Active: 1775891342428@@localhost@3306@dbwp
<?php
session_start();
include "../../database/koneksi.php";
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    $data = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if ($data && mysqli_num_rows($data) > 0) {
        $user = mysqli_fetch_assoc($data);
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['id'];
            header("Location: ../form/homepage.php"); 
            exit(); 
        } else {
            echo "Login gagal: Password salah.";
        }
    } else {
        echo "Login gagal: Email tidak terdaftar.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Akun OmbakBiru</title>
    <link rel="icon" type="image/svg+xml" href="../img/Asset 10.svg">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
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
                        <input type="email" id="email" name="email" placeholder="nama@email.com" required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="input-box">
                        <span class="icon">🔒</span>
                        <input type="password" id="password" name="password" placeholder="Masukkan Password" required />
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
                    Belum punya akun? <a href="daftar.html">Daftar di sini</a>
                </p>
            </form>
        </section>
    </main>
</body>

</html>