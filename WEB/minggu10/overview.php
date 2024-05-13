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
            <span class="main"><?php echo isset($_SESSION['username']) ? $_SESSION['username']: 'Admin';?> Home</span>
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
        <?php
        session_start();
        if ($_SESSION['status'] != "login") {
          header("location:../homelogin.php?pesan=belum_login");
          exit; // Hentikan eksekusi lebih lanjut
        }
        ?>

<h2>Selamat datang, <?php echo isset($_SESSION['username']) ? $_SESSION['username']: 'User';?>! Anda telah login.</h2>


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