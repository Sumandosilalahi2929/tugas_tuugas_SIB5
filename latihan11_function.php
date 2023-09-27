<?php
$str = 'Belajar PHP di kampus Merdeka';
echo $str;

$str = strtoupper($str);
echo '<br>' .$str;

$str = strtolower($str);
echo '<br>' .$str;

$ar_buah = ['Pepaya','Mangga','Pisang','Jambu','Apel'];
sort($ar_buah);
foreach($ar_buah as $buah){
    echo '<br>'.$buah;
}
echo '<hr>';
arsort($ar_buah);
foreach($ar_buah as $buah){
    echo '<br>' .$buah;
}
?>