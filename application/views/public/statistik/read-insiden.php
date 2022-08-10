<div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-md-12" id="statistik-insiden-year">
        <div class="card card-dashboard-six p-0 border-0">
            <div class="card-header border p-3 m-0 d-flex d-flex flex-row gap-4 justify-content-between align-items-center">
                <div class="">
                    <div class="az-content-label mg-b-5">Statistik Total Insiden</div>
                    <p class="mg-b-20 p-0 m-0">Data Statistik Insiden / Kecelakaan & Data Statistik Jumlah Korban </p>
                </div>
                <div class='form-group d-flex flex-row p-0 m-0'>
                    <select class="form-control rounded-10 get-statistik-insiden-year">
                    </select>
                </div>
            </div>
            <div class="card-body m-0">

                <div class="row">
                    <!-- <div class="loading-pages">
                    <div class="loader-content d-flex justify-content-center w-auto align-items-center">
                        <span class="test-loader"></span>
                    </div>
                </div> -->

                    <!-- CHART INSIDEN -->
                    <div class="col-md-12">
                        <div class="chart-js-line mb-3 py-3">
                            <div class="chartjs-wrapper-demo"><canvas id="chartLine1"></canvas></div>
                        </div>
                    </div>

                    <!-- CHART KORBAN -->
                    <div class="col-md-12">
                        <div class="chart-js-line mb-3 border-top py-3">
                            <div class="chartjs-wrapper-demo"><canvas id="chartLine2"></canvas></div>
                        </div>
                    </div>

                    <!-- CHART TIPE KECELAKAAN -->
                    <div class="col-md-12">
                        <div class="chart-js-bar mb-3 border-top py-3">
                            <div class="chartjs-wrapper-demo"><canvas id="chartBar"></canvas></div>
                        </div>
                    </div>

                    <!-- CHART TIPE KECELAKAAN -->
                    <div class="col-md-6">
                        <h5>Keterangan</h5>
                        <p class="text-justify">
                            Macam macam kecelakaan lalu lintas juga bisa dibagi berdasarkan jenis tabrakan yang terjadi pada peristiwa tersebut.
                            Dalam kategori ini, kecelakaan lalu lintas terbagi menjadi 5 jenis, yaitu angle (Ra), rear end (Re), sideswipe (Ss), head on (Ho), dan backing.
                        </p>
                        <ul>
                            <li>
                                <p class="text-justify">
                                    <strong>Angle (Ra)</strong><br>
                                    Angle adalah tabrakan antara kendaraan yang memiliki arah gerak berbeda, akan tetapi bukan dari arah berlawanan.
                                    Lalu penyebutan rear end terjadi apabila suatu kendaraan menabrak dari arah belakang kendaraan lainnya,
                                    yang sedang bergerak searah.
                                </p>
                            </li>
                            <li>
                                <p class="text-justify">
                                    <strong>Sideswipe</strong><br>
                                    Sideswipe bisa terjadi baik pada arah yang sama maupun berlawanan,
                                    dimana kendaraan menabrak kendaraan lainnya yang tengah melaju dari arah samping.
                                </p>
                            </li>
                            <li>
                                <p class="text-justify">
                                    <strong>Head On</strong><br>
                                    Sedangkan head on merupakan tabrakan yang terjadi antara kendaraan yang memiliki arah berlawanan.
                                </p>
                            </li>
                            <li>
                                <p class="text-justify">
                                    <strong>Backing</strong><br>
                                    Kategori yang terakhir yaitu backing, termasuk dalam macam macam kecelakaan lalu lintas yang terjadi
                                    saat kendaraan bergerak menabrak kendaraan lainnya secara mundur. Jadi backing ini bisa dibilang berkebalikan dari rear end.
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="chart-js-donut mb-3 py-3">
                            <div class="chartjs-wrapper-demo"><canvas id="chartDonut"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- <div class="col-md-12 load-progress">
        <div class="progress mg-b-20">
            <div id="progressing-bar" class="progress-bar wd-0p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div> -->


</div>