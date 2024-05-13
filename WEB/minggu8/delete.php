<?php
include 'koneksi.php';

$sql = "DELETE FROM mahasiswa WHERE nrp=10001";

if (mysqli_query($conn, $sql)) {
    echo "Data Berhasil Terhapus";
} else {
    echo "Gagal, Error : " . mysqli_error($conn);
}
mysqli_close($conn);
