<?php
session_start();
include("../database/koneksi.php");

$id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <link rel="stylesheet" href="../css/user.css">
</head>

<body>

    <h2>My Profile</h2>

    <input
        type="text"
        value="<?php echo $user['nama']; ?>"
        readonly>

    <input
        type="email"
        value="<?php echo $user['email']; ?>"
        readonly>

</body>

</html>