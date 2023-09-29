<?php
require 'latihan16-1_oop.php';

$n1 = new bank ('0001','Andi', 6000000);
$n2 = new bank ('0002','Ando', 7000000);
$n3 = new bank ('0003','Yuni', 8000000);
$n4 = new bank ('0004','Reno', 2000000);
$n5 = new bank ('0005','Budi', 9000000);

$n1->setor(1000000);
$n2->ambil(2000000);

echo '<h3 align="center">'.bank::BANK.'</h3>';
$n1->cetak();
$n2->cetak();
$n3->cetak();
$n4->cetak();
$n5->cetak();

?>