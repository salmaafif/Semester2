<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['profile_id']) || $_SESSION['status'] !== "login") {
    header("Location: homelogin.php");
    exit;
} // If cookie is set, refresh session 
if (isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['status'] = "login";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lecturer</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav style="background-color: #2A3133;" class="navbar navbar-expand-lg text-white fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="mhspage.php">E-Lorem</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav me-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dosenpage.php">Task</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="markdosen.php">Score</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form action="tugas.php" method="post">
        <div class="text-center position-absolute top-50 start-50 translate-middle">
            <div style="height: 400px; width: 750px; background-color: #606364; color: #2A3133;" class="border border-2 rounded-4 p-5 fs-5 fw-semibold">
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Mata Kuliah</label>
                    <input type="text" class="form-control opacity-75" name="title" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-5">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Tugas</label>
                    <textarea class="form-control opacity-75" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <input type="submit" style="background-color: #C3BCC2" name="submit" value="Submit" class="btn">
                <!-- <button type="button" style="background-color: #C3BCC2" class="btn btn-secondary">Submit</button> -->
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>