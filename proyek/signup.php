<?php
require_once("koneksi.php");

if (isset($_POST['signup'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $ttl = $_POST['ttl'];
    $nrp = $_POST['nrp'];
    $role = $_POST['role'];

    // Check if the username already exists
    $query = "SELECT * FROM profile WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        echo "Username already exists. Please choose a different username.";
        exit;
    }

    $password = $_POST["password"];
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $file = $_FILES['photo']['name'];
    $ukuran = $_FILES['photo']['size'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $photo = $rand.'_'.$file;

    // Proceed with database insertion
    $sql = "INSERT INTO profile (nama, username, password, ttl, nrp, role, photo)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param('sssssss', $nama, $username, $password, $ttl, $nrp, $role, $photo);

    // Execute statement
    $saved = $stmt->execute();
    if ($saved) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login"; 
        setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
        header("Location: homelogin.php");
        exit; // Exit to prevent further execution
    } else {
        // Handle database insertion failure
        echo "Failed to save data to database.";
    }
}

