<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: homelogin.php");
    exit();
}

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    
    // Dapatkan profile_id dari session pengguna yang sedang login
    $username = $_SESSION['username'];
    $profile_query = "SELECT id_profile FROM profile WHERE username = ?";
    $profile_stmt = $conn->prepare($profile_query);
    $profile_stmt->bind_param("s", $username);
    $profile_stmt->execute();
    $profile_result = $profile_stmt->get_result();
    
    if ($profile_result->num_rows > 0) {
        $profile = $profile_result->fetch_assoc();
        $profile_id = $profile['id_profile'];

        // Nonaktifkan pemeriksaan foreign key
        // mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

        // Insert into task tanpa id_file karena auto increment
        $sql = "INSERT INTO task (title, deskripsi, profile_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $deskripsi, $profile_id);

        if ($stmt->execute()) {
            // Aktifkan kembali pemeriksaan foreign key
            // mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

            header("Location: dosenpage.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
            // Aktifkan kembali pemeriksaan foreign key jika terjadi kesalahan
            // mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
        }

        $stmt->close();
    } else {
        echo "Profile not found for the logged-in user.";
    }

    $profile_stmt->close();
} else {
    echo "No data received from the form.";
}

$conn->close();