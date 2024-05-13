<?php
include 'koneksi.php';

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $query = "SELECT user_nama, user_foto FROM user WHERE user_id ='$id'";
    $result = mysqli_query($conn, $query) or die('Error, query failed');
    list($nama, $foto) = mysqli_fetch_array($result);

    header("Content-Disposition: attachment; filename=$nama.png");
    header("Content-Type: image/png"); // Set tipe konten menjadi PNG
    readfile("gambar/$foto"); // Mengirimkan isi file gambar kepada browser
    exit;
}
