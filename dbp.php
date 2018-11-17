<?php
$servername = "localhost";
$username = "root";
$password = "63ddf4e52b9c718e3078251b2267f2d7e09e9705ab56b71c";
$dbname = "CoachTracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 