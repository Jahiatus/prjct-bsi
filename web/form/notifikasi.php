<?php

session_start();

include "../../database/koneksi.php";


$user_id = $_SESSION['user_id'] ?? 0;



$query = mysqli_query($koneksi,

"SELECT * FROM notifikasi

WHERE user_id='$user_id'

ORDER BY created_at DESC"

);



if($user_id != 0){

mysqli_query($koneksi,

"UPDATE notifikasi

SET status='dibaca'

WHERE user_id='$user_id'"

);

}


?>