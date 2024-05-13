<!DOCTYPE html>
<html>
  <body>
  <form method="post">
        <fieldset>
            Masukkan String: <br />
            <input type="text" name="string"><br>
            <br />
            <input type="submit" name="submit" value="Hitung">
        </fieldset>
    </form>
    <br />
    <?php
       function hitungVokal($str){
           //ubah karakter string menjadi huruf kecil
           $str = strtolower($str);
           $vokal = 0;
           //cek berapa jumlah huruf vokal dalam string
           for($i = 0; $i < strlen($str); $i++){
               if(in_array($str[$i], ['a', 'i', 'u', 'e', 'o'])){
                   $vokal++;
               }
           }
           return $vokal;
       }
       if (isset($_POST['submit'])) {
          //ambil nilai string
          $string = $_POST['string'];
          $total_vokal = hitungVokal($string);
          echo "Jumlah huruf vokal : " . $total_vokal;
       }
       ?>
  </body>
</html>
