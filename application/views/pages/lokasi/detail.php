<div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-md-12" id="page-detail">
        <div class="card card-dashboard-six">
            <div class="card-header mb-0 d-flex flex-md-row justify-content-between">
                <input type="hidden" class="this-id" value="<?= $thisId; ?>">
                <div class="w-50">
                    <p class="mg-b-20 p-0 m-0 h4 page-detail-title"></p>
                    <p class="mg-b-20 p-0 m-0 d-flex flex-row align-items-center">
                        <i class="fa fa-1x text-danger fa-map-marker mr-3"></i>
                        <span class="page-sub-title"></span>
                    </p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <button class="btn rounded-10 btn-xs btn-with-icon btn-az-primary mr-2" data-toggle="modal" data-target="#modal-add-laka"><i class="bx bx-plus"></i> Tambah Data</button>
                    <a href="<?= base_url() . 'laporan/lokasi/' . $thisId;; ?>" target="_blank" class="btn rounded-10 btn-icon btn-success"><i class="bx bx-printer"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-5">
        <table class="table table-bordered table-striped" id="table-<?= $pageTitle; ?>-detail" width="100%" cellspacing="0">
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