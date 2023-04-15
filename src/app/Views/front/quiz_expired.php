<?= $this->extend("/template/front_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php

$locale = service('request')->getLocale();
?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('https://www.ums.ac.id/wp-content/uploads/2020/09/penelitian-fku-ums.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">


        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Services Section ======= -->
    <section id="services-list" class="services-list" style="padding-top: 40px;">
        <div class="container" data-aos="fade-up">

        <h2 style="color: black; font-weight: 600;" class="text-center"><?= lang('Landing.expired_survey') ?></h2>
        
        <?php
        $request = \Config\Services::request();
        $code_survei = $request->uri->getSegment(3);
        ?>
        <div class="col-md-12 text-center mt-5">
            <a href="/<?=$locale?>" type="button" class="btn btn-info text-white">
                <i class="bi bi-house-door-fill" ></i>
                Go Home
            </a>
        </div>
            
    </section><!-- End Our Services Section -->


</main><!-- End #main -->
<?= $this->endSection(); ?>