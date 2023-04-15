<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale(); ?>
<div class="page-content container bg-white">
    <div class="page-header border-0 justify-content-between">
        <h1 class="text-grey-d1 pb-0 mb-0 text-130">
            <?= $data->nama_instrument ?>
        </h1>
        <div class="page-tools pt-1 mt-3 mt-sm-0 mb-sm-n1"><a href="<?= $locale ?>/admin/daftar-responden-2?instrument=<?= $_GET['instrument'] ?>" class="btn btn-xs btn-secondary"><i class="fa fa-arrow-left text-110 align-text-bottom mr-1"></i> | Back</a></div>

    </div>
    <!-- stat boxes -->
    <div class="row gy-4 aos-init aos-animate" data-aos="fade-up">
        <div class="col-lg-4">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-lg-8">
            <div class="content ps-lg-5">
                <h3 style="font-weight: 700;" class="pb-0 mb-0"><?= $data->data_respondent->nama_lengkap ?></h3>
                <p style="color: #81949f; font-size: small;"><i class="fas fa-envelope"></i> <?= $data->data_respondent->email ?>
                    <i style="margin-left: 10px ;" class="fas fa-map-marker-alt"></i> <?= $data->data_respondent->kota ?>, <?= $data->data_respondent->provinsi ?>, <?= $data->data_respondent->negara ?>
                </p>
                <ul class="nav nav-tabs nav-tabs-simple nav-tabs-scroll border-b-1 brc-secondary-l2 mx-n3 mx-md-0 px-3 px-md-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home0" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-poll"></i>
                            Result
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link brc-purple-tp2 d-style" id="profile-tab" data-toggle="tab" href="#profile0" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fa fa-user text-purple-m2 mr-3px"></i>
                            <span class="d-n-active">Profile</span>
                            <span class="d-active text-purple">Profile</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content tab-sliding px-0 mx-n3 mx-md-0">
                    <div class="tab-pane show text-95 px-3 px-md-2 active" id="home0" role="tabpanel" aria-labelledby="home-tab">
                        <p class="text-600 mb-1 text-warning-d2 text-120">Score: <?= $data->score ?> (<?= ucfirst($data->label) ?>)</p>                        
                        <?= $data->deskripsi ?>
                    </div>
                    <div class="tab-pane text-95 px-3 px-md-2" id="profile0" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table table-striped-info table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-95 text-default-d3">Nama Lengkap</td>
                                    <td class="text-secondary-d2"><?= $data->data_respondent->nama_lengkap ?></td>
                                </tr>
                                <tr>
                                    <td class="text-95 text-default-d3">Email</td>
                                    <td class="text-secondary-d2 text-wrap"><?= $data->data_respondent->email ?></td>
                                </tr>
                                <tr>
                                    <td class="text-95 text-default-d3">Tanggal Lahir</td>
                                    <td class="text-secondary-d2"><?php 
                                    echo date("d F Y", strtotime($data->data_respondent->tanggal_lahir));
                                      ?></td>
                                </tr>
                                <tr>
                                    <td class="text-95 text-default-d3">Usia</td>
                                    <td class="text-secondary-d2">
                                        <?php  
                                        $birth_date = date("Y", strtotime($data->data_respondent->tanggal_lahir));
                                        $age = date("Y") - $birth_date;
                                        echo $age ." Tahun";
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-95 text-default-d3">Agama</td>
                                    <td class="text-secondary-d2"><?= $data->data_respondent->agama ?></td>
                                </tr>
                                <tr>
                                    <td class="text-95 text-default-d3">Status Pernikahan</td>
                                    <td class="text-secondary-d2"><?= $data->data_respondent->status_pernikahan ?></td>
                                </tr>
                                <tr>
                                    <td class="text-95 text-default-d3">Alamat</td>
                                    <td class="text-secondary-d2"><?= $data->data_respondent->kota ?>, <?= $data->data_respondent->provinsi ?>, <?= $data->data_respondent->negara ?></td>
                                </tr>
                                <tr>
                                    <td class="text-95 text-default-d3">Instansi</td>
                                    <td class="text-secondary-d2"><?= $data->data_respondent->instansi ?></td>
                                </tr>
                                <tr>
                                    <td class="text-95 text-default-d3">Akademik</td>
                                    <td class="text-secondary-d2"><?= $data->data_respondent->akademik ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="row">
                <div class="col-md-12 bg-white" style="font-size: 13px">
                    <div class="table-responsive-md">
                        <table id="datatable" class="table table-border-y text-dark-m2 text-95 border-y-1 brc-secondary-l1">
                            <thead class="text-secondary-m2 text-uppercase text-85">
                                <tr>
                                    <th class="border-0 bgc-h-default-l3">No.</th>
                                    <th class="border-0 bgc-h-default-l3">Question</th>
                                    <th class="border-0 bgc-h-default-l3">Answer Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data->data_pertanyaan as $key => $value) : ?>
                                    <tr class="d-style bgc-h-default-l4">
                                        <td>
                                            <span class="text-105"><?= $key + 1 ?></span>
                                        </td>
                                        <td>
                                            <span class="text-105"><?= $value->soal ?></span>
                                        </td>
                                        <td>
                                            <span class="text-105"><?= $value->bobot_pilihan ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="<?= base_url(); ?>/application/views/default/pages/partials/table-datatables/@page-script.js"></script>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = {
        labels: [
            'Score',
            '-'
        ],
        datasets: [{
            label: 'Score',
            data: [<?=$data->score?>, <?=$data->score_tertinggi-$data->score?>],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)'
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            maintainAspectRatio: false,
        }
    };
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<?= $this->endSection(); ?>