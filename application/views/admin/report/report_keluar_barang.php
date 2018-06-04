<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
    <body>
        <h1 style="text-align: center;"> Data Keluar Barang </h1>

        <hr>

        <span> Dicetak oleh : <b><?= $this->session->username; ?></b> </span>
        <span style="float: right"> Dicetak pada: <b><?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s'); ?></b></span>

        <hr>
        <br>

        <table border="1" style="width: 100%; border-collapse: collapse;" cellpadding="10">
            <tr>
                <th>ID Keluar Barang</th>
                <th>No Pinjam</th>
                <th>Tanggal Keluar</th>
                <th>Penerima</th>
                <th>Jumlah Barang Keluar</th>
                <th>Keperluan</th>
            </tr>
            <?php foreach($keluar_barang as $row): ?>
            <tr>
                <td><?= $row->id_keluar_barang; ?></td>
                <td><?= $row->no_pinjam; ?></td>
                <td><?= $row->tanggal_keluar; ?></td>
                <td><?= $row->penerima; ?></td>
                <td><?= $row->jumlah_barang_keluar; ?></td>
                <td><?= $row->keperluan; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>    
    </body>
</html>