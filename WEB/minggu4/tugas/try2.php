<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="post">
        <fieldset>
            Masukkan Angka: <br />
            <input type="text" name="angka"><br>
            <br />
            <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>
    <br>
    <?php
    if (isset($_POST['submit'])){
        $input = $_POST['angka'];
    function validasiangka($input)
    {
        if (is_numeric($input)) {
            return true;
        } else {
            return false;
        }
    }
    if (validasiangka($input)) {
        echo "$input adalah angka! <br>";
    } else {
        echo "$input bukan angka! <br>";
    }
    }
    ?>
</body>

</html>