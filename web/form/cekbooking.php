<?php
include "../../database/koneksi.php";

if(isset($_POST['cek'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);


    $data = mysqli_query($conn, 
    "SELECT * FROM booking 
    WHERE email='$email' 
    AND kode_booking='$kode'"
    );


    if(mysqli_num_rows($data) > 0){

        $booking = mysqli_fetch_assoc($data);

        echo "
        <h3>Booking Ditemukan</h3>
        <p>Kode Booking : ".$booking['kode_booking']."</p>
        <p>Status : ".$booking['status']."</p>
        ";

    }else{

        echo "Data booking tidak ditemukan";

    }

}

?>


<link rel="stylesheet" href="../css/cekbook.css"/>

<div class="card" id="cekbook">

<h2 class="card-title">
Cek Booking
</h2>


<form class="booking-form" method="post">


<div class="form-group">

<label>Email</label>

<div class="input-wrapper">

<i class="fa-regular fa-envelope icon"></i>

<input 
type="email" 
name="email"
placeholder="nama@email.com"
required>

</div>

</div>



<div class="form-group">

<label>Kode Booking</label>

<div class="input-wrapper">

<i class="fa-solid fa-ticket-simple icon"></i>

<input 
type="text"
name="kode"
placeholder="Contoh: ABC123XYZ"
required>

</div>

</div>



<button 
type="submit" 
name="cek"
class="btn-submit">

Cek Pesanan 
<i class="fa-solid fa-magnifying-glass"></i>

</button>


</form>

</div>