<div id="modal-add-laka" class="modal fade effect-slide-in-bottom">
    <div class="modal-dialog" role="document">
        <div class="modal-content  rounded-10 modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize">Tambah Data Kecelakaan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="form-add-laka">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Lokasi</label>
                        <select class="form-control pilih-lokasi" name="id_lokasi">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Insiden</label>
                        <input type="datetime-local" class="form-control" name="tgl_insiden" placeholder="Timestamp" required>
                    </div>
                    <div class="form-group">
                        <label>Tipe Kecelakaan</label>
                        <select class="form-control" name="tipe_laka" required>
                            <option value="Angle (Ra)">Angle (Ra)</option>
                            <option value="Rear End (Re)">Rear End (Re)</option>
                            <option value="Sideswipe (Ss)">Sideswipe (Ss)</option>
                            <option value="Head On (Ho)">Head On (Ho)</option>
                            <option value="Backing">Backing</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label>Meninggal</label>
                            <input type="number" class="form-control" name="korban_meninggal" placeholder="Jumlah Korban Meninggal" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Luka</label>
                            <input type="number" class="form-control" name="korban_luka" placeholder="Jumlah Korban Luka" required>
                        </div>
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