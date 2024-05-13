<?php
include 'koneksi.php';

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

    $check_sql = "SELECT * FROM mahasiswa WHERE nrp = '" . $nrp . "'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Record with NRP " . $nrp . " already exists.";
    } else {
        $sql = "INSERT INTO mahasiswa (nrp, nama, umur, jenis_kelamin, jurusan, hobi, nohp, asalsma, matfav, alamat)
                VALUES('" . $nrp . "', '" . $nama . "', '" . $umur . "', '" . $jk . "', '" . $jurusan . "', '" . $hobi . "', '" . $nohp . "', '" . $asalsma . "', '" . $matfav . "', '" . $alamat . "')";

        if (mysqli_query($conn, $sql)) {
            require "datamhs.php";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "No data received from the form.";
}

mysqli_close($conn);
