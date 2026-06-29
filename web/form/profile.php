<?php

session_start();

include "config/koneksi.php";


if(!isset($_SESSION['user'])){

header("location:login.php");

}


$id=$_SESSION['user'];


$data=mysqli_query($conn,

"SELECT * FROM users WHERE id='$id'");


$user=mysqli_fetch_assoc($data);


?>


<h2>My Profile</h2>


<p>
Nama :
<?= $user['nama_depan']; ?>
</p>


<p>
Email :
<?= $user['email']; ?>
</p>


<a href="dashboard.php">
Kembali
</a>


<a href="logout.php">
Logout
</a>