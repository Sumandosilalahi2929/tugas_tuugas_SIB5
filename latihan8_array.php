<?php
// contoh array scalar atau 1 dimensi

$ar_buah = ['pepaya','mangga','pisang','jambu'];
$ar_buah[] = 'Naga';
$ar_buah[] = 'Durian';

$ar_buah[2] = 'Nanas'; //mengambil index ke 2
unset($ar_buah[3]); //menghapus index ke 3

echo '<br>Cetak data array menggunakan looping foreach';
foreach($ar_buah as $id => $buah){
    echo '<br> key array buah : ' .$id;
}
foreach($ar_buah as $buah){
    echo '<br> Data Buah : '.$buah;
}
foreach($ar_buah as $id => $buah){
    echo '<br> Buah dengan id : ' .$id. ' adalah buah ' .$buah;
}
?>