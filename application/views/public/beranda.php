<div class="media media-dashboard beranda-contents-head">
    <div class="media-body">
        <!-- <div class="card card-dashboard-twelve mg-b-20">
            <div class="card-header">
                <h6 class="card-title">
                    Sales Overview <span>(All Events)</span>
                </h6>

                <div class="sales-overview">
                    <div class="media">
                        <div class="media-icon bg-purple">
                            <i class="typcn typcn-ticket"></i>
                        </div>
                        <div class="media-body">
                            <label>Tickets Sold</label>
                            <h4>3,375</h4>
                            <span><strong>10.5%</strong> of 20,000 Total</span>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-teal">
                            <i class="typcn typcn-ticket"></i>
                        </div>
                        <div class="media-body">
                            <label>Tickets Available</label>
                            <h4>16,625</h4>
                            <span><strong>89.5%</strong> of 20,000 Total</span>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-primary">
                            <i class="typcn typcn-chart-area-outline"></i>
                        </div>
                        <div class="media-body">
                            <label>Net Revenue</label>
                            <h4><span>$</span>20,832</h4>
                            <span><strong>3.4%</strong> of Sales Avg.</span>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <label>About Revenue</label>
                            <p>
                                The total revenue from all events transactions. Depending
                                on your implementation, this can include tax, discounts
                                such as early bird promo. <a href="">Learn more</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-legend">
                    <div><span class="bg-indigo"></span> Tickets Sold</div>
                    <div><span class="bg-teal"></span> Tickets Available</div>
                </div>
                <div class="chart-wrapper">
                    <div id="flotChart" class="flot-chart"></div>
                </div>
            </div>
        </div> -->
        <div class="card card-dashboard-six rounded-10 p-0">
            <div class="card-header p-3 m-0 d-flex justify-content-center flex-column align-items-center">
                <label class="az-content-label">titik rawan</label>
                <p class="az-content-text p-0 m-0">
                    Menunjukan dimana lokasi sering terjadi kecelakaan untuk wilayah cengkareng
                </p>
            </div>
            <div class="card-body p-0 m-0" id="page-titik-rawan">
                <div id="map" style="z-index: 0;width:100%;height:100%;"></div>
                <div id="lokasi-detail" class="mg-lg-t-0 col-md-3 col-12 detail-lokasi">
                    <div class="card card-dashboard-map-one rounded-10">
                        <label class="az-content-label lokasi-nama"></label>
                        <div class="d-flex flex-row mg-b-20 align-items-center">
                            <i class="fa fa-1x fa-map-marker-alt text-danger mr-3"></i>
                            <span class=" lokasi-almt"></span>
                        </div>

                        <div class="az-media-list-activity mg-b-10 border-top d-flex flex-md-column flex-wrap">
                            <div class="az-list-item d-flex flex-md-row flex-column">
                                <div class="mr-5 mr-md-0">
                                    <h6>Total Insiden</h6>
                                </div>
                                <div>
                                    <h6 class="tx-primary total-insiden"><i>-</i></h6>
                                </div>
                            </div>
                            <div class="az-list-item  d-flex flex-md-row flex-column">
                                <div class="mr-5 mr-md-0">
                                    <h6>Total Korban</h6>
                                </div>
                                <div>
                                    <h6 class="tx-primary total-korban"><i>-</i></h6>
                                </div>
                            </div>
                            <div class="az-list-item  d-flex flex-md-row flex-column">
                                <div class="mr-5 mr-md-0">
                                    <h6>Korban Meninggal</h6>
                                </div>
                                <div>
                                    <h6 class="tx-primary korban-mati"><i>-</i></h6>
                                </div>
                            </div>
                            <div class="az-list-item  d-flex flex-md-row flex-column">
                                <div class="mr-5 mr-md-0">
                                    <h6>Korban Luka</h6>
                                </div>
                                <div>
                                    <h6 class="tx-primary korban-luka"><i>-</i></h6>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="chart col-md-6"><canvas id="chartDonut"></canvas></div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>