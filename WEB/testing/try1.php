<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Masukin warna favmu:
        <input type="text" name="clr">
        <input type="submit" name="submit" value="Klik aj sie!">
</form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['clr'])) {
            $clr = $_POST['clr'];
            
            switch ($clr) {
                case "red":
                    echo "<p style='color:red;'>warnamu merah</p>";
                    break;
                case "blue":
                    echo "<p style='color:blue;'>warnamu biru</p>";
                    break;
                default:
                    # code...
                    break;
            }
            
        }
    }
    ?>
    
</body>
</html>