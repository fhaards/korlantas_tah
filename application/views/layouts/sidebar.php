        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <img src="<?= base_url() . 'assets/img/logo-app/logo_korlantas.svg'; ?>" class="text-logo d-none">
                <img src="<?= base_url() . 'assets/img/logo-app/logo_korlantas.svg'; ?>" class="small-logo" height="50">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?beranda=read">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>


            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Konten
            </div> -->

            <?php
            $dataSidebar = [
                'karyawan' => 'fa-user',
                'bus' => 'fa-bus',
                'halte' => 'fa-flag',
                'jadwal' => 'fa-calendar-check'
            ];
            ?>

            <?php foreach ($dataSidebar as $nameSdbr => $iconSdbr) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . $nameSdbr; ?>">
                        <i class="fas fa-fw <?= $iconSdbr; ?>"></i>
                        <span class="text-capitalize"><?= $nameSdbr; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                    <i class="fas fa-fw fa-road"></i>
                    <span>Trayek</span>
                </a>
                <div id="collapse4" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Trayek :</h6>
                        <a class="collapse-item" href="<?= base_url() . 'trayek'; ?>">
                            Data Trayek
                        </a>
                        <a class="collapse-item" href="<?= base_url() . 'jalur'; ?>">
                            Data Jalur
                        </a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->