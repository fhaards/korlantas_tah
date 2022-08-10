<script src="<?php echo base_url() . 'src/app-function.js'; ?>"></script>

<?php
$getCurrentUrl = current_url();
$url1 =  $this->uri->segment(1);
$url2 =  $this->uri->segment(2);
$url3 =  $this->uri->segment(3);
?>

<!-- PUBLIC JS -->
<?php if ($getCurrentUrl == base_url() . 'beranda') : ?>
    <script src="<?php echo base_url() . 'src/public-lokasi.js'; ?>"></script>
<?php endif; ?>

<?php if ($getCurrentUrl == base_url() . 'titik_rawan') : ?>
    <script src="<?php echo base_url() . 'lib/chart.js/Chart.bundle.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'src/public-lokasi.js'; ?>"></script>
<?php endif; ?>


<!--------------------  WEBPAGE JS --------------------------->

<!-- LOKASI -->
<?php if ($getCurrentUrl == base_url() . 'lokasi') : ?>
    <script src="<?php echo base_url() . 'src/page-lokasi.js'; ?>"></script>
<?php endif; ?>

<?php if ($url1 == "lokasi" && $url2 == "add") : ?>
    <script src="<?php echo base_url() . 'src/page-lokasi-add.js'; ?>"></script>
<?php endif; ?>

<?php if ($url1 == "lokasi" && $url2 == "detail") : ?>
    <script src="<?php echo base_url() . 'src/page-lokasi-detail.js'; ?>"></script>
<?php endif; ?>

<!-- LAKA -->
<?php if ($url1 == "laka" && $url2 == "show") : ?>
    <script src="<?php echo base_url() . 'src/page-laka.js'; ?>"></script>
<?php endif; ?>

<?php if ($url1 == "laka" && $url2 == "detail") : ?>
    <script src="<?php echo base_url() . 'src/page-laka-detail.js'; ?>"></script>
<?php endif; ?>

<!-- LAKA -->
<?php if ($url1 == "statistik" && $url2 == "insiden") : ?>
    <script src="<?php echo base_url() . 'lib/chart.js/Chart.bundle.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'src/page-statistik-insiden.js'; ?>"></script>
<?php endif; ?>