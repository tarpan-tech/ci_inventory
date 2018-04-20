<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daftar Akun | Aplikasi Inventory SMK </title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('public/assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?= base_url('public/assets/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('public/assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= base_url('public/assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="<?= base_url('public/assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Akun</h3>
                    </div>
                    <div class="panel-body">
                        <?= form_open('/auth/register'); ?>
                            <fieldset>
                            <div style="color: red;">
                                <?= validation_errors(); ?>
                            </div>
                                <div class="form-group"> 
                                    <input class="form-control" placeholder="Nama" name="nama" type="text" autofocus>
                                </div>
                                <div class="form-group"> 
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for=""> Level </label>
                                    <select class="form-control" name="level">
                                        <option class="form-control" value="1"> Admin </option>
                                        <option class="form-control" value="2"> Operator </option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Daftar">
                            </fieldset>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- jQuery -->
     <script src="<?= base_url('public/assets/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('public/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('public/assets/metisMenu/metisMenu.min.js'); ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('public/assets/js/sb-admin-2.js'); ?>"></script>

</body>

</html>
