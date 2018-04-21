<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
    <body>
        <h1 style="text-align: center;"> Data Barang </h1>

        <hr>

        <span> Dicetak oleh : <b><?= $this->session->username; ?></b> </span>
        <span style="float: right"> Dicetak pada: <b><?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s'); ?></b></span>

        <hr>
        <br>

        <table border="1" style="width: 100%; border-collapse: collapse;" cellpadding="10">
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Spesifikasi</th>
                <th>Lokasi Barang</th>
                <th>Kategori</th>
                <th>Jumlah Barang</th>
                <th>Jenis Barang</th>
                <th>Sumber Dana</th>
            </tr>
            <?php foreach($barang as $row): ?>
            <tr>
                <td><?= $row->kode_barang; ?></td>
                <td><?= $row->nama_barang; ?></td>
                <td><?= $row->spesifikasi; ?></td>
                <td><?= $row->lokasi_barang; ?></td>
                <td><?= $row->kategori; ?></td>
                <td><?= $row->jml_barang; ?></td>
                <td><?= $row->jenis_barang; ?></td>
                <td><?= $row->sumber_dana; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>    
    </body>
</html>