<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: homelogin.php");
  exit();
}

$profile_id = $_SESSION['id_profile'];

if (isset($_POST['submit'])) {
  $nilai = $_POST['nilai'];
  $task_id = $_POST['task_id'];
  $id_file = $_POST['id_file'];

  // Update query with prepared statement and binding
  $updateQuery = "UPDATE documents SET nilai = ? WHERE id_file = ?";
  $stmtUpdate = $conn->prepare($updateQuery);
  $stmtUpdate->bind_param("ii", $nilai, $id_file);

  if ($stmtUpdate->execute()) {
    echo "Nilai berhasil diperbarui.";
    // Redirect to success page or refresh current page
    header("Location: markdosen.php"); // Replace with appropriate URL
    exit();
  } else {
    echo "ERROR: Gagal mengeksekusi query: $updateQuery. " . $conn->error;
  }
}