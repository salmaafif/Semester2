<?php
include 'koneksi.php';

$sql = "UPDATE mahasiswa SET umur=21 WHERE nrp=10001";

if (mysqli_query($conn, $sql)) {
    echo "Update berhasil";
} else {
    echo "Update Gagal, Error : " . $conn->error;
}
mysqli_close($conn);
