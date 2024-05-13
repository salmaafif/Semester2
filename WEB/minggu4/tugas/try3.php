<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="post">
        <fieldset>
            Masukkan String: <br />
            <input type="text" name="huruf"><br>
            <br />
            <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>
    <br>
    <?php
    if (isset($_POST['submit'])){
        $input = $_POST['huruf'];
    function validasihuruf($input)
    {
        if (preg_match('/^[a-zA-Z]+$/', $input)) {
            return true;
        } else {
            return false;
        }
    }
    if (validasihuruf($input)) {
        echo "$input adalah huruf! <br>";
    } else {
        echo "$input bukan huruf! <br>";
    }
    }
    ?>
</body>

</html>