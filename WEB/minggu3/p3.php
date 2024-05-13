<!DOCTYPE html>
<html>
<body>
    <?php
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tanggal = date("d");
    $bulannow = date("n");
    $tahun = date("Y");
    $harinow = date("w");

    $hariindo = $hari[$harinow];
    $bulanindo = $bulan[$bulannow - 1];
    echo "<p>Tanggal hari ini dan saat ini: $hariindo, $tanggal $bulanindo $tahun</p>";
    ?>
</body>
</html>
