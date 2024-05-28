<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['status'] !== "login") {
    header("Location: homelogin.php");
    exit;
}

$profile_id = $_SESSION['profile_id'];

if (isset($_GET['task_id'])) {
    $task_id = intval($_GET['task_id']);

    $task_query = "SELECT * FROM task WHERE task_id = ?";
    $stmt = $conn->prepare($task_query);
    $stmt->bind_param('i', $task_id);
    $stmt->execute();
    $task_result = $stmt->get_result();

    if ($task_result->num_rows > 0) {
        $d = $task_result->fetch_assoc();
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

    <div class="text-center position-absolute top-50 start-50 translate-middle d-flex">
        <div style="height: 270px; width: 500px; background-color: #606364; color: #2A3133;" class="border border-2 rounded-4 p-5 fs-5 fw-semibold">
            <h5><?php echo htmlspecialchars($d['title']); ?></h5>
            <p><?php echo htmlspecialchars($d['deskripsi']); ?></p>
        </div>
        <div style="height: 270px; width: 500px; background-color: #606364; color: #2A3133;" class="border border-2 rounded-4 p-5 fs-5 fw-semibold">
            <form action="uploadtask.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="profile_id" value="<?php echo htmlspecialchars($profile_id); ?>">
                <input type="hidden" name="task_id" value="<?php echo htmlspecialchars($task_id); ?>">

                <label for="exampleFormControlInput1" class="form-label">Upload File</label>
                <input type="file" class="form-control opacity-75" name="content" id="exampleFormControlInput1" placeholder="">
                <input type="submit" style="background-color: #C3BCC2" name="submit" value="Submit" class="btn mt-3">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
    } else {
        echo "Task not found.";
    }
    $stmt->close();
} else {
    echo "No task_id provided.";
}