<?php

session_start();

if(!isset($_SESSION['user'])){

header("location:login.php");

}

?>


<h1>
SeaLink Dashboard
</h1>


<a href="booking.php">
Pesan Tiket
</a>


<a href="profile.php">
Profile
</a>


<a href="logout.php">
Logout
</a>