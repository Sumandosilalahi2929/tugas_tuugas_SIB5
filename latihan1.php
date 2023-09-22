<?php 

//echo"Hello World";

//latihan membuat variabel
$namasiswa = "Sumando"; //tipedata string
$umur = 25; //tipe data integer
$beratbadan = 30.5; //tipe data float
$_pekerjaan = 'Mahasiswa';

$jari2 = 15;
define('PHI', 3.14);
$luas = PHI * $jari2 * $jari2;
echo '<br>Nama Mahasiswa :  '.$namasiswa;
echo '<br>Umur : '.$umur;
echo '<br>Berat Badan : '.$beratbadan;
echo '<br>Pekerjaan : '.$_pekerjaan;
echo '<br> Berat Badan 2 : $beratbadan kg';
echo "<br> Berat Badan 3 $beratbadan ";
print '<br> Pekerjaan 2 : '.$_pekerjaan;

//contoh contoh pemanggilan variable didalam tipe
?>

<hr>
<br> Siswa : 1 <br>Nama: <?= $namasiswa ?>
<p> Umur : <?= $umur ?> </p>
<p>Luas jari diatas adalah <?= $luas ?></p>