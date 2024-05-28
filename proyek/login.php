<?php
require_once("koneksi.php");
session_start();

if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM profile WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

    if ($user) {
        if ($password === $user["password"]) {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login"; 
            $_SESSION['profile_id'] = $user['profile_id'];
            setcookie("username", $username, time() + (86400 * 30), "/");

            if ($user['role'] == 'Dosen') {
                header("location: dosen/dosenpage.php");
            } else {
                header("location: mhspage.php");
            }
            exit;
        }
    }

    echo "Login failed. Please check your username and password.";
}