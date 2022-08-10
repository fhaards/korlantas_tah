<div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-md-12">
        <div class="card card-dashboard-six p-0 border-0">
            <div class="card-header border p-3 m-0 d-flex d-flex flex-row justify-content-between align-items-center">
                <div>
                    <div class="az-content-label mg-b-5">Titik Rawan</div>
                    <p class="p-0 m-0">
                        Tambah Titik Rawan Kecelakaan
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="form-add-<?= $pageTitle ?>" method="post">
    <div class="row">
        <!-- SHOWING MAP -->
        <div class="col-md-8 d-flex">
            <div id="map-add" class="ht-300 w-100" style="z-index:2;height:400px;"></div>
        </div>
        <!-- FORM -->
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" name="nm_lokasi" placeholder="Nama Lokasi">
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <input type="text" class="form-control add-latitude" name="latitude" placeholder="Latitude" readonly>
                </div>
                <div class="form-group col-12 col-md-6">
                    <input type="text" class="form-control add-longitude" name="longitude" placeholder="Longitude" readonly>
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