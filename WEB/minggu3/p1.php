<!DOCTYPE html>
<html>
<body>
    <h2>Segitiga Fibonacci</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Masukkan tinggi segitiga: <input type="number" name="tinggi" min="1">
        <input type="submit" name="submit" value="klik untuk melihat">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['tinggi'])) {
            $tinggi = $_POST['tinggi'];

            if ($tinggi > 0) {
                echo "<h3>Segitiga Fibonacci dengan tinggi $tinggi:</h3>";
                echo "<table>";
                for ($i = 1; $i <= $tinggi; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= $i; $j++) {
                        echo "<td>" . fibonacci($j) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Tinggi segitiga harus lebih dari 0.</p>";
            }
        }
    }

    function fibonacci($n) {
        if ($n == 1 || $n == 2) {
            return 1;
        } else {
            return fibonacci($n - 1) + fibonacci($n - 2);
        }
    }
    ?>
</body>
</html>
