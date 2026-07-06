<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../database/koneksi.php";
?>
$id=$_SESSION['user_id'];

$query=mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");
$user=mysqli_fetch_assoc($query);

if(isset($_POST['simpan'])){

$nama_depan=$_POST['nama_depan'];
$nama_belakang=$_POST['nama_belakang'];
$email=$_POST['email'];
$telepon=$_POST['telepon'];

$password=$_POST['password'];

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
exit;

}
?>