<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tugas4php";

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
}
