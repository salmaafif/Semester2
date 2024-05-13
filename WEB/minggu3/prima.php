<!DOCTYPE html>
<html>
<body>
    <h2>Bilangan Prima</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Masukkan jumlah bilangan prima: <input type="number" name="jumlah" min="1">
        <input type="submit" name="submit" value="klik untuk lihat!">
    </form>
    <?php
    function is_prime($num) {
        if ($num <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['jumlah'])) {
            $jumlah = $_POST['jumlah'];

            if ($jumlah > 0) {
                echo "<h3>Deret Bilangan Prima dengan $jumlah angka:</h3>";
                echo "<ul>";
                $counter = 0;
                $number = 2;
                while ($counter < $jumlah) {
                    if (is_prime($number)) {
                        echo "$number ";
                        $counter++;
                    }
                    $number++;
                }
                echo "</ul>";
            } else {
                echo "<p>Jumlah bilangan prima harus lebih dari 0.</p>";
            }
        }
    }
    ?>
</body>
</html>
