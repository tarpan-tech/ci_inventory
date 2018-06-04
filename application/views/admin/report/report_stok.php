<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
    <body>
        <h1 style="text-align: center;"> Data Stok </h1>

        <hr>

        <span> Dicetak oleh : <b><?= $this->session->username; ?></b> </span>
        <span style="float: right"> Dicetak pada: <b><?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s'); ?></b></span>

        <hr>
        <br>

        <table border="1" style="width: 100%; border-collapse: collapse;" cellpadding="10">
            <tr>
                <th>Kode Stok</th>
                <th>Kode Barang</th>
                <th>Jumlah Barang Keluar</th>
                <th>Jumlah Barang Keluar</th>
                <th>Total Barang</th>
                <th>Keterangan</th>
            </tr>
            <?php foreach($stok as $row): ?>
            <tr>
                <td><?= $row->kode_stok; ?></td>
                <td><?= $row->kode_barang; ?></td>
                <td><?= $row->jumlah_barang_masuk; ?></td>
                <td><?= $row->jumlah_barang_keluar; ?></td>
                <td><?= $row->total_barang; ?></td>
                <td><?= $row->keterangan; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>    
    </body>
</html>