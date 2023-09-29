<?php
require 'latihan17_oop.php';


$g1 = new gempa ('Yogja', 1);
$g2 = new gempa ('Sumatera Utara', 3);
$g3 = new gempa ('Jakarta', 4);
$g4 = new gempa ('Sulawesi', 5);

$g1->cetak();
$g2->cetak();
$g3->cetak();
$g4->cetak();

?>