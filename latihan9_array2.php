<?php

// array scalar
$a1 = ['kode' => '001','buah' => 'Apel','harga' => 25000,'jumlah' =>5];
$a2 = ['kode' => '001','buah' => 'Mangga','harga' => 35000,'jumlah' =>6];
$a3 = ['kode' => '001','buah' => 'Pisang','harga' => 45000,'jumlah' =>7];
$a4 = ['kode' => '001','buah' => 'Jambu','harga' => 55000,'jumlah' =>8];
$a5 = ['kode' => '001','buah' => 'Durian','harga' => 65000,'jumlah' =>2];
$a6 = ['kode' => '001','buah' => 'Salak','harga' => 75000,'jumlah' =>1];
$a7 = ['kode' => '001','buah' => 'Nanas','harga' => 85000,'jumlah' =>9];

//array assosiative
$ar_buah = [$a1,$a2,$a3,$a4,$a5,$a6,$a7];

//deklarasi header table dengan looping
$ar_judul = ['No','Kode','Buah','Harga','Jumlah','Harga kotor','Diskon','Harga bayar'];
$jumlah_transaksi = count($ar_buah);
$jumlah_harga = array_column($ar_buah,'harga');
$harga_total = array_sum($jumlah_harga);
$harga_tertinggi = max($jumlah_harga);
$harga_terendah = min($jumlah_harga);
$harga_rata_rata = $harga_total / $jumlah_transaksi;
$keterangan = [
    'Harga Total' => $harga_total,
    'Harga Tertinggi' => $harga_tertinggi,
    'harga Terendah' => $harga_terendah,
    'Rata-Rata Harga' => $harga_rata_rata,
    'Jumlah Buah' => $jumlah_transaksi
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menggunakan Array looping</title>
</head>
<body align="center">
    <h3 style="color: red">Daftar Buah-buahan</h3>
    <table border = '1' cellpadding="10" width="100%">
        <thead>
            <tr>
                <?php foreach($ar_judul as $judul){
                    ?>
                    <th style="background-color: cyan"> <?= $judul ?> </th>
                    <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;
            foreach ($ar_buah as $buah){
                $bruto = $buah ['harga'] * $buah ['jumlah'];
                $diskon = ($buah ['buah'] == 'Jambu' && $buah ['jumlah'] >= 4) ? 0.2 : 0.1;
                $harga_diskon = $diskon * $bruto ;
                $harga_bayar = $bruto - $harga_diskon;
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $buah ['kode'] ?> </td>
                    <td><?= $buah ['buah'] ?> </td>
                    <td><?= $buah ['harga']?></td>
                    <td><?= $buah ['jumlah']?></td>
                    <td><?= $bruto ?></td>
                    <td><?= $harga_diskon ?></td>
                    <td> Rp. <?= number_format($harga_bayar,0,',',',')?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <?php
                foreach($keterangan as $ket => $hasil){
                    ?>
                    <tr>
                        <th colspan="4"><?= $ket ?></th>
                        <th colspan="5"><?= $hasil ?></th>
                    </tr>
                
               <?php  }

?>
        </tfoot>

    </table>
</body>
</html>