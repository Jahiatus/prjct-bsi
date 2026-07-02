<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['name'])) {
    $_SESSION['user_id'] = 'google_' . uniqid();
    $_SESSION['nama'] = $data['name'];
    $_SESSION['email'] = $data['email'];
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
