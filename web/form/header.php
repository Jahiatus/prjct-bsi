<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../../database/koneksi.php";

$namaDepan = "LOGIN";
$foto = "../img/woman.png";

if (isset($_SESSION['user_id'])) {

    $id = $_SESSION['user_id'];

    $query = mysqli_query($koneksi, "SELECT nama_depan, foto FROM users WHERE id='$id'");

    if ($query && mysqli_num_rows($query) > 0) {

        $user = mysqli_fetch_assoc($query);

        $namaDepan = $user['nama_depan'];

        if (!empty($user['foto'])) {
            $foto = "../upload/profile/" . $user['foto'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Ombak Biru</title>
</head>
<body>
    
<link rel="stylesheet" href="../css/header.css" />

<header class="main-header">
  <div class="header-container">
    <div class="header-left">
      <div class="logo">
        <a href="../form/homepage.php">
          <img src="../img/Asset 7.svg" alt="Logo" width="100" />
        </a>
      </div>

      <nav class="nav-menu">
        <a href="../form/homepage.php#hero" class="nav-link"> Schedules </a>

        <a href="../form/cekbooking.php" class="nav-link"> Cek Booking </a>

        <a href="../form/booking.php" class="nav-link"> Booking </a>
      </nav>
    </div>

    <div class="header-right">
      <div class="notification-wrapper">
        <button class="notification-btn">
          <img
            src="../img/notification.png"
            alt="Notifications"
            class="icon-notification"
          />
        </button>
      </div>

      <div class="vertical-divider"></div>

<div class="user-profile">

<?php if(isset($_SESSION['user_id'])): ?>

    <a href="../form/dashboard.php" class="login-link">
        <span class="user-name">
            <?= htmlspecialchars($namaDepan); ?>
        </span>
    </a>

    <div class="user-photo-container">
        <a href="../form/dashboard.php">
            <img src="../img/woman.png" alt="User Profile" class="user-photo">
        </a>
    </div>

<?php else: ?>

    <a href="../form/login.php" class="login-link">
        <span class="user-name">
            LOGIN
        </span>
    </a>

    <div class="user-photo-container">
        <a href="../form/login.php">
            <img src="../img/woman.png" alt="User Profile" class="user-photo">
        </a>
    </div>

<?php endif; ?>

</div>
    </div>
  </div>
</header>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");

    function setActive(link) {
      navLinks.forEach((item) => {
        item.classList.remove("active");
      });

      link.classList.add("active");
    }

    navLinks.forEach((link) => {
      link.addEventListener("click", function () {
        setActive(this);
      });
    });
  });
</script>
</body>
</html