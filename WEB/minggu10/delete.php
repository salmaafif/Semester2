<?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        $nrp = $_GET['id'];

        $sql = "DELETE FROM mahasiswa WHERE nrp='$nrp'";

        if (mysqli_query($conn, $sql)) { ?>
        <script>alert("Hello! I am an alert box!");</script>
                    
    <?php
           
            header("location: datamhs.php");
            echo "Data Berhasil Terhapus";
        } else {
            echo "Gagal, Error : " . mysqli_error($conn);
        }
    } else {
        echo "Gagal, 'nrp' tidak ditemukan dalam data GET.";
    }

    mysqli_close($conn);