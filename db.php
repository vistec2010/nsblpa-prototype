<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db   = 'nsblpa';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('DB Connection failed: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
?>