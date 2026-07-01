<?php

session_start();

include "../../database/koneksi.php";


$user_id = $_SESSION['user_id'];


$query = mysqli_query($koneksi,

"SELECT * FROM notifikasi

WHERE user_id='$user_id'

ORDER BY created_at DESC"

);



mysqli_query($koneksi,

"UPDATE notifikasi 

SET status='dibaca'

WHERE user_id='$user_id'"

);


?>


<!DOCTYPE html>
<html>

<head>

<title>Notifikasi</title>

<link rel="stylesheet" href="../css/notifikasi.css">

</head>


<body>


<div class="notif-container">


<h2>
Notifikasi
</h2>


<?php while($row=mysqli_fetch_assoc($query)){ ?>


<div class="notif-card">


<h3>

<?= $row['judul']; ?>

</h3>


<p>

<?= $row['pesan']; ?>

</p>


<small>

<?= $row['created_at']; ?>

</small>


</div>


<?php } ?>


</div>


</body>

</html>