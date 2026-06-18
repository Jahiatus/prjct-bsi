<?php
include "config/koneksi.php";


if(isset($_POST['daftar'])){

$nama=$_POST['nama'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);


$query=mysqli_query($conn,

"INSERT INTO users
(nama_depan,email,password)

VALUES
('$nama','$email','$password')");


if($query){

echo "
<script>
alert('Berhasil daftar');
location='login.php';
</script>";

}

}

?>


<form method="post">

<h2>Buat Akun</h2>

<input name="nama" placeholder="Nama">
<input name="email" placeholder="Email">

<input 
type="password"
name="password"
placeholder="Password">


<button name="daftar">
Daftar
</button>


</form>