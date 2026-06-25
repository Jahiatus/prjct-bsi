<?php
$host = "localhost";
$username = "root"; 
$password = "";  
$database = "dbwp.sql"; // nama database, bukan file .sql

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>