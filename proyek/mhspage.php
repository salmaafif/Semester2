<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['status'] !== "login") {
    header("Location: homelogin.php");
    exit;
}

// If cookie is set, refresh session
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
    <title>Mahasiswa</title>
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
                        <a class="nav-link active" aria-current="page" href="mhspage.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Task</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Task
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="task.php">Task</a></li>
                            <li><a class="dropdown-item" href="mark.php">Mark</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="carousel slide mx-auto p-2" id="carouselExampleIndicators" style="width: 40%; margin-top: 8%;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img src="gambar/gambar1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="gambar/gambar1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="gambar/gambar1.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- list -->
    <div class="position-absolute m-5">
        <p><b>Waiting Task</b></p>
        <div class="container text-center">
            <div class="row gap-5 mb-5 d-flex">
                <?php
                // Mendapatkan data semua tugas
                $task_query = "SELECT * FROM task";
                $task_result = $conn->query($task_query);

                if ($task_result->num_rows > 0) {
                    // Lakukan sesuatu jika ada tugas yang ditemukan
                    while ($d = $task_result->fetch_assoc()) {
                ?>
                            <div style="height: 170px; width: 300px;" class="col border border-2 rounded-4 p-3">
                                <h5><?php echo $d['title']; ?></h5>
                                <p><?php echo $d['deskripsi']; ?></p>
                                <button href="detailmhs.php" type="button" class="btn btn-outline-dark">Detail</button>
                            </div>
                <?php
                    }
                } else {
                    echo "No tasks found.";
                }
                ?>
                
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>