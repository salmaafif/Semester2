<?php
require_once("koneksi.php");
session_start();
if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Mengambil data dari hasil query
    $user = $result->fetch_assoc();

    // Jika user terdaftar
    if ($user) {
        // Memeriksa apakah password cocok
        if ($password === $user["password"]) {
            // Membuat session
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login"; 

            // Redirect ke halaman overview setelah login berhasil
            header("location: overview.php");
            exit;
        }
    }
    // Jika login gagal
    echo "Login failed. Please check your username and password.";
}