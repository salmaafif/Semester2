<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Overview</title>
    <link rel="stylesheet" href="overview.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<style>
    .table_header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
    }
    .table_header p {
        color: #dddddd;
        width: 100%;
        table-layout: fixed;
        min-width: 500px;
    }

    .tambah {
        padding: 10px 20px;
        color: #000000;
        background-color: bisque;
    }

    button {
        outline: none;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        padding: 10px;
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

    .btn-delete {
        background: url(images/hapus.png) no-repeat 5px 40px #db5d59;
        height: 22px;
        width: 22px;
    }

    .btn-update {
        background: url(images/edit.png) no-repeat 5px 40px #00b3a8;
        height: 22px;
        width: 22px;
        text-indent: -9999px;
    }
</style>

<body>
    <div class="body-container">
        <div class="sidebar">
            <header>
                <div class="image-text">
                    <div class="image">
                        <img src="https://clipartcraft.com/images/best-logo-design-transparent-6.png" alt="Logo" />
                    </div>
                    <div class="header-text text">
                        <span class="main">Admin Home</span>
                    </div>
                </div>
                <i class="bx bx-chevron-right toggle" onclick="fnToggleMenu()"></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="search-bar">
                            <i class="bx bx-search icons"></i>
                            <input type="text" name="" id="" placeholder="Search..." />
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class="bx bx-home-alt icons"></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="input.html">
                                <i class="bx bx-bar-chart-alt-2 icons"></i>
                                <span class="text nav-text">Input Data</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="datamhs.php">
                                <i class="bx bx-wallet-alt icons"></i>
                                <span class="text nav-text">View Data</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="profile.php">
                                <i class="bx bx-bell icons"></i>
                                <span class="text nav-text">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="nav-link">
                        <a href="logout.php">
                            <i class="bx bx-log-out icons"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                    <li class="mode">
                        <div class="moon-sun">
                            <i class="bx bx-moon icons moon"></i>
                            <i class="bx bx-sun icons sun"></i>
                        </div>
                        <span class="mode-text text">Dark Mode</span>
                        <div class="toggle-switch" onclick="fnThemeSwitch()">
                            <span class="switch"></span>
                        </div>
                    </li>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="content">
                <div class="table">
                    <div class="table_header">
                        <p>DATA MAHASISWA</p>
                        <a href="input.html"><button class="tambah"><b>Tambah</b></button></a>
                    </div>
                    <div class="table_section">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jurusan</th>
                                    <th>Hobi</th>
                                    <th>Mata Kuliah Favorit</th>
                                    <th>No. HP</th>
                                    <th>Asal SMA</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            include 'koneksi.php';
                            $no = 1;
                            $data = $conn->query("SELECT * FROM mahasiswa");
                            while ($d = $data->fetch_assoc()) {
                                $warna = ($no % 2 == 1) ? "#24212a" : "#24212a";
                                // Lalu lakukan apa yang Anda butuhkan dengan data $d
                            ?>
                            
                                <tbody>
                                    <tr <?php echo "bgcolor = '$warna'" ?>>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['nrp']; ?></td>
                                        <td><?php echo $d['nama']; ?></td>
                                        <td><?php echo $d['umur']; ?></td>
                                        <td><?php echo $d['jenis_kelamin']; ?></td>
                                        <td><?php echo $d['jurusan']; ?></td>
                                        <td><?php echo $d['hobi']; ?></td>
                                        <td><?php echo $d['matfav']; ?></td>
                                        <td><?php echo $d['nohp']; ?></td>
                                        <td><?php echo $d['asalsma']; ?></td>
                                        <td><?php echo $d['alamat']; ?></td>
                                        <td>
                                            <a href="prosesupdate.php?nrp=<?php echo $d['nrp']; ?>"><button style="background-color: #0298cf;"><i class="fa-solid fa-pen-to-square" style="border= 0px;"></i></button></a>
                                            <a href="delete.php?id=<?php echo $d['nrp']; ?>"><button style="background-color: #DB5D59;"><i class="fa-solid fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="table_header">
                        <a href="overview.php"><button class="tambah"><b>Back to home</b></button></a>
                    </div>
                    <br />
                    <br />

                    <br />
                    <br />
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="overview.js"></script>
</body>

</html>