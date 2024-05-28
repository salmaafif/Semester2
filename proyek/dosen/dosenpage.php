
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
    <!-- list -->
    <div style="margin-top: 7%; display:block;" class="position-absolute ms-5">
        <p style="font-size: 20px;"><b>Task</b></p>
        <div class="container text-center">
            <div class="row gap-5 mb-5">
                <a href="createtask.php" style="background-color: transparent; font-size: 17px; border: none; height: 125px; width: 200px;" class="col border border-2 rounded-4 text-decoration-none text-dark position-relative">Add Task + </a>
            </div>
        </div>
        <div style="margin-top: 25%;" class="position-absolute top-100 start-0">
            <p style="font-size: 20px;"><b>Did</b></p>
            <div class="container text-center">
                <div class="row gap-5 mb-5 d-flex">
                    <?php
                    include '../koneksi.php';
                    session_start();

                    if (!isset($_SESSION['username'])) {
                        header("Location: homelogin.php");
                        exit();
                    }

                    // Mendapatkan data profile
                    $profile_query = "SELECT id_profile FROM profile WHERE username = ?";
                    $profile_stmt = $conn->prepare($profile_query);
                    $username = $_SESSION['username'];
                    $profile_stmt->bind_param("s", $username);
                    $profile_stmt->execute();
                    $profile_result = $profile_stmt->get_result();

                    if ($profile_result) { // Periksa apakah query berhasil
                        if ($profile_result->num_rows > 0) {
                            // Lakukan sesuatu dengan data profile
                            $profile = $profile_result->fetch_assoc();
                            $profile_id = $profile['id_profile'];

                            // Lakukan pengambilan data dari tabel task
                            $task_query = "SELECT * FROM task WHERE profile_id = ?";
                            $task_stmt = $conn->prepare($task_query);
                            $task_stmt->bind_param("i", $profile_id);
                            $task_stmt->execute();
                            $task_result = $task_stmt->get_result();

                            if ($task_result) { // Periksa apakah query berhasil
                                while ($d = $task_result->fetch_assoc()) {
                                    // Lakukan sesuatu dengan data task
                    ?>
                                    <div style="height: 170px; width: 350px;" class="col border border-2 rounded-4 p-3">
                                        <h5><?php echo $d['title']; ?></h5>
                                        <p><?php echo $d['deskripsi']; ?></p>
                                        <button type="button" class="btn btn-outline-dark">Detail</button>
                                    </div>
                    <?php
                                }
                            } else {
                                echo "Error in fetching task data: " . $conn->error;
                            }
                        } else {
                            echo "Profile not found for the logged-in user.";
                        }
                    } else {
                        echo "Error in fetching profile data: " . $conn->error;
                    }

                    $profile_stmt->close();
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>