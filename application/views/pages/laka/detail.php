<div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-md-12 border-top py-3 mb-5 d-flex flex-md-column justify-content-between" id="detail-laka">
        <input type="hidden" class="getid" value="<?= $getId; ?>">
        <div>
            <div class="d-flex flex-row align-items-center justify-content-between mg-b-5 mb-3">
                <div class="az-content-label">Detail Kecelakaan : <span class="idLaka"></span></div>
                <a href="<?= base_url() . 'laporan/laka/' . $getId;; ?>" target="_blank" class="btn rounded-10 btn-icon btn-success"><i class="bx bx-printer"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th class="bg-light text-dark">Lokasi</th>
                        <td colspan="3">
                            <p class="mg-b-20 p-0 m-0 nmLokasi"></p>
                        </td>

                    </tr>
                    <tr>
                        <th class="bg-light text-dark">Alamat</th>
                        <td colspan="3">
                            <div class="d-flex flex-row align-items-center">
                                <i class="fa fa-1x text-danger fa-map-marker mr-3"></i>
                                <p class="mg-b-20 p-0 m-0 nmAlamat"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3" class="bg-light text-dark text-center">Korban</th>
                    </tr>
                    <tr>
                        <td class="wd-15p text-center border-danger text-danger">Meninggal</td>
                        <td class="wd-15p text-center border-warning text-warning">Luka</td>
                        <td class="wd-15p text-center border-dark text-dark">Total</td>
                    </tr>
                    <tr>
                        <td class="h4 text-center"><span class="korban1"></span> </td>
                        <td class="h4 text-center"><span class="korban2"></span> </td>
                        <td class="h4 text-center"><span class="korban3"></span> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-12 my-2 d-flex flex-md-row justify-content-between align-items-center">
        <div class="az-content-label mg-b-5 mb-3">Data Korban</div>
        <div>
            <button class="btn rounded-10 btn-xs btn-with-icon btn-block btn-az-primary btn-add" data-toggle="modal" data-target="#modal-add-korban">
                <i class="bx bx-plus"></i>
                Tambah Data Korban
            </button>
        </div>
    </div>
    <div class="col-md-12 my-2 d-flex flex-md-row justify-content-between align-items-center">
        <div class="table-responsive overflow-hidden">
            <table class="table table-bordered" id="table-laka-korban" width="100%" cellspacing="0">
                <!-- <table class="display responsive wrap" id="table-<?= $pageTitle; ?>"> -->
                <thead>
                    <tr>
                        <th class="wd-5p">No</th>
                        <th class="wd-10p">Nama</th>
                        <th class="wd-5p">Umur</th>
                        <th class="wd-10p">Jenis Kelamin</th>
                        <th class="wd-10p">Jenis Luka</th>
                        <th class="wd-10p"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div id="modal-add-korban" class="modal fade effect-slide-in-bottom">
    <div class="modal-dialog" role="document">
        <div class="modal-content  rounded-10 modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize">Tambah Data Korban</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-add-korban">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-12">
                            <label>Nama</label>
                            <input type="text" class="form-control nama" name="nama" placeholder="Nama Korban" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Umur</label>
                            <input type="number" class="form-control umur" name="umur" placeholder="Umur Korban" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Jenis Kelamin</label>
                            <select class="form-control jk" name="jk" required>
                                <option value="0"> - </option>
                                <option value="1">Laki - Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-12">
                            <label>Kondisi</label>
                            <select class="form-control kondisi" name="kondisi" required>
                                <option value="1">Korban Luka</option>
                                <option value="2">Korban Meninggal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
                    <button type="submit" class="btn btn-primary submit-form">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal-edit-korban" class="modal fade effect-slide-in-bottom">
    <div class="modal-dialog" role="document">
        <div class="modal-content  rounded-10 modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize">Edit Data Korban</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-edit-korban">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-12">
                            <label>Nama</label>
                            <input type="text" class="form-control nama" name="nama" placeholder="Nama Korban" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Umur</label>
                            <input type="number" class="form-control umur" name="umur" placeholder="Umur Korban" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Jenis Kelamin</label>
                            <select class="form-control jk" name="jk" required>
                                <option value="0"> - </option>
                                <option value="1">Laki - Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-12">
                            <label>Kondisi</label>
                            <select class="form-control kondisi" name="kondisi" required>
                                <option value="1">Korban Luka</option>
                                <option value="2">Korban Meninggal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
                    <button type="submit" class="btn btn-primary submit-form">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>