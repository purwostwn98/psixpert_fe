<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale();?>
<div class="page-content container">
    <div class="page-header border-0 ">
        <h1 class="page-title text-primary-d2">
            Overview & Stats
        </h1>

        <!-- <div class="page-tools">
            <div class="action-buttons text-nowrap">
                <a class="btn bgc-white btn-light-secondary mx-0" href="#" data-toggle="tooltip" title="Details">
                    <i class="fa fa-search-plus text-info"></i>
                </a>
                <a class="btn bgc-white btn-light-secondary mx-0" href="#" data-toggle="tooltip" title="Print">
                    <i class="fa fa-print text-purple-m1"></i>
                </a>
                <a class="btn bgc-white btn-light-secondary mx-0" href="#" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-trash text-danger-m1"></i>
                </a>
            </div>
        </div> -->
    </div>
    <hr class="my-3">


    <!-- stat boxes -->
    <div class="row px-2">
        <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
                <div class="mb-1">
                    <span class="d-inline-block bgc-primary-l2 p-3 radius-round">
                        <i class="fa fa-comment text-primary-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <h2 class="text-primary pb-0"><b><?=$today->jumlah_respondent?></b></h2>
                    <div class="text-dark-tp5 text-110">Responden Hari Ini</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
                <div class="mb-1">
                    <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="fa fa-hourglass text-info-m1 text-180 w-4"></i>
                    </span>
                </div>

                <div class="mt-2px">
                    <h2 class="text-blue pb-0"><b><?=$month->jumlah_respondent?></b></h2>
                    <div class="text-dark-tp5 text-110">Responden Bulan Ini</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
                <div class="mb-1">
                    <span class="d-inline-block bgc-warning-l2 p-3 radius-round">
                        <i class="fa fa-comment text-warning-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <h2 class="text-orange pb-0"><b><?=$year->jumlah_respondent?></b></h2>
                    <div class="text-dark-tp5 text-110">Responden Tahun Ini</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
                <div class="mb-1">
                    <span class="d-inline-block bgc-secondary-l2 p-3 radius-round">
                        <i class="fa fa-check-square text-secondary-m1 text-180 w-4"></i>
                    </span>
                </div>

                <div class="mt-2px">
                    <h2 class="text-secondary pb-0"><?=$all->jumlah_respondent?></b></h2>
                    <div class="text-dark-tp5 text-110">Jumlah Responden</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row px-2 mt-3 bgc-white justify-align-center">
        <div class="col-lg-8 py-3">
            <h3 class="text-grey-d1 pb-0 mb-0 text-100">
                Statistik Survey
            </h3>
            <canvas id="myChart" class="mx-n1 mx-md-0"></canvas>
        </div>
        <div class="col-lg-4 py-3">
            <h3 class="text-grey-d1 pb-0 mb-0 text-100">
                Statistik Peneliti
            </h3>
            <canvas id="myChart2" class="mx-n1 mx-md-0"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Statistik Program -->
<script>
    const data_peneliti = JSON.parse('<?=json_encode($statistik_peneliti)?>')
    let labels = []
    let data = []
    data_peneliti.forEach(function(obj) 
    { 
        labels.push(obj.nama_instrument)
        data.push(obj.jumlah_peneliti)
        
    });
    const myChart = new Chart(
        document.getElementById('myChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Survey',
                    data: data,
                    backgroundColor: [
                        'rgba(50,205,50)'
                    ],
                    borderColor: [
                        'rgb(50,205,50)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        }
    );
</script>

<!-- Statistik Pilar -->
<script>
    const data_respondent = JSON.parse('<?=json_encode($statistik_respondent)?>')
    let labels_resp = []
    let data_resp = []
    data_respondent.forEach(function(obj) 
    { 
        labels_resp.push(obj.nama_instrument)
        data_resp.push(obj.jumlah_respondent)
        
    });
    const myChart2 = new Chart(
        document.getElementById('myChart2'), {
            type: 'doughnut',
            data: {
                labels: labels_resp,
                datasets: [{
                    label: 'Stats Pilar',
                    data: data_resp,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)'
                    ],
                    hoverOffset: 4
                }]
            }
            // options: {
            //     scales: {
            //         y: {
            //             beginAtZero: true
            //         }
            //     }
            // },
        }
    );
</script>

<!-- Time Series-->
<!-- <script>
    const myChart3 = new Chart(
        document.getElementById('myChart3'), {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Jumlah Ajuan',
                    data: [
                        
                    ],
                    backgroundColor: [
                        'rgba(247, 150, 5)'
                    ],
                    borderColor: [
                        'rgb(247, 150, 5)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        }
    );
</script> -->
<?= $this->endSection(); ?>