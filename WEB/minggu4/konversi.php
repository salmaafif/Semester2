<!DOCTYPE html>
<html>
  <body>
    <form action="" method="post">
        Nama : <br/>
        <input type="text" name="nama" placeholder="Masukkan Nama"><br>
        Nilai Angka : <br/>
        <input type="text" name="nilai" placeholder="Masukkan Nilai"/>
        <input type="submit" name="submit" value="Konversi"/>
    </form>
    <?php
           if(isset($_POST["submit"])){
               $score = trim($_POST["nilai"]);
               echo "<br>";
               if(is_numeric($score) == true){
                   if($score <= 40){
                       $predicate = "E";
                   }elseif($score >= 41 && $score <= 55){
                       $predicate = "D";
                   }elseif($score >= 46 && $score <= 60){
                       $predicate = "C";
                   }elseif($score >= 61 && $score <= 65){
                       $predicate = "BC";
                   }elseif($score >= 66 && $score <= 70){
                       $predicate = "B";
                   }elseif($score >= 71 && $score <= 80){
                       $predicate = "AB";
                   }elseif($score >= 81 && $score <= 100){
                       $predicate = "A";
                   }
                   echo 'Nama : ' . $_POST['nama'];
                   echo "<br>";
                   echo "Nilai Anda adalah " . $predicate;
               }else{
                   echo "Inputan harus angka.";
               }
           }
       ?>
  </body>
</html>

