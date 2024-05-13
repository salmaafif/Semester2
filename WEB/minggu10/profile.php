<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Overview</title>
  <link rel="stylesheet" href="overview.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

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
              <a href="overview.php">
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
      <h2>User Profile</h2>
        <div class="profile">
          <?php
          include 'koneksi.php';
          if (isset($_GET['alert'])) {
            if ($_GET['alert'] == 'gagal_ekstensi') {
          ?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                Ekstensi Tidak Diperbolehkan
              </div>
            <?php
            } elseif ($_GET['alert'] == "gagal_ukuran") {
            ?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Peringatan !</h4>
                Ukuran File terlalu Besar
              </div>
            <?php
            } elseif ($_GET['alert'] == "berhasil") {
            ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                Berhasil Disimpan
              </div>
          <?php
            }
          }
          $data = mysqli_query($conn, "SELECT * FROM admin");
          $d = mysqli_fetch_array($data)
            ?>
            
            <div class="image">
              <img class="photo" src="<?php echo $d['photo']; ?>" alt="">
            </div>
            
            <?php

          ?>

        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="overview.js"></script>
</body>

</html>