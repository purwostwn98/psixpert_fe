<?= $this->extend("/template/front_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale(); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('https://www.ums.ac.id/wp-content/uploads/2020/09/penelitian-fku-ums.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h3 style="color: white;">My Survey Results and Reports</h3>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="services-list" class="services-list" style="padding-top: 40px;">
        <div class="container" data-aos="fade-up">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Taken On</th>
                        <th>Name</th>
                        <th>Survey Name</th>
                        <th>Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($riwayat as $key => $value): ?>
                        <tr>
                            <td><?=$value->take_on?></td>
                            <td><?=$value->name?></td>
                            <td><?=$value->nama_instrument?></td>
                            <td><?=$value->score?> (<?=$value->label?>)</td>
                            <td><a href="<?=base_url($locale)?>/home/hasil-survei?instrument=<?=$value->detail_id?>&take_on=<?=$value->take_on?>" class="btn btn-info text-white">Open Detail</a></td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
        </div>
    </section><!-- End Our Services Section -->



</main><!-- End #main -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?= $this->endSection(); ?>