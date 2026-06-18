<?php

session_start();

include "config/koneksi.php";


if(isset($_POST['login'])){


$email=$_POST['email'];

$password=$_POST['password'];


$data=mysqli_query($conn,

"SELECT * FROM users 
WHERE email='$email'");


$user=mysqli_fetch_assoc($data);



if(password_verify(
$password,
$user['password']
)){


$_SESSION['user']=$user['id'];

header(
"location:dashboard.php"
);


}else{

echo "Login gagal";

}


}

?>

<form method="post">

<input name="email" placeholder="Email">

<input 
type="password"
name="password"
placeholder="Password">


<button name="login">
Masuk
</button>

</form>