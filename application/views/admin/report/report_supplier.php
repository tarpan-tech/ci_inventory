<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
    <body>
        <h1 style="text-align: center;"> Data Supplier </h1>

        <hr>

        <span> Dicetak oleh : <b><?= $this->session->username; ?></b> </span>
        <span style="float: right"> Dicetak pada: <b><?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s'); ?></b></span>

        <hr>
        <br>

        <table border="1" style="width: 100%; border-collapse: collapse;" cellpadding="10">
            <tr>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Telp Supplier</th>
                <th>Kota Supplier</th>
            </tr>
            <?php foreach($supplier as $row): ?>
            <tr>
                <td><?= $row->kode_supplier; ?></td>
                <td><?= $row->nama_supplier; ?></td>
                <td><?= $row->alamat_supplier; ?></td>
                <td><?= $row->telp_supplier; ?></td>
                <td><?= $row->kota_supplier; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>    
    </body>
</html>