<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "proyekuas";

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
}
