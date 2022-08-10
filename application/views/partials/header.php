<div class="az-header border-bottom">
    <div class="container">
        <div class="az-header-left">
            <a href="index.html" class="az-logo">
                <img src="<?php echo base_url() . 'assets/img/logo-app/svg/logo_tah_longtext.svg'; ?>" height="35">
            </a>
            <a href="" id="azNavShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-navbar az-navbar-one">
            <div>
                <a href="index.html" class="az-logo">
                    <img src="<?php echo base_url() . 'assets/img/logo-app/svg/logo_tah_longtext.svg'; ?>" height="40">
                </a>
            </div>
            <ul class="nav">
                <li class="nav-label">Main Menu</li>
                <li class="nav-item  <?= ($this->uri->segment(1) === 'beranda') ? 'active' : ''; ?> ">
                    <a href="<?= base_url() . 'beranda'; ?>" class="nav-link d-flex align-items-center">
                        <i class='bx bx-home'></i>
                        Beranda
                    </a>
                </li>

                <li class="nav-item <?= ($this->uri->segment(1) === 'titik_rawan') ? 'active' : ''; ?> ">
                    <a href="javscript:void(0);" class="nav-link with-sub d-flex align-items-center">
                        <i class='bx bx-map-pin'></i>
                        Titik Rawan
                    </a>
                    <nav class="nav-sub">
                        <a href="<?= base_url() . 'titik_rawan'; ?>" class="nav-sub-link">Lokasi Rawan</a>
                    </nav>
                </li>
                <li class="nav-item <?= ($this->uri->segment(1) === 'statistik') ? 'active' : ''; ?>">
                    <a href="" class="nav-link with-sub d-flex align-items-center">
                        <i class="bx bx-bar-chart"></i>
                        Statistik</a>
                    <nav class="nav-sub">
                        <a href="<?= base_url() . 'statistik/insiden/show'; ?>" class="nav-sub-link">Data Kecelakaan</a>
                    </nav>
                </li>
                <?php if (isLogin()) : ?>
                    <li class="nav-item <?= ($this->uri->segment(1) === 'data') ? 'active' : ''; ?> ">
                        <a href="javscript:void(0);" class="nav-link with-sub d-flex align-items-center">
                            <i class='bx bx-data'></i>
                            Data
                        </a>
                        <nav class="nav-sub">
                            <a href="<?= base_url() . 'lokasi'; ?>" class="nav-sub-link">Data Lokasi</a>
                            <a href="<?= base_url() . 'laka'; ?>" class="nav-sub-link">Data Kecelakaan</a>
                            <!-- <a href="<?= base_url() . 'lokasi'; ?>" class="nav-sub-link">Data Korban</a> -->
                        </nav>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <?php if (isLogin()) : ?>
            <div class="az-header-right">
                <div class="dropdown az-profile-menu align-items-center">
                    <a href="" class="az-img-user">
                        <i class="fa fa-2x fa-user-circle tx-dark mt-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <!-- <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="https://via.placeholder.com/500x500" alt="">
                            </div>
                        </div> -->

                        <a href="<?= base_url() . 'auth/destroy'; ?>" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>