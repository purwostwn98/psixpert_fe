<?= $this->extend("/template/front_layout.php"); ?>
<?php
$locale = service('request')->getLocale();
?>
<?= $this->section("konten"); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h2 data-aos="fade-up"><?= lang('Landing.title_hero') ?></h2>
                <blockquote data-aos="fade-up" data-aos-delay="100">
                    <p><?= lang('Landing.deskripsi_hero') ?></p>
                </blockquote>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <!-- <a href="/home/quiz" class="btn-get-started">Get Started</a> -->
                    <a href="#our-services" class="btn-get-started"><?= lang('Landing.btn_hero') ?></a>
                    <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                </div>

            </div>
        </div>
    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= Our Services Section ======= -->
    <section id="about-us" class="services-list">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2><?= lang('Landing.title_about_us') ?></h2>
            </div>

            <div class="row gy-5 justify-content-center">
                <div class="col-md-8 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <p class="text-center"><?= lang('Landing.about_us') ?></p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="our-services" class="call-to-action">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h3 class="text-center mb-5"><?= lang('Landing.title_service') ?></h3>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <h4 class="text-warning title"> <?= lang('Landing.title_assessment') ?></h4>
                            <p class="description">
                                <?= lang('Landing.self_assessment_description') ?>
                            </p>
                            <a class="cta-btn" href="#instrument-list"><?= lang('Landing.title_started') ?></a>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4 class="text-warning title"><?= lang('Landing.title_research') ?></h4>
                            <p class="description">
                                <?= lang('Landing.for_research_description') ?>
                            </p>
                            <a style="cursor:pointer ;" class="cta-btn" onclick="formulirPeneliti()" ><?= lang('Landing.title_started') ?></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Our Services Section ======= -->
    <section id="instrument-list" class="services-list">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2><?= lang('Landing.title_instrument') ?></h2>
            </div>
            <?php
            $icon = array('bi bi-briefcase', 'bi bi-card-checklist', 'bi bi-bar-chart');
            $color = array('#f57813', '#15a04a', '#d90769');

            function limit_words($string, $word_limit)
            {
                $words = explode(" ", $string);
                $words = str_replace("<p>", " ", $words);
                $words = str_replace("</p>", " ", $words);
                return implode(" ", array_splice($words, 0, $word_limit));
            }
            ?>
            <div class="row gy-5">
                <?php foreach ($instrumen as $ins) : ?>
                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon flex-shrink-0"><i class="<?= $icon[rand(0, 2)]; ?>" style="color: <?= $color[rand(0, 2)]; ?>;"></i></div>
                        <div>
                            <h4 class="title"><a href="<?=base_url()?>/<?= $locale ?>/home/instrument-detail<?php echo $ins['action_detail']; ?>" class="stretched-link"><?= $ins['nama_instrument']; ?></a></h4>
                            <p class="description"><?= limit_words($ins['deskripsi_instrument'], 10); ?>...</p>
                            <a href="<?= $locale ?>/home/instrument-detail<?php echo $ins['action_detail']; ?>" class="btn btn-info text-white">Get Started</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

    

</main><!-- End #main -->


<?= $this->endSection(); ?>

<?= $this->section("js_page"); ?>

<?= $this->endSection(); ?>