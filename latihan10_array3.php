<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $m1 = ['nim' => '010101','nama' =>'Andi', 'nilai' => 95];
    $m2 = ['nim' => '010102','nama' =>'Ando', 'nilai' => 85];
    $m3 = ['nim' => '010103','nama' =>'Ande', 'nilai' => 75];
    $m4 = ['nim' => '010104','nama' =>'Andip', 'nilai' => 65];
    $m5 = ['nim' => '010105','nama' =>'Andik', 'nilai' => 55];
    $m6 = ['nim' => '010106','nama' =>'Andiw', 'nilai' => 45];
    $m7 = ['nim' => '010107','nama' =>'Andis', 'nilai' => 35];
    $m8 = ['nim' => '010108','nama' =>'Andia', 'nilai' => 25];
    $m9 = ['nim' => '010109','nama' =>'Andib', 'nilai' => 15];
    $m10 = ['nim' => '010100','nama' =>'Andir', 'nilai' => 42];

    $ar_judul = ['No','Nama Mahasiswa', 'Nilai','Keterangan','Grade','Predikat'];
    $mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10]
    ?>
    <h3 align="center">Daftar Nilai Mahasiswa</h3>
    <table border = "1" cellspading="10" cellspading="2" width=100%>
        <thead>
            <tr>
                <?php
                foreach($ar_judul as $judul ){?>
                <th><?= $judul ?></th>
                <?php } ?>
            </tr>
        </thead>
    </table>
</body>
</html>