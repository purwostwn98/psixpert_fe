<?= $this->extend("/template/front_layout.php"); ?>
<?= $this->section("konten"); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url(); ?>/depan/image/edutorium_ums.jpeg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h3 style="color: white;"><?=$hasil_survei->nama_instrument?></h3>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="about" class="about">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row gy-4 aos-init aos-animate" data-aos="fade-up">
                <div class="col-lg-4">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="col-lg-8">
                    <div class="content ps-lg-5">
                        <h3 class="pb-0 mb-0"><?= ucfirst($hasil_survei->label)?></h3>
                        <span class="small-text">Your Score: <?= ucfirst($hasil_survei->score)?></span>
                        <p>
                        <?= ucfirst($hasil_survei->deskripsi)?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



</main><!-- End #main -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = {
        labels: [
            'Your Score',
            '-'
        ],
        datasets: [{
            label: 'Your Score',
            data: [<?=$hasil_survei->score?>, <?=$hasil_survei->score_tertinggi-$hasil_survei->score?>],
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
    };
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
<?= $this->endSection(); ?>