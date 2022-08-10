<div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-md-12">
        <div class="card card-dashboard-six p-0 border-0">
            <div class="card-header border p-3 m-0 d-flex d-flex flex-row gap-4 justify-content-between align-items-center">
                <div>
                    <div class="az-content-label mg-b-5">Titik Rawan</div>
                    <p class="mg-b-20 p-0 m-0">
                        Lokasi Titik Rawan Kecelakaan
                    </p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <a href="<?= base_url() . 'lokasi/add'; ?>" class="btn rounded-10 btn-with-icon mr-2 btn-az-primary btn-add"><i class="bx bx-plus"></i> Tambah Data</a>
                    <a href="<?= base_url() . 'laporan/lokasi/'; ?>" target="_blank" class="btn rounded-10 btn-icon btn-success"><i class="bx bx-printer"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive w-100 mt-5 m-0">
        <table class="table table-bordered table-striped " id="table-<?= $pageTitle; ?>" width="100%" cellspacing="0">
            <!-- <table class="display responsive wrap" id="table-<?= $pageTitle; ?>"> -->
            <thead>
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-15p">Nama Lokasi</th>
                    <th class="wd-15p">Alamat</th>
                    <th class="wd-15p">Latitude</th>
                    <th class="wd-15p">Longitude</th>
                    <th class="wd-15p">Created At</th>
                    <th class="wd-15p"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="modal-edit-<?= $pageTitle; ?>" class="modal fade effect-slide-in-bottom">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize">Tambah <?= $pageTitle; ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-<?= $pageTitle ?>" method="post">
                <div class="modal-body">
                    <p class="mb-5">Tambahkan Lokasi / Titik Rawan Kecelakaan</p>
                    <div class="form-group">
                        <input type="hidden" class="form-control set-edit-id">
                        <input type="text" class="form-control edit1" name="nm_lokasi" placeholder="Nama Lokasi">
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control edit2" name="latitude" placeholder="Latitude">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control edit3" name="longitude" placeholder="Longitude">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control edit4" name="alamat_lokasi" placeholder="Alamat"> </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <div id="modal-add-<?= $pageTitle; ?>" class="modal fade effect-slide-in-bottom modal-fullscreen">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize">Tambah <?= $pageTitle; ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form-add-<?= $pageTitle ?>" method="post">
                    <p class="mb-5">Tambahkan Lokasi / Titik Rawan Kecelakaan</p>
                    <div class="row">
                        <div class="col-md-8 d-flex">
                            <div id="map-add" class="ht-300 w-100" style="z-index:2;height:400px;"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nm_lokasi" placeholder="Nama Lokasi">
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="form-control" name="latitude" placeholder="Latitude">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="form-control" name="longitude" placeholder="Longitude">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="alamat_lokasi" placeholder="Alamat Lokasi"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div> -->