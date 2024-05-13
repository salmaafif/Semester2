<?php
    include 'koneksi.php';

    if (isset($_GET['user_id'])) {
        $id = $_GET['user_id'];

        $sql = "DELETE FROM user WHERE user_id='$id'";

        if (mysqli_query($conn, $sql)) { ?>
        <script>alert("Hello! I am an alert box!");</script>
                    
    <?php
           
            header("location: index.php");
            echo "Data Berhasil Terhapus";
        } else {
            echo "Gagal, Error : " . mysqli_error($conn);
        }
    } else {
        echo "Gagal.";
    }

    mysqli_close($conn);