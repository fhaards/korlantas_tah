<div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-md-12" id="page-header">
        <div class="card card-dashboard-six">
            <div class="card-header mb-0 d-flex flex-md-row justify-content-between">
                <div>
                    <div class="az-content-label mg-b-5">Data Kecelakaan</div>
                    <p class="mg-b-20 p-0 m-0">
                        Menampilkan semua data kecelakaan yang telah terjadi
                    </p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <button class="btn rounded-10 btn-xs btn-with-icon btn-az-primary mr-2 btn-add" data-toggle="modal" data-target="#modal-add-<?= $pageTitle; ?>"><i class="bx bx-plus"></i> Tambah Data</button>
                    <a href="<?= base_url() . 'laporan/laka/'; ?>" target="_blank" class="btn rounded-10 btn-icon btn-success"><i class="bx bx-printer"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 d-flex flex-md-column justify-content-between my-3">
        <div class="card">
            <div class="card-body px-2 py-3">
                <form action="" class="px-0" id="filter-<?= $pageTitle; ?>">
                    <div class="d-flex align-items-center justify-content-end ">
                        <div class="col d-md-block d-none"> <strong>Filter</strong></div>
                        <div class="col-md-3 form-group">
                            <label>Total Korban</label>
                            <select class="filter-total form-control">
                                <option value="All"> -- Pilih Total --</option>
                                <option value="1">0</option>
                                <option value="10">1-10</option>
                                <option value="100">10-100</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Tipe Laka</label>
                            <select class="filter-tipe form-control">
                                <option value="All"> -- Pilih Tipe --</option>
                                <option value="Angle (Ra)">Angle (Ra)</option>
                                <option value="Rear End (Re)">Rear End (Re)</option>
                                <option value="Sideswipe (Ss)">Sideswipe (Ss)</option>
                                <option value="Head On (Ho)">Head On (Ho)</option>
                                <option value="Backing">Backing</option>
                            </select>
                        </div>
                        <div class="col-md-2  form-group">
                            <label>Tanggal</label>
                            <input type="date" class="filter-date form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="table-<?= $pageTitle; ?>" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="wd-15p">ID</th>
                    <th class="wd-15p">Nama Lokasi</th>
                    <th class="wd-15p">Tanggal Insiden</th>
                    <th class="wd-15p">Tipe</th>
                    <th class="wd-5p">Meninggal</th>
                    <th class="wd-5p">Luka</th>
                    <th class="wd-5p">Total</th>
                    <th class="wd-5p"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<?php
$this->load->view($addForm);
$this->load->view($editForm);
?>