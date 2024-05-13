<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>UPDATE DATA</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    body{
        font-family: 'Poppins' sans-serif;
        background-color: #14111B;
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 3%;
        color:aliceblue;
    }
    h1{
        margin-bottom: 3%;
        margin-left: 25%;
    }
    .kembali {
        padding: 10px 10px;
        outline: none;
        border: none;
        cursor: pointer;
        color: #000;
        background-color: bisque;
        border-radius: 6px;
        height: 50px;
    }
</style>

<body>
    <h1>UPDATE DATA MAHASISWA</h1>
    <?php
    if (isset($_GET['nrp'])) {
        $nrp = $_GET['nrp'];
        $data = mysqli_query($conn, "SELECT * FROM mahasiswa  where nrp='$nrp'");
        while ($d = mysqli_fetch_array($data)) {
    ?>
            <form method="post" action="update.php">
                <div class="form-floating mb-3">
                    <input type="hidden" name="nrp" value="<?php echo $d['nrp']; ?>">
                    <input class="form-control" id="floatingInput" placeholder="XXXXXXXXXX" value="<?php echo $d['nrp']; ?>" name="nrp">
                    <label for="floatingInput">NRP</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="floatingPassword" placeholder="Nama" value="<?php echo $d['nama']; ?>" name="nama">
                    <label for="floatingInput">Nama Mahasiswa</label>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <div class="col-md-3 mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <?php
                        $arr_jenis_kelamin = array('Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan');
                        ?>
                        <select name="jenis_kelamin" class="form-control">
                            <option></option>
                            <?php foreach ($arr_jenis_kelamin as $key_jenis_kelamin => $val_jenis_kelamin) :
                                if ($key_jenis_kelamin == $d['jenis_kelamin']) {
                                    $select = "selected";
                                } else {
                                    $select = "";
                                }
                            ?>
                                <option value="<?= $key_jenis_kelamin ?>" <?= $select ?>><?= $val_jenis_kelamin ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <?php
                        $arr_jurusan = array('Teknik Informatika' => 'Teknik Informatika', 'Teknik Mekatronika' => 'Teknik Mekatronika', 'Teknik Elektronika' => 'Teknik Elektronika', 'Data Sains' => 'Data Sains');
                        ?>
                        <select class="form-select" id="validationCustom04" for="jurusan" value="<?php echo $d['jurusan']; ?>" name="jurusan">
                            <option selected disabled value></option>
                            <?php foreach ($arr_jurusan as $key_jurusan => $val_jurusan) :
                                if ($key_jurusan == $d['jurusan']) {
                                    $select = "selected";
                                } else {
                                    $select = "";
                                }
                            ?>
                                <option value="<?= $key_jurusan ?>" <?= $select ?>><?= $val_jurusan ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="matfav" class="form-label">Mata Kuliah Favorit</label>
                        <?php
                        $arr_matfav = array('Algoritma dan Struktur Data' => 'Algoritma dan Struktur Data', 'Pemrograman Web' => 'Pemrograman Web', 'Basis Data' => 'Basis Data', 'Operating System' => 'Operating System');
                        ?>
                        <select class="form-select" id="validationCustom04" for="validationCustom04" value="<?php echo $d['matfav']; ?>" name="matfav">
                            <option selected disabled value></option>
                            <?php foreach ($arr_matfav as $key_matfav => $val_matfav) :
                                if ($key_matfav == $d['matfav']) {
                                    $select = "selected";
                                } else {
                                    $select = "";
                                }
                            ?>
                                <option value="<?= $key_matfav ?>" <?= $select ?>><?= $val_matfav ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="floatingPassword" value="<?php echo $d['umur']; ?>" placeholder="Umur" name="umur">
                    <label for="floatingInput">Umur</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="floatingPassword" placeholder="hobi" value="<?php echo $d['hobi']; ?>" name="hobi">
                    <label for="floatingInput">Hobi</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="floatingPassword" placeholder="nohp" value="<?php echo $d['nohp']; ?>" name="nohp">
                    <label for="floatingInput">Nomor Handphone</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="floatingPassword" placeholder="asalsma" value="<?php echo $d['asalsma']; ?>" name="asalsma">
                    <label for="floatingInput">Asal Sekolah</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" placeholder="Leave a comment here" id="floatingPassword" value="<?php echo $d['alamat']; ?>" style="height: 100px" name="alamat"></input>
                    <label for="floatingPassword">Alamat</label>
                </div>
                <a href="update.php"><input type="submit" class="kembali" value="SIMPAN"></a>

            </form>
    <?php
        }
    } else {
        echo "Gagal, 'nrp' tidak ditemukan dalam URL.";
    }
    ?>

</body>

</html>