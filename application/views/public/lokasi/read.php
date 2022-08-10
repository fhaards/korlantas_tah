<div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-md-12 mb-3">
        <div class="card card-dashboard-six p-0 border-top border-bottom-0 border-left-0 border-right-0">
            <div class="card-header px-3 py-5 mb-0">
                <div class="text-center w-100 d-flex flex-column justify-content-center align-items-center">
                    <label class="h2 text-uppercase tx-spacing-6 text-primary font-weight-bold">Lokasi Titik Rawan Kecelakaan</label>
                    <span class="d-block tx-spacing-2 text-uppercase">Wilayah Cengkareng</span>
                    <?php if (isLogin()) : ?>
                        <div class="w-25 mt-5">
                            <a href="<?= base_url() . 'lokasi/add'; ?>" class="btn rounded-10 btn-xs btn-with-icon btn-az-primary btn-add"><i class="bx bx-plus"></i> Tambah Data</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body p-0 m-0" id="page-titik-rawan">
                <div id="lokasi-detail" class="mg-t-20 mg-lg-t-0 col-md-3 col-6 detail-lokasi">
                    <div class="card card-dashboard-map-one rounded-10">
                        <label class="az-content-label lokasi-nama"></label>
                        <div class="d-flex flex-row mg-b-20 align-items-center">
                            <i class="fa fa-1x fa-map-marker-alt text-danger mr-3"></i>
                            <span class=" lokasi-almt"></span>
                        </div>

                        <div class="az-media-list-activity mg-b-10 border-top">
                            <div class="az-list-item">
                                <div>
                                    <h6>Total Insiden</h6>
                                </div>
                                <div>
                                    <h6 class="tx-primary total-insiden"><i>-</i></h6>
                                </div>
                            </div>
                            <div class="az-list-item">
                                <div>
                                    <h6>Total Korban</h6>
                                </div>
                                <div>
                                    <h6 class="tx-primary total-korban"><i>-</i></h6>
                                </div>
                            </div>
                            <div class="az-list-item">
                                <div>
                                    <h6>Korban Meninggal</h6>
                                </div>
                                <div>
                                    <h6 class="tx-primary korban-mati"><i>-</i></h6>
                                </div>
                            </div>
                            <div class="az-list-item">
                                <div>
                                    <h6>Korban Luka</h6>
                                </div>
                                <div>
                                    <h6 class="tx-primary korban-luka"><i>-</i></h6>
                                </div>
                            </div>
                        </div>
                        <?php if (isLogin()) : ?>
                            <a href="" class="btn btn-outline-primary rounded-10 btn-see-all d-none">Lihat Semua</a>
                        <?php endif; ?>
                        <!-- <div class="chart col-md-6"><canvas id="chartDonut"></canvas></div> -->
                    </div>
                </div>
                <div id="map" class="ht-300" style="z-index: 0;width: 100%;height: 100%;"></div>
            </div>
        </div>
    </div>


</div>