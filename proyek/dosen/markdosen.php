<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: homelogin.php");
  exit();
}

$profile_id = $_SESSION['id_profile'];

$query = "SELECT t.task_id, t.title AS task_title, t.deskripsi AS task_description,
          p.nama, d.nilai, p.nrp, d.id_file
          FROM task t
          JOIN documents d ON t.task_id = d.task_id
          JOIN profile p ON p.id_profile = d.id_profile
          WHERE d.upload = 1 AND t.id_profile = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $profile_id);
$stmt->execute();
$result = $stmt->get_result();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;800&family=Poppins:wght@300;400;500;600;700&display=swap");

    * {
        font-family: "Poppins", "sans-sarif";
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    table {
        width: 100%;
        table-layout: fixed;
        min-width: 500px;
        border-collapse: collapse;
    }

    td {
        padding: 3px;
        height: 15px;
    }

    thead th {
        background-color: rgb(194, 197, 199);
        color: #14111B;
        position: sticky;
        top: 0;
        font-size: 13px;
    }

    th,
    td {
        border-bottom: 2px #ffffff;
        padding: 7px 2px;
        word-break: unset;
        text-align: center;
        color: #dddddd;
        font-size: 12px;
    }

    tr:hover td {
        color: #0298cf;
        cursor: pointer;
        background-color: #14111B;
    }

    ::placeholder {
        color: aqua;
    }

    .table_section {
        height: auto;
        overflow: auto;
    }

    table {
        width: 100%;
        table-layout: fixed;
        min-width: 500px;
        border-collapse: collapse;
    }

    td {
        padding: 3px;
        height: 15px;
    }
</style>

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
                        <a class="nav-link " aria-current="page" href="dosenpage.php">Task</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="markdosen.php">Score</a>
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
    <br>
    <br>
    <!-- list -->

    <!-- Table to display students and their tasks -->
    <div class="container-lg mt-5">
        <div class="table">
            <div class="table_section">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NRP</th>
                            <th>Mata Kuliah</th>
                            <th>Deskripsi</th>
                            <th>Nilai</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            $warna = ($no % 2 == 1) ? "#24212a" : "#24212a";
                        ?>
                            <tr <?php echo "bgcolor='$warna'" ?>>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama']; ?></td> <!-- Display student's name -->
                                <td><?php echo $row['nrp']; ?></td> <!-- Assuming this is the subject/course -->
                                <td><?php echo $row['task_title']; ?></td>
                                <td><?php echo $row['task_description']; ?></td>
                                <td><?php echo $row['nilai']; ?></td>
                                <td>
                                    <form action="mark.php" method="post">
                                        <input type="hidden" name="id_file" value="<?php echo $row['id_file']; ?>">
                                        <input type="hidden" name="task_id" value="<?php echo $row['task_id']; ?>">
                                        <input type="text" name="nilai" placeholder="Enter Score" value="<?php echo $row['nilai']; ?>">
                                        <button type="submit" name="submit" value="Submit" class="btn-light">Submit Score</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Your JavaScript and Bootstrap script -->
</body>

</html>
