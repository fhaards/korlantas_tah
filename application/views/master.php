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
    <link href="<?php echo base_url() . 'assets/img/logo-app-new/logo/icon.ico'; ?>" rel="icon" type="image/x-icon" />
    <link href="<?php echo base_url() . 'lib/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'lib/ionicons/css/ionicons.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'lib/typicons.font/typicons.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'lib/boxicons/css/boxicons.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'lib/lightslider/css/lightslider.min.css'; ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script> -->

    <link href="<?php echo base_url() . 'lib/leaflet/leaflet.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'lib/leaflet-routing-machine-3.2.12/dist/leaflet-routing-machine.css'; ?>" rel="stylesheet">
    <script src="<?php echo base_url() . 'lib/leaflet/leaflet.js'; ?>"></script>
    <link href="<?php echo base_url() . 'lib/leaflet-routing-machine-3.2.12/dist/leaflet-routing-machine.js'; ?>" rel="stylesheet">

    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <link href="<?php echo base_url() . 'vendor/datatables/datatables/media/css/jquery.dataTables.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'vendor/select2/select2/dist/css/select2.min.css'; ?>" rel="stylesheet">

    <!-- CHART -->
    <link href="<?php echo base_url() . 'lib/morris.js/morris.css'; ?>" rel="stylesheet">

    <!-- MAIN CSS -->
    <link href="<?php echo base_url() . 'assets/az/css/azia.css'; ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'assets/az/css/custom.css'; ?>" rel="stylesheet" />
</head>

<body class="az-minimal" id="master-body">
    <?php $pageCurr = current_url(); ?>
    <?php $this->load->view('partials/header'); ?>

    <div class="az-content main-pages">

        <?php if ($pageCurr == base_url() . 'beranda') : ?>
            <div class="dashboard-page">
                <div class="container pt-5">
                    <div class="jumbotron bg-transparent w-100 p-0 d pt-5">
                        <div class="row m-0 p-0 h-100">
                            <div class="col-md-8 m-0 p-0">
                                <h1 class="display-4">SELAMAT DATANG DI</h1>
                                <p class="h4 tx-spacing-3"> APLIKASI LOKASI <br> TITIK RAWAN KECELAKAAN <br> WILAYAH CENGKARENG</p>
                                <hr class="my-3">
                                <div class="lead d-md-block d-none">
                                    <div class="col-12 p-0 d-flex flex-md-row flex-column align-items-center">
                                        <div class="py-2 mr-md-5">
                                            <img src="<?= base_url() . 'assets/img/logo-app-new/logo/png/logo_tah_longtext.png'; ?>" class="small-logo" height="30">
                                        </div>
                                        <div class="py-2">
                                            <img src="<?= base_url() . 'assets/img/logo-app/svg/logo_gabung.svg'; ?>" class="small-logo" height="50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="container d-flex flex-column">
            <?php if ($pageCurr != base_url() . 'beranda') : ?>
                <?= $breadcrumb; ?>
                <div class="mb-2">
                    <h2 class="az-content-title-minimal text-uppercase lead page-title"><?= $pageTitle; ?></h2>
                    <p class="az-content-text-minimal"></p>
                </div>
            <?php endif; ?>
            <div class="az-content-body">
                <?php $this->load->view($content); ?>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded-circle" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->load->view('partials/footer'); ?>

    <!-- Core JavaScript-->
    <script src="<?php echo base_url() . 'vendor/components/jquery/jquery.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'lib/ionicons/ionicons.js'; ?>"></script>
    <script src="<?php echo base_url() . 'vendor/components/jqueryui/ui/widgets/datepicker.js'; ?>"></script>
    <script src="<?php echo base_url() . 'lib/lightslider/js/lightslider.min.js'; ?>"></script>

    <script src="<?php echo base_url() . 'vendor/datatables/datatables/media/js/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'vendor/select2/select2/dist/js/select2.min.js'; ?>"></script>

    <script src="<?php echo base_url() . 'assets/az/js/azia.js'; ?>"></script>
    <script src="<?php echo base_url() . 'vendor/moment/moment/min/moment-with-locales.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'lib/sweetalert2/sweetalert2.all.min.js'; ?>"></script>
    <!-- Page level custom scripts -->
    <script>
        var BASEURL = "http://localhost/korlantas_tah/";
    </script>

    <?php $this->load->view('stack_js.php'); ?>
    <?php $this->load->view('partials/alerts'); ?>
</body>

</html>