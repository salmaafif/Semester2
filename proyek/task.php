<?php
include 'koneksi.php';
include 'signup.php';
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

$profile_id = $_SESSION['id_profile'];
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
                        <a class="nav-link" aria-current="page" href="mhspage.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <br>
    <br>
    <!-- list -->
    <div style="margin-top: 15%;" class="position-absolute m-5">
        <p><b>Waiting Task</b></p>
        <hr>
        <div class="container text-center d-flex">
            <div class="row gap-4 mb-4">
                <?php
                // Mendapatkan data semua tugas yang belum selesai
                $task_query = "SELECT * FROM task";
                $task_result = $conn->query($task_query);

                if ($task_result->num_rows > 0) {
                    while ($d = $task_result->fetch_assoc()) {
                ?>
                        <div style="height: 170px; width: 300px;" class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card border border-2 rounded-4">
                                <div class="card-body">
                                    <h5><?php echo htmlspecialchars($d['title']); ?></h5>
                                    <p class="text-truncate"><?php echo htmlspecialchars($d['deskripsi']); ?></p>
                                    <a href="detailmhs.php?task_id=<?php echo $d['task_id']; ?>" type="button" class="btn btn-outline-dark btn-block align-self-end">Detail</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No tasks found.";
                }
                ?>
            </div>
        </div>
        <div style="margin-top: 20%;" class="position-absolute top-100 start-0">
            <p><b>Completed Task</b></p>
            <hr>
            <div class="container text-center">
                <div class="row gap-4 mb-4">
                    <?php
                    // Mendapatkan data semua tugas yang sudah selesai oleh mahasiswa tertentu
                    $completed_query = "SELECT t.task_id, t.title, t.deskripsi
                        FROM task t
                        JOIN documents d ON t.task_id = d.task_id
                        WHERE d.upload = 1 AND d.id_profile = ? ";
                    $stmt = $conn->prepare($completed_query);
                    if ($stmt) {
                        $stmt->bind_param("i", $profile_id);
                        $stmt->execute();
                        $completed_result = $stmt->get_result();

                        if ($completed_result->num_rows > 0) {
                            while ($d = $completed_result->fetch_assoc()) {
                    ?>
                                <div style="height: 170px; width: 300px;" class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="card border border-2 rounded-4">
                                        <div class="card-body">
                                            <h5><?php echo htmlspecialchars($d['title']); ?></h5>
                                            <p class="text-truncate"><?php echo htmlspecialchars($d['deskripsi']); ?></p>
                                            <a href="detailmhs.php?task_id=<?php echo $d['task_id']; ?>" type="button" class="btn btn-outline-dark btn-block align-self-end">Detail</a>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "No completed tasks found.";
                        }
                    } else {
                        echo "Error preparing query: " . $conn->error;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- done task -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
