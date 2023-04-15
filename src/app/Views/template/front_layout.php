<?php

$locale = service('request')->getLocale();
$session = \Config\Services::session();
?>
<!DOCTYPE html>
<html lang="<?= $locale ?>">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= lang('Landing.title') ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('belakang/assets/image/InI.expert (Icon Blue).png') ?>" rel="icon">
    <link href="<?= base_url(); ?>/depan/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/depan/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/depan/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/depan/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/depan/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/depan/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/depan/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>/depan/assets/css/login.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/depan/assets/css/main.css" rel="stylesheet">
    <!-- <link href="<?= base_url(); ?>/depan/assets/scss/option.scss" rel="stylesheet"> -->

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/depan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <!-- =======================================================
  * Template Name: Nova - v1.2.0
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        .step.finish {
            background-color: #04AA6D;
        }

        .opt_input input[type="radio"] {
            display: none;
        }

        .opt_input label {
            position: relative;
            color: #1b2f45;
            font-family: "Montserrat", sans-serif;
            border: 2px solid #1b2f45;
            border-radius: 20px;
            padding: 20px 10px;
            display: flex;
            align-items: center;
            min-width: 200px;
            text-align: center;
        }

        .opt_input input[type="radio"]:checked+label {
            background-color: #1b2f45;
            color: white;
            font-weight: bold;
            border: 4px solid orange;
        }

        .btn-buatanku {
            font-family: var(--font-default);
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 12px 40px;
            border-radius: 50px;
            transition: 0.5s;
            margin: 10px;
            color: #fff;
            background: #2aa5df;
        }

        .small-text {
            font-size: 13px;
            font-style: italic;
            color: #2aa5df;
            margin-top: 0px;
            padding-top: 0px;
        }

        @media only screen and (max-width: 700px) {
            .paling_atas {
                margin-top: 20px;
            }
        }

        .btn-select {
            color: #000000;
            border: 1px solid #CED4DA;
            border-radius: 0;
            box-shadow: none;
            font-size: 14px;
            padding: 12px 15px;
        }
    </style>

    <!-- css and js for toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        toastr.options = {
            "debug": false,
            "positionClass": "toast-top-center",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="page-index">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="<?= base_url($locale) ?>" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="<?= base_url(); ?>/depan/image/logo.png" alt="">
                <!-- <h1 class="d-flex align-items-center">InI.expert</h1> -->
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="<?= base_url($locale) ?>#hero" class="active"><?= lang('Landing.home') ?></a></li>
                    <li><a href="<?= base_url($locale) ?>#about-us"><?= lang('Landing.about') ?></a></li>
                    <li><a href="<?= base_url($locale) ?>#our-services"><?= lang('Landing.services') ?></a></li>
                    <li><a href="<?= base_url($locale) ?>#instrument-list"><?= lang('Landing.instruments') ?></a></li>
                    <li><a href="<?= base_url($locale) ?>#contact"><?= lang('Landing.contact') ?></a></li>
                    <?php if ($session->get('login') == true) : ?>
                        <li><a href="<?= base_url($locale) ?>/home/riwayat-netizen"><?= lang('Landing.my_account') ?></a></li>
                    <?php endif ?>
                    <?php if ($session->get('level_user') == 'admin') : ?>
                        <li><a href="<?= base_url($locale) ?>/admin">Dashboard Admin</a></li>
                    <?php endif ?>
                    <?php //print_r($session->get()) 
                    ?>
                    <?php if ($session->get('level_user') == 'peneliti') : ?>
                        <li><a href="<?= base_url($locale) ?>/peneliti">Dashboard Peneliti</a></li>
                    <?php endif ?>
                    <?php
                    $session = \Config\Services::session();
                    if ($session->get('login') == true) :
                    ?>
                        <li><a href="<?= base_url($locale) ?>/auth/logout">Sign Out</a></li>
                    <?php else : ?>
                        <li><a href="<?= base_url($locale) ?>/auth/login"><?= lang('Landing.sign_in') ?></a></li>
                    <?php endif ?>

                    <li id="toggle-language" class="dropdown">
                        <a id="a_dropdown" href="#">
                            <img src="<?= base_url(); ?>/depan/assets/img/favicon.png" alt="" srcset="">
                            &nbsp;<span>Indonesia</span> <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li><a href="#"> <span class="option-lang"><img src="<?= base_url(); ?>/depan/image/in.gif" style="margin-right:5px" alt="" srcset="">Indonesia</span></a></li>
                            <li><a href="#"> <span class="option-lang"><img src="<?= base_url(); ?>/depan/image/en.gif" style="margin-right:5px" alt="" srcset="">English</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <?= $this->renderSection("konten"); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-2 col-6 footer-links text-center text-md-start">
                        <img style="max-width: 130px;" src="<?= base_url(); ?>/depan/image/Resmi_Logo_UMS_Color.png" alt="">
                    </div>
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span>Fakultas Psikologi</span>
                        </a>
                        <p>
                            Universitas Muhammadiyah Surakarta
                            <br>
                            Gedung Psikologi Kampus 2 – Pabelan
                            Jl. A Yani, Pabelan, Kartasura, Surakarta 57162, Jawa Tengah – Indonesia
                        </p>
                        <div class="social-links d-flex  mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>


                    <div class="col-lg-2 col-6 footer-links">
                        <h4><?= lang('Landing.title_service') ?></h4>
                        <ul>
                            <li><i class="bi bi-dash"></i> <a href="#"><?= lang('Landing.title_assessment') ?></a></li>
                            <li><i class="bi bi-dash"></i> <a href="#"><?= lang('Landing.title_research') ?></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4><?= lang('Landing.contact_us') ?></h4>
                        <p>
                            <strong>Phone:</strong> +62 271-717417 ext. 3404<br>
                            <strong>Email:</strong> psikologi@ums.ac.id<br>
                        </p>


                    </div>

                </div>
            </div>
        </div>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <div id="contact" class="footer-legal">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Puslogin UMS</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <div id="modal_profile" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 style="
                        color: #1f98d1;
                        font-weight: 700;
                        font-size: 25px;
                        font-family: Montserrat, sans-serif;" class="info-item modal-title w-100">
                        <?= lang('Landing.title_update_profile') ?>
                    </h5>
                </div>
                <div class="modal-body">
                    <div id="contact" class="contact">
                        <div class="container position-relative" data-aos="fade-up">

                            <div class="row gy-4 d-flex justify-content-end">

                                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="250">

                                    <form action="<?= base_url("$locale/auth/update-profile-user") ?>" method="POST" class="php-email-form">
                                        <div class="row">
                                            <div class="col-md-6 form-group ">
                                                <input type="text" class="form-control" name="nama_lengkap" value="<?= ucwords(strtolower($session->get('nama_user'))) ?>" id="name" placeholder="Your Name" required>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                <input type="email" class="form-control" readonly disabled value="<?= $session->get('email') ?>" id="email" placeholder="Your Email" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group mt-3">
                                                <select required style="
                                                    border-radius: 0;
                                                    box-shadow: none;
                                                    font-size: 14px;
                                                    padding: 12px 15px;" class="form-control" name="jenis_kelamin" id="">
                                                    <option selected disabled value=""><?= lang('Landing.gender') ?></option>
                                                    <option value="<?= lang('Landing.male') ?>"><?= lang('Landing.male') ?></option>
                                                    <option value="<?= lang('Landing.female') ?>"><?= lang('Landing.female') ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-3">
                                                <input onfocus="(this.type='date')" type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="<?= lang('Landing.date_of_birth') ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group mt-3">
                                                <select required style="
                                                    border-radius: 0;
                                                    box-shadow: none;
                                                    font-size: 14px;
                                                    padding: 12px 15px;" class="form-control" name="agama" id="">
                                                    <option selected disabled value=""><?= lang('Landing.agama') ?></option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen"><?= lang('Landing.kristen') ?></option>
                                                    <option value="Katolik"><?= lang('Landing.katolik') ?></option>
                                                    <option value="Hindu"><?= lang('Landing.hindu') ?></option>
                                                    <option value="Buddha"><?= lang('Landing.buddha') ?></option>
                                                    <option value="Khonghucu"><?= lang('Landing.khonghucu') ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-3">
                                                <select required style="
                                                    border-radius: 0;
                                                    box-shadow: none;
                                                    font-size: 14px;
                                                    padding: 12px 15px;" class="form-control" name="status_pernikahan" id="">
                                                    <option selected disabled value=""><?= lang('Landing.status_pernikahan') ?></option>
                                                    <option value="Menikah"><?= lang('Landing.menikah') ?></option>
                                                    <option value="Belum menikah"><?= lang('Landing.belum_menikah') ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <select required style="
                                                    border-radius: 0;
                                                    box-shadow: none;
                                                    font-size: 14px;
                                                    padding: 12px 15px;" class="form-control" name="instansi" id="instansi">
                                                <option selected disabled value=""><?= lang('Landing.instansi') ?></option>
                                                <option value="Akademik"><?= lang('Landing.akademik') ?></option>
                                                <option value="Non-akademik"><?= lang('Landing.non_akademik') ?></option>
                                            </select>
                                        </div>
                                        <span id="span_akademik">

                                        </span>

                                        <div class="form-group mt-3">
                                            <select class="my-select form-control" data-live-search="true" data-style="btn-select" name="negara" data-size="5" id="negara">
                                                <option selected disabled value=""><?= lang('Landing.country') ?></option>
                                                <?php
                                                $data_negara = ""
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <span id="span_provinsi">

                                            </span>
                                        </div>

                                        <div class="form-group mt-3">
                                            <span id="span_kota">
                                            </span>
                                        </div>


                                        <div class="text-center" style="
                                            margin-top: 50px;
                                        "><button type="submit"><?= lang('Landing.btn_update_profile') ?></button></div>
                                    </form>
                                </div><!-- End Contact Form -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_peneliti" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 style="
                        color: #1f98d1;
                        font-weight: 700;
                        font-size: 25px;
                        font-family: Montserrat, sans-serif;" class="info-item modal-title w-100">
                        <?= lang('Landing.title_formulir_peneliti') ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="contact" class="contact">
                        <div class="container position-relative" data-aos="fade-up">

                            <div class="row gy-4 d-flex justify-content-end">

                                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="250">

                                    <form action="<?= base_url("$locale/formulir-peneliti") ?>" method="POST" class="php-email-form">
                                        <div class="row">
                                            <div class="col-md-6 form-group ">
                                                <input type="text" class="form-control" readonly disabled value="<?= $session->get('nama_user') ?>" id="name" placeholder="Your Name" required>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                <input type="email" class="form-control" readonly disabled value="<?= $session->get('email') ?>" id="email" placeholder="Your Email" required>
                                            </div>
                                        </div>


                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" name="lembaga" id="lembaga" value="<?= $session->get('akademik') ?>" placeholder="<?= lang('Landing.agency') ?>" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea class="form-control" name="keperluan" id="keperluan" rows="7" placeholder="<?= lang('Landing.keperluan') ?>" required></textarea>

                                        </div>
                                        <h6>Note:</h6>
                                        <?php if ($locale == 'en') :  ?>
                                            <p>Registration requests may take a while, please check your email periodically for notifications.</p>
                                        <?php else : ?>
                                            <p>Permintaan register memerlukan waktu beberapa saat, silahkan cek email anda secara berkala untuk mendapat pemberitahuan.</p>
                                        <?php endif ?>


                                        <div class="text-center" style="
                                            margin-top: 50px;
                                        "><button type="submit"><?= lang('Landing.btn_update_profile') ?></button></div>
                                    </form>

                                </div><!-- End Contact Form -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>/depan/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url(); ?>/depan/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>/depan/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>/depan/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>/depan/assets/js/main.js"></script>


</body>

</html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<?php if ($session->getFlashData('success')) : ?>
    <script type="text/javascript">
        toastr.success('<?= $session->getFlashData('success') ?>')
    </script>
<?php endif ?>
<?php if ($session->getFlashData('error')) : ?>
    <script type="text/javascript">
        toastr.error('<?= $session->getFlashData('error') ?>')
    </script>
<?php endif ?>

<?php if ($session->getFlashData('swal_success')) : ?>
    <script>
        Swal.fire({
            title: 'Success!',
            html: '<?= lang('Landing.pesan_peneliti') ?>',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#1F98D1'
        })
    </script>
<?php endif ?>



<script>
    function formulirPeneliti() {
        const isLogin = `<?= $session->get('login') ?>`
        if (isLogin) {
            $.ajax({
                url: "<?php echo base_url() . '/' . $locale . '/status-peneliti' ?>",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.data.status_peneliti) {
                        if (`<?= $locale ?>` == 'en') {
                            toastr.info('You have filled out the form!')

                        } else {
                            toastr.info('Anda sudah mengisi formulir!')

                        }

                    } else {
                        $('#modal_peneliti').modal('show')
                    }
                }

            });
        } else {
            if (`<?= $locale ?>` == 'en') {
                toastr.error('You have to login first!')

            } else {
                toastr.error('Anda harus login terlebih dahulu!')

            }
        }
    }
</script>

<?php if (isset($data_user)) : ?>
    <?php if ($data_user != false) : ?>
        <?php if ($data_user->data->jenis_kelamin == '' || $data_user->data->tanggal_lahir == '' || $data_user->data->negara == '' || $data_user->data->provinsi == '') : ?>

            <script>
                // init data negara
                $.ajax({
                    url: "https://laravel-world.com/api/countries",
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const select_negara = $('#negara')
                        $.each(response.data, function(index, value) {
                            var opt = document.createElement('option');
                            opt.value = value.name;
                            opt.innerHTML = value.name;
                            select_negara.append(opt);
                        });
                        $("#negara").selectpicker("refresh");
                    }

                });

                function capitalizeFirstLetter(string) {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }

                $(window).on('load', function() {
                    $('#modal_profile').modal('show');
                    $('#negara').selectpicker();
                    // $('#provinsi').selectpicker();

                });

                Object.defineProperty(String.prototype, 'capitalize', {
                    value: function() {
                        return this.charAt(0).toUpperCase() + this.slice(1);
                    },
                    enumerable: false
                });
                $('#negara').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
                    const selected = $(this).val()
                    if (selected == 'Indonesia') {
                        $('#span_provinsi').html(`<select                                                
                        class="my-select form-control"
                        data-live-search="true"
                        data-style="btn-select"
                        name="provinsi"
                        data-size="5"
                        id="provinsi" >
                        <option selected disabled value=""><?= lang('Landing.province') ?></option>
                        
                    </select>`)
                        $('#provinsi').selectpicker();



                        $.ajax({
                            url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                const select_provinsi = $('#provinsi')
                                $.each(response, function(index, value) {
                                    select_provinsi.append(`<option data-idprov=${value.id} value="${capitalizeFirstLetter(value.name.toLowerCase())}">${capitalizeFirstLetter(value.name.toLowerCase())}</option>`);
                                });
                                $("#provinsi").selectpicker("refresh");

                                $('#span_kota').html(`<select                                                
                                    class="my-select form-control"
                                    data-live-search="true"
                                    data-style="btn-select"
                                    name="kota"
                                    data-size="5"
                                    id="kota" >
                                    <option selected disabled value="">Kota</option>
                                    
                                </select>`)
                                $('#kota').selectpicker();

                                $('#provinsi').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {

                                    const selected = $(this).find(':selected').data('idprov')
                                    $.ajax({
                                        url: `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selected}.json`,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(response) {
                                            const select_kota = $('#kota')
                                            $.each(response, function(index, value) {
                                                var opt = document.createElement('option');
                                                opt.value = capitalizeFirstLetter(value.name.toLowerCase())
                                                opt.innerHTML = capitalizeFirstLetter(value.name.toLowerCase())
                                                select_kota.append(opt);
                                            });
                                            $("#kota").selectpicker("refresh");
                                        }

                                    });
                                });
                            }

                        });
                    } else {
                        $('#span_provinsi').html(`<input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="<?= lang('Landing.province') ?>" required>`)
                        $('#span_kota').html(`<input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" required>`)
                    }
                });





                $('#instansi').on('change', function() {
                    if (this.value == 'Akademik') {
                        $('#span_akademik').
                        html(`<div class="form-group mt-3">
                            <input type="text" class="form-control" name="akademik" id="akademik" placeholder="Nama akademik" required>
                        </div>`)

                    } else {
                        $('#span_akademik').html(``)
                    }
                });
            </script>
        <?php endif ?>
    <?php endif ?>
<?php endif ?>

<script>
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>
<script>
    const lang_url = `<?= $locale ?>`
    const id = `<a href="#">
                        <img src="<?= base_url(); ?>/depan/image/in.gif" alt="" srcset=""> 
                        &nbsp;<span>Indonesia</span> <i class="bi bi-chevron-down dropdown-indicator"></i>
                    </a>
                    <ul>
                        <li><a href="#"> <span class="option-lang"><img src="<?= base_url(); ?>/depan/image/in.gif" style="margin-right:5px" alt="" srcset="">Indonesia</span></a></li>
                        <li><a href="#"> <span class="option-lang"><img src="<?= base_url(); ?>/depan/image/en.gif" style="margin-right:5px" alt="" srcset="">English</span></a></li>
                    </ul>`

    const en = `<a href="#">
                    <img src="<?= base_url(); ?>/depan/image/en.gif" alt="" srcset=""> 
                    &nbsp;<span>English</span> <i class="bi bi-chevron-down dropdown-indicator"></i>
                </a>
                <ul>
                    <li><a href="#"> <span class="option-lang"><img src="<?= base_url(); ?>/depan/image/in.gif" style="margin-right:5px" alt="" srcset="">Indonesia</span></a></li>
                    <li><a href="#"> <span class="option-lang"><img src="<?= base_url(); ?>/depan/image/en.gif" style="margin-right:5px" alt="" srcset="">English</span></a></li>
                </ul>`

    document.cookie = `language=${lang_url}`;

    if (lang_url == 'en') {
        $('#toggle-language').html(en)

    } else {
        $('#toggle-language').html(id)

    }


    $('#toggle-language').on('click', function(e) {
        e.preventDefault();
        const language_option = $(e.target)
        if (language_option[0].className == "option-lang") {
            const language = ($(e.target).text() == 'Indonesia') ? 'id' : 'en'
            document.cookie = `language=${language}`;

            const url_reload = location.origin
            if (language == 'en') {
                window.location.href = `${url_reload}/en`
            } else if (language == 'id') {
                window.location.href = `${url_reload}/id`
            }
        }



    });
</script>

<?= $this->renderSection("js_page"); ?>