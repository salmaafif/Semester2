<?php
    include 'koneksi.php';
    $sql = "INSERT INTO mahasiswa(nrp, nama, jenis_kelamin, agama, umur, alamat)
            VALUES (10001, 'Salma Afifa Azis', 'P', 'Islam', 20, 'JL. Durian NO 02 Kediri')";

    if (mysqli_query($conn, $sql)) {
        echo "Data Baru berhasil ditambahkan";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);