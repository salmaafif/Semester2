<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: homelogin.php");
    exit();
}

if (isset($_POST['submit'])) {
    $task_id = intval($_POST['task_id']);

    // Extract uploaded file details
    $fileName = basename($_FILES["content"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
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

        // Generate a unique filename to prevent overwriting
        $uniqueFilename = uniqid('', true) . '.' . $fileType;
        $uploadDir = "uploads/"; // Specify your upload directory
        $targetFilePath = $uploadDir . $uniqueFilename;
        if (move_uploaded_file($_FILES["content"]["tmp_name"], $targetFilePath)) {

            // Check if the student has already submitted the assignment for this task_id
            $checkQuery = "SELECT * FROM documents WHERE id_profile = ? AND task_id = ?";
            $stmtCheck = mysqli_prepare($conn, $checkQuery);
            mysqli_stmt_bind_param($stmtCheck, "ii", $profile_id, $task_id);
            mysqli_stmt_execute($stmtCheck);
            mysqli_stmt_store_result($stmtCheck);

            // Nonaktifkan pemeriksaan foreign key
            // mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

            // Insert into task tanpa id_file karena auto increment
            $insertQuery = "INSERT INTO documents (id_profile, task_id, name, path, upload) VALUES (?, ?, ?, ?, 1)";
            $stmtInsert = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($stmtInsert, "iiss", $profile_id, $task_id, $fileName, $targetFilePath);
            if (mysqli_stmt_execute($stmtInsert)) {
                echo "Tugas berhasil diunggah.";
                header("Location: task.php");
                exit();
            } else {
                echo "ERROR: Gagal mengeksekusi query: $insertQuery. " . mysqli_error($conn);
            }

            $stmt->close();
        } else {
            echo "Profile not found for the logged-in user.";
        }
    }
    $profile_stmt->close();
} else {
    echo "No data received from the form.";
}

$conn->close();
