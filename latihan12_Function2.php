<?php
/* contoh fungsi void atau yang tidak mengembalikan disini
dan kita buat sendiri
*/

function salam (){
    echo '<br> Selamat Pagi Teman-Teman';
}


function sapa($kawan){
    echo '<br> Selamat Pagi' .$kawan;
}

function kabar($kawan='Nando'){
    echo '<br> Hai apa kabar '.$kawan;
}

//eksekusi atau output fungsi salam()
salam();
$nama = ' Sumando';
sapa($nama); //ini pemanggilan variable baru
salam($nama); //pemanggilan value dari parameter $kawan
kabar();//menampilkan parameter dan value  $kawan
kabar('Ahmad'); //mengubah value $kawan

echo '<hr>';
//fungsi mengecek bilangan prima atau bukan
function prima ($bilangan){
    $prima = true;
    for($i=2; $i<$bilangan; $i++){
        if($bilangan % $i ==0){
            $prima = false ;
            break;
        }
    }
    return $prima;
}
if(prima(12)){
    echo "Bilangan Prima";
} else {
    echo "Bukan Bilangan Prima";
}
?>