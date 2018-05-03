<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
    <body>
        <h1 style="text-align: center;"> Data User </h1>

        <hr>

        <span> Dicetak oleh : <b><?= $this->session->username; ?></b> </span>
        <span style="float: right"> Dicetak pada: <b><?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s'); ?></b></span>

        <hr>
        <br>

        <table border="1" style="width: 100%; border-collapse: collapse;" cellpadding="10">
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
            </tr>
            <?php foreach($user as $row): ?>
            <tr>
                <td><?= $row->id_user; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->username; ?></td>
                <td><?= $row->level; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>    
    </body>
</html>