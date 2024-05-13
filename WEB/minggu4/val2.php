<?php
$nama = $_POST['nama'];
if ($nama == "") {
    header("location:formval2.php?nama=" . cek($nama));
} else {
    echo 'Selamat Datang : ' . $_POST['nama'];
    echo '<br/>';
}
function cek($val)
{
    if ($val == "") {
        $val = "0";
    }
    return $val;
}
