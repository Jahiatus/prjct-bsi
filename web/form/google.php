<?php

session_start();

include "../../database/koneksi.php";


$email = $_GET['email'];
$nama = $_GET['nama'];



$cek = mysqli_query($koneksi,

"SELECT * FROM users WHERE email='$email'"

);



if(mysqli_num_rows($cek)>0){


$user=mysqli_fetch_assoc($cek);


}else{


mysqli_query($koneksi,

"INSERT INTO users
(nama_depan,email,created_at)

VALUES

('$nama','$email',NOW())"

);


$user=mysqli_fetch_assoc(

mysqli_query($koneksi,

"SELECT * FROM users WHERE email='$email'"

)

);


}




$_SESSION['user_id']=$user['id'];

$_SESSION['email']=$user['email'];

$_SESSION['nama']=$nama;



header("location:homepage.php");

exit();


?>