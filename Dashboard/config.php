<?php
$host = 'localhost';
$user = 'root'; // default user XAMPP
$password = ''; // default password XAMPP
$database = 'dashboard';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>