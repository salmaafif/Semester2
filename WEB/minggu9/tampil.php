<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="tampil.css">
    
</head>

<body>
    <div class="table">
        <div class="table_header">
            <p>DATA MAHASISWA</p>
            <a href="input.html"><button class="tambah"><b>Tambah</b></button></a>
        </div>
        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>Hobi</th>
                        <th>Mata Kuliah Favorit</th>
                        <th>No. HP</th>
                        <th>Asal SMA</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
                while ($d = mysqli_fetch_array($data)) {
                    $warna = ($no % 2 == 1) ? "#24212a" : "#24212a";
                ?>
                    <tbody>
                        <tr <?php echo "bgcolor = '$warna'" ?>>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nrp']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['umur']; ?></td>
                            <td><?php echo $d['jenis_kelamin']; ?></td>
                            <td><?php echo $d['jurusan']; ?></td>
                            <td><?php echo $d['hobi']; ?></td>
                            <td><?php echo $d['matfav']; ?></td>
                            <td><?php echo $d['nohp']; ?></td>
                            <td><?php echo $d['asalsma']; ?></td>
                            <td><?php echo $d['alamat']; ?></td>
                            <td>
                                <a href="prosesupdate.php?nrp=<?php echo $d['nrp']; ?>"><button style="background-color: #0298cf;"><i class="fa-solid fa-pen-to-square" style="border= 0px;"></i></button></a>
                                <a href="delete.php?id=<?php echo $d['nrp']; ?>"><button style="background-color: #DB5D59;"><i class="fa-solid fa-trash"></i></button></a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
        <div class="table_header">
            <a href="page.php"><button class="tambah"><b>Back to home</b></button></a>
        </div>
</body>

</html>