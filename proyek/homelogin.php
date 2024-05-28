<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "Login gagal! username dan password salah!";
        } else if ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
        } else if ($_GET['pesan'] == "belum_login") {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>
    <div class="container">
        <form action="login.php" method="post">
            <div class="form signin">
                <h2>Sign In</h2>
                <div class="inputBox">
                    <input type="text" name="username" required="required">
                    <i class="fa-regular fa-user"></i>
                    <span>username</span>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required="required">
                    <i class="fa-solid fa-lock"></i>
                    <span>password</span>
                </div>
                <div class="inputBox">
                    <input type="submit" class="login" value="Login" name="login">
                </div>
                <p>Not Registered ? <a href="signup.html" class="create">Create an account</a></p>
            </div>
        </form>
    </div>

    <script>
        let login = document.querySelector('.login');
        let create = document.querySelector('.create');
        let container = document.querySelector('.container');

        login.onclick = function() {
            container.classList.add('signinForm');
        }

        create.onclick = function() {
            container.classList.remove('signinForm');
        }
    </script>
</body>

</html>