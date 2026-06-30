<?php

include "../../database/koneksi.php";

$query = mysqli_query($koneksi,
"SELECT * FROM jadwal_kapal
ORDER BY tanggal, jam_berangkat"
);

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Jadwal Kapal UI</title>


<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">


<link rel="stylesheet" href="../css/jadwal.css">


</head>



<body>


<main class="schedule-widget">



<section class="schedule-list">



<?php while($kapal = mysqli_fetch_assoc($query)){ ?>


<article class="schedule-card">


<div class="ship-info">

<div class="material-symbols-outlined">
directions_boat
</div>


<div class="ship-details">


<h3 class="ship-name">

<?= $kapal['nama_kapal']; ?>

</h3>


<p class="ship-class">

<?= $kapal['kelas']; ?>

</p>


</div>


</div>





<div class="route-info">


<div class="time-block">


<h2 class="time">

<?= $kapal['jam_berangkat']; ?>

</h2>


<p class="port">

<?= $kapal['asal']; ?>

</p>


</div>




<div class="duration-block">


<span class="duration">

Langsung

</span>


<hr class="timeline-divider">


<span class="route-type">

<?= $kapal['tanggal']; ?>

</span>


</div>





<div class="time-block">


<h2 class="time">

<?= $kapal['jam_tiba']; ?>

</h2>


<p class="port">

<?= $kapal['tujuan']; ?>

</p>


</div>



</div>






<div class="booking-info">


<span class="badge badge-success">

<?= $kapal['jumlah_tiket']; ?> Tiket Tersisa

</span>




<p class="price-label">

Total Harga

</p>




<h3 class="price">

Rp <?= number_format($kapal['harga']); ?>

</h3>



<button class="btn btn-primary">

Pilih

</button>



</div>



</article>



<?php } ?>




</section>



</main>



</body>

</html>