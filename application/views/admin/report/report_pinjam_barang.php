<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
    <body>
        <h1 style="text-align: center;"> Data Pinjam Barang </h1>

        <hr>

        <span> Dicetak oleh : <b><?= $this->session->username; ?></b> </span>
        <span style="float: right"> Dicetak pada: <b><?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s'); ?></b></span>

        <hr>
        <br>

        <table border="1" style="width: 100%; border-collapse: collapse;" cellpadding="10">
            <tr>
                <th>No Pinjam</th>
                <th>Kode Barang</th>
                <th>Jumlah Pinjam</th>
                <th>Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
            </tr>
            <?php foreach($pinjam_barang as $row): ?>
            <tr>
                <td><?= $row->no_pinjam; ?></td>
                <td><?= $row->kode_barang; ?></td>
                <td><?= $row->jumlah_pinjam; ?></td>
                <td><?= $row->peminjam; ?></td>
                <td><?= $row->tanggal_pinjam; ?></td>
                <td><?= $row->tanggal_kembali; ?></td>
                <td><?= $row->keterangan; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>    
    </body>
</html>