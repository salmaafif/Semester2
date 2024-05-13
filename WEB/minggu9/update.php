<?php

//include koneksi database
include('koneksi.php');

if ($_POST) {
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jk = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $hobi = $_POST['hobi'];
    $nohp = $_POST['nohp'];
    $asalsma = $_POST['asalsma'];
    $matfav = $_POST['matfav'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE mahasiswa SET nrp = '$nrp', nama = '$nama', umur = '$umur', jenis_kelamin = '$jk', jurusan = '$jurusan',
        hobi = '$hobi', nohp = '$nohp', asalsma = '$asalsma', matfav = '$matfav', alamat = '$alamat' WHERE nrp = '$nrp'");
        header("location: tampil.php");
}else{
    echo "gagal update";
}
