<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Halaman Login | Aplikasi Inventory SMK </title>
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
        <!-- Notification -->
        <?php if ( isset( $this->session->registerSuccess ) ): ?>
            <div class="alert alert-success">
                <div class="alert-heading">
                    <div class="pull-right">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    <?= $this->session->registerSuccess; ?>
                </div>
            </div>
        <?php endif; ?>        
        <?php if ( isset( $this->session->promptLogin ) ): ?>
            <div class="alert alert-danger">
                <div class="alert-heading">
                    <div class="pull-right">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    <?= $this->session->promptLogin; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( isset( $this->session->userNotFound ) ): ?>
            <div class="alert alert-danger">
                <div class="alert-heading">
                    <div class="pull-right">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    <?= $this->session->userNotFound; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( isset( $this->session->passwordIncorrect ) ): ?>
            <div class="alert alert-danger">
                <div class="alert-heading">
                    <div class="pull-right">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    <?= $this->session->passwordIncorrect; ?>
                </div>
            </div>
        <?php endif; ?>  
        <?php if ( isset( $this->session->loggedOut ) ): ?>
            <div class="alert alert-success">
                <div class="alert-heading">
                    <div class="pull-right">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    <?= $this->session->loggedOut; ?>
                </div>
            </div>
        <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Halaman Login</h3>
                    </div>
                    <div class="panel-body">
                        <?= form_open('/auth/login'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        <?php form_close(); ?>
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
