<?php

$servername = "localhost";
$database = "ceren";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Bağlantı sağlanamadı: " . mysqli_connect_error());
}

