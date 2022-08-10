<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
    <link href="<?php echo base_url() . 'assets/img/logo-app/favicon.ico'; ?>" rel="icon" type="image/x-icon" />
    <link href="<?php echo base_url() . 'assets/az/css/azia.css'; ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'lib/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'lib/ionicons/css/ionicons.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'lib/typicons.font/typicons.css'; ?>" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="az-body">
    <div class="az-signin-wrapper">
        <div class="az-card-signin">
            <img src="<?php echo base_url() . 'assets/img/logo-app/svg/logo_tah_longtext.svg'; ?>" height="150">
            <div class="az-signin-header">
                <h2>Welcome back!</h2>
                <h4>Please sign in to continue</h4>
                <?php echo validation_errors(); ?>
                <?php echo form_open('auth', ['class' => 'user']); ?>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." />
                </div><!-- form-group -->
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" />
                </div><!-- form-group -->
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Sign In
                </button>
                <?php echo form_close(); ?>
            </div><!-- az-signin-header -->
            <div class="az-signin-footer">
            </div><!-- az-signin-footer -->
        </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <!-- Core JavaScript-->
    <script src="<?php echo base_url() . 'lib/jquery/jquery.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'lib/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'lib/ionicons/ionicons.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/az/js/azia.js'; ?>"></script>
    <!-- Page level custom scripts -->
    <script>
        var BASEURL = "http://localhost/korlantas_tah/";
    </script>
</body>

</html>