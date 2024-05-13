<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include 'koneksi.php';

    // Check if 'nrp' index exists in $_GET array
    if (isset($_GET['id'])) {
        // 'nrp' index exists, proceed with deletion
        $nrp = $_GET['id'];

        // Prepare the SQL statement for deletion
        $sql = "DELETE FROM mahasiswa WHERE nrp='$nrp'";

        // Execute the deletion query
        if (mysqli_query($conn, $sql)) { ?>
        <script>alert("Hello! I am an alert box!");</script>
                    
    <?php
           
            // Redirect to the 'index.php' page
            header("location: tampil.php");
            echo "Data Berhasil Terhapus";
        } else {
            echo "Gagal, Error : " . mysqli_error($conn);
        }
    } else {
        // 'nrp' index does not exist in $_GET array
        echo "Gagal, 'nrp' tidak ditemukan dalam data GET.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>