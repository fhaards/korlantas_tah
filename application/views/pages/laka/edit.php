<div id="modal-edit-laka" class="modal fade effect-slide-in-bottom">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-10 modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize">Ubah Data Kecelakaan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-laka" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Lokasi</label>
                        <input type="hidden" class="form-control set-edit-id">
                        <select class="form-control edit-pilih-lokasi" name="id_lokasi">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Insiden</label>
                        <input type="datetime-local" class="form-control edit1" name="tgl_insiden" placeholder="Timestamp">
                    </div>
                    <div class="form-group">
                        <label>Tipe Kecelakaan</label>
                        <select class="form-control edit2" name="tipe_laka">
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
                            <input type="number" class="form-control edit3" name="korban_meninggal" placeholder="Jumlah Korban Meninggal">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Luka</label>
                            <input type="number" class="form-control edit4" name="korban_luka" placeholder="Jumlah Korban Luka">
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