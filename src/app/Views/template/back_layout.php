<!doctype html>
<html lang="en">
<?php

use Google\Service\Analytics\Resource\Data;

$session = \Config\Services::session();
$locale = service('request')->getLocale();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <base href="<?= base_url(); ?>" />

    <title>Ini.expert | Psychology UMS</title>

    <!-- include common vendor stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/node_modules/bootstrap/dist/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/node_modules/@fortawesome/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/node_modules/@fortawesome/fontawesome-free/css/regular.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/node_modules/@fortawesome/fontawesome-free/css/brands.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/node_modules/@fortawesome/fontawesome-free/css/solid.css">

    <!-- include vendor stylesheets used in "DataTables" page. see "application/views/default/pages/partials/table-datatables/@vendor-stylesheets.hbs" -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.css">
    <!-- include vendor stylesheets used in "Dashboard 2" page. see "application/views/default/pages/partials/dashboard-2/@vendor-stylesheets.hbs" -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/dist/css/ace-font.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/dist/css/ace.css">
    <link rel="icon" type="image/png" href="<?= base_url('belakang/assets/image/InI.expert (Icon Blue).png') ?>" />
    <!-- "Dashboard 2" page styles specific to this page for demo purposes -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/belakang/dist/css/ace-themes.css">
    <!-- data table js -->

    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/chart.js/dist/Chart.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/sortablejs/Sortable.js"></script>

    <!-- script for datatabel -->
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables.net-colreorder/js/dataTables.colReorder.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables.net-select/js/dataTables.select.js"></script>


    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables.net-buttons/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables.net-buttons/js/buttons.html5.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables.net-buttons/js/buttons.print.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/datatables.net-buttons/js/buttons.colVis.js"></script>

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

    <!-- css for date range -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/belakang/node_modules/tiny-date-picker/tiny-date-picker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/belakang/node_modules/tiny-date-picker/date-range-picker.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/belakang/node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css">


    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/belakang/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css">
    <!-- end css  -->

    <!-- Script for wysiwyg -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/belakang/node_modules/summernote/dist/summernote-lite.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/belakang/node_modules/bootstrap-markdown/css/bootstrap-markdown.min.css">

    <script type="text/javascript" src="<?= base_url() ?>/belakang/node_modules/summernote/dist/summernote-lite.js"></script>


</head>

<body>
    <div class="body-container">
        <div class="main-container content-bg1">

            <div id="sidebar" class="sidebar sidebar-white sidebar-fixed sidebar-backdrop expandable d-none d-xl-block" data-swipe="true" data-dismiss="true">
                <div class="sidebar-inner">

                    <!-- .navbar-brand inside sidebar, only show in desktop view -->
                    <!-- <div class="d-none d-xl-flex sidebar-section-item m-0 fadeable-left fadeable-top">
                        <div class="fadeinable">
                            <div class="py-2 mx-1 border-b-1 brc-secondary-l1" id="sidebar-header-brand1">
                                <a class="navbar-brand text-140">
                                    <img src="<?= base_url(); ?>/belakang/assets/image/kembang.png" style="max-height: 40px;" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="fadeable w-100 ">
                            <div class="py-2 text-center mx-3 border-b-1 brc-secondary-l1" id="sidebar-header-brand2">

                                <a class="navbar-brand ml-n2 text-140 text-grey-d2" href="#">
                                    <img src="<?= base_url(); ?>/belakang/assets/image/kembang.png" style="max-height: 40px;" alt="">
                                    Lazismu <span>UMS</span>
                                </a>

                            </div>
                        </div>
                    </div> -->
                    <!-- /.sidebar-section-item  -->


                    <div class="pt-2 flex-grow-1 ace-scroll" ace-scroll>
                        <div class="sidebar-section-item mx-0  fadeable-left fadeable-top">
                            <div class="fadeinable">
                                <img src="<?= base_url('belakang/assets/image/InI.expert (Icon Blue).png') ?>" style="max-width: 40px;" class="p-2px border-2 brc-primary-tp2 radius-round" />
                            </div>

                            <div class="fadeable hideable">

                                <div class="py-2 d-flex flex-column align-items-center">
                                    <div>
                                        <img src="<?= base_url('belakang/assets/image/InI.expert (Icon Blue).png') ?>" style="max-height: 53px;" class="p-2px pb-2" />
                                    </div>

                                    <div class="text-center mt-1" id="id-user-info">
                                        <a href="<?= base_url('/') ?>" class="d-style pos-rel collapsed text-blue accordion-toggle no-underline bgc-h-primary-l2 px-1 py-2px">
                                            <span class="text-95 font-bolder">Ini.expert</span>
                                        </a>
                                        <div class="text-muted text-80">Universitas Muhammadiyah Surakarta</div>
                                    </div><!-- /#id-user-info -->

                                    <div class="collapse" id="id-user-menu">
                                        <div class="mt-3">
                                            <a href="#" class="btn bgc-blue-l2 btn-brc-white btn-h-outline-blue radius-round py-2 px-1 text-center border-2 shadow-sm">
                                                <i class="fa fa-envelope w-4 text-110 text-blue-m1"></i>
                                            </a>

                                            <a href="#" class="btn bgc-purple-l2 btn-brc-white btn-h-outline-purple radius-round py-2 px-1 text-center border-2 shadow-sm">
                                                <i class="fa fa-users w-4 text-110 text-purple-m1"></i>
                                            </a>

                                            <a href="#" class="btn bgc-warning-l2 btn-brc-white btn-h-outline-warning radius-round py-2 px-1 text-center border-2  shadow-sm">
                                                <i class="fa fa-star w-4 text-110 text-orange-m1"></i>
                                            </a>
                                        </div>
                                    </div><!-- /.collapse -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php if ($session->get('level_user') == 'admin') { ?>
                            <div class="nav nav-parent flex-column mt-2 has-active-border" role="navigation" aria-label="Main">
                                <li class="nav-item">
                                    <a href="<?= base_url($locale) ?>/admin" class="nav-link">
                                        <i class="nav-icon 	fa fa-desktop"></i>
                                        <span class="nav-text fadeable">
                                            <span>Dashboard</span>
                                        </span>
                                    </a>
                                    <b class="sub-arrow"></b>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url($locale) ?>/admin/daftar-responden" class="nav-link">
                                        <i class="nav-icon 	fa fa-book"></i>
                                        <span class="nav-text fadeable">
                                            <span>Data Respondent</span>
                                        </span>
                                    </a>
                                    <b class="sub-arrow"></b>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url($locale) ?>/admin/data-instrumen" class="nav-link">
                                        <i class="nav-icon 	fa fa-archive" aria-hidden="true"></i>
                                        <span class="nav-text fadeable">
                                            <span>Data Instrument</span>
                                        </span>
                                    </a>
                                    <b class="sub-arrow"></b>
                                </li>
                                <li class="nav-item active open">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon 	fa fa-users" aria-hidden="true"></i>
                                        <span class="nav-text fadeable">
                                            <span>User Management</span>
                                        </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>

                                    <div class="hideable submenu collapse show">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="<?= base_url($locale) ?>/admin/manajemen-user" class="nav-link">
                                                    <span class="nav-text">
                                                        <span>Users</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="<?= base_url($locale) ?>/admin/list-req-peneliti" class="nav-link">
                                                    <span class="nav-text">
                                                        <span>Researcher Request</span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <b class="sub-arrow"></b>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?= base_url($locale) ?>/admin/manajemen-user" class="nav-link">
                                        <i class="nav-icon 	fa fa-users" aria-hidden="true"></i>
                                        <span class="nav-text fadeable">
                                            <span>User Management</span>
                                        </span>
                                    </a>
                                    <b class="sub-arrow"></b>
                                </li> -->
                            </div>
                        <?php } else { ?>
                            <div class="nav nav-parent flex-column mt-2 has-active-border" role="navigation" aria-label="Main">
                                <li class="nav-item">
                                    <a href="<?= base_url($locale) ?>/peneliti" class="nav-link">
                                        <i class="nav-icon 	fa fa-desktop"></i>
                                        <span class="nav-text fadeable">
                                            <span>Dashboard</span>
                                        </span>
                                    </a>
                                    <b class="sub-arrow"></b>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url($locale) ?>/peneliti/pilih-instrumen" class="nav-link">
                                        <i class="nav-icon 	fa fa-book"></i>
                                        <span class="nav-text fadeable">
                                            <span>Create Survey</span>
                                        </span>
                                    </a>
                                    <b class="sub-arrow"></b>
                                </li>
                            </div>
                        <?php } ?>

                    </div>

                </div>
            </div>

            <div role="main" class="main-content">
                <nav class="navbar navbar-sm navbar-expand-lg navbar-fixed navbar-white">
                    <div class="navbar-inner">

                        <div class="justify-content-xl-between d-flex h-100 align-items-center">

                            <button type="button" class="btn text-grey-m2 btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none" data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                                <span class="bars"></span>
                            </button>

                            <a class="navbar-brand d-xl-none mx-1 text-grey-d3 text-130" href="#">
                                <img src="<?= base_url('belakang/assets/image/InI.expert (Icon Blue).png') ?>" style="max-height: 50px;" class="p-2px pb-2" />
                            </a>

                            <button type="button" class="btn text-grey-m2 btn-burger align-self-center mx-2 d-none d-xl-flex btn-h-light-primary" data-toggle="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
                                <span class="bars"></span>
                            </button>

                        </div>


                        <!-- .navbar-menu togger -->
                        <button class="navbar-toggler ml-1 mr-2 px-1" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu">
                            <img class="mx-0 radius-round border-2 brc-primary-tp3 p-1px" src="https://www.ums.ac.id/wp-content/uploads/2021/12/Resmi_Logo_UMS_Color.png" width="36" alt="Jason's Photo">
                        </button>


                        <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">
                            <div class="navbar-nav">
                                <!-- <div class="dropdown dd-backdrop dd-backdrop-none-md">
                                    <button type="button" id="id-nav-post-btn" class="btn btn-outline-primary btn-bold btn-sm mx-2 px-2 px-lg-3 radius-round dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-plus mr-lg-1"></i>
                                        <span class="d-none d-lg-inline">Language</span>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right dropdown-animated brc-primary-m3 radius-2 py-0 dd-slide-up dd-slide-none-md">
                                        <div class="dropdown-inner">
                                            <div class="dropdown-header d-md-none">Choose post type:</div>
                                            <a class="dropdown-item btn btn-outline-grey btn-h-outline-primary btn-a-outline-primary" href="#">
                                                <i class="fa fa-circle text-primary-m3 text-75 mr-1"></i>
                                                Indonesia
                                            </a>

                                            <a class="dropdown-item btn btn-outline-grey btn-h-outline-success btn-a-outline-success" href="#">
                                                <i class="fa fa-circle text-success-m3 text-75 mr-1"></i>
                                                English
                                            </a>
                                        </div>
                                    </div>
                                </div> -->

                                <ul class="nav has-active-border">
                                    <li class="nav-item dropdown dropdown-mega">
                                        <a class="nav-link dropdown-toggle mr-1px" href="#" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-list-alt mr-2 d-lg-none"></i>
                                            <?= $session->get('nama_user'); ?>
                                            <i class="caret fa fa-angle-down d-none d-lg-block"></i>
                                            <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                                        </a>
                                        <div style="width: 13rem;" class="shadow dropdown-menu dropdown-animated dropdown-sm p-0 brc-primary-m3 border-1 border-b-2 bgc-white">
                                            <div class="tab-content tab-sliding p-0">
                                                <div class="tab-pane mh-none show active px-md-1 pt-1" id="navbar-notif-tab-1" role="tabpanel">
                                                    <!-- <a href="/admin/edit_profil" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                                        <i class="fa fa-users bgc-blue-tp1 text-white text-110 mr-1 p-2 radius-1"></i>
                                                        <span class="text-muted">Edit Profil</span>
                                                    </a> -->
                                                    <a href="<?= base_url($locale) ?>/auth/logout" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                                        <i class="fa fa-times bgc-pink-tp1 text-white text-110 mr-1 p-2 radius-1"></i>
                                                        <span class="text-muted">Logout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- This is CONTENT -->
                <?= $this->renderSection("konten"); ?>

                <footer class="footer d-none d-sm-block">
                    <div class="footer-inner">
                        <div class="h-100 pt-3 border-none border-t-1 brc-default-l1 bgc-white-tp1">
                            <span class="text-primary-m2 font-bolder text-120">Ini.expert </span>
                            <span class="text-muted">Psikologi Universitas Muhammadiyah Surakarta &copy;<?= Date('Y') ?></span>
                        </div>
                    </div><!-- .footer-inner -->
                </footer>

                <div class="footer-tools">
                    <a id="btn-scroll-up" href="#" class="btn-scroll-up btn btn-white brc-black-tp7 btn-smd border-2 radius-round mb-2 mr-2">
                        <i class="fa fa-angle-double-up w-2 h-2"></i>
                    </a>
                </div>
            </div><!-- /main -->


        </div><!-- /.main-container -->


        <!-- include common vendor scripts used in demo pages -->
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/popper.js/dist/umd/popper.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/bootstrap/dist/js/bootstrap.js"></script>


        <!-- include vendor scripts used in "Dashboard 2" page. see "application/views/default/pages/partials/dashboard-2/@vendor-scripts.hbs" -->
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/chart.js/dist/Chart.js"></script>


        <!-- include Ace script -->
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/dist/js/ace.js"></script>


        <script type="text/javascript" src="<?= base_url(); ?>/belakang/assets/js/demo.js"></script>
        <!-- this is only for Ace's demo and you don't need it -->

        <!-- "Dashboard 2" page script to enable its demo functionality -->
        <!-- <script type="text/javascript" src="<?= base_url(); ?>/belakang/application/views/default/pages/partials/dashboard-2/@page-script.js"></script> -->

        <!-- include vendor scripts used in "DataTables" page. see "application/views/default/pages/partials/table-datatables/@vendor-scripts.hbs" -->
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables.net-colreorder/js/dataTables.colReorder.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables.net-select/js/dataTables.select.js"></script>


        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables.net-buttons/js/dataTables.buttons.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables.net-buttons/js/buttons.html5.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables.net-buttons/js/buttons.print.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/datatables.net-buttons/js/buttons.colVis.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- "DataTables" page script to enable its demo functionality -->
        <!-- <script type="text/javascript" src="<?= base_url(); ?>/belakang/application/views/default/pages/partials/table-datatables/@page-script2.js"></script> -->
        <!-- <script type="text/javascript" src="<? //= base_url(); 
                                                    ?>/belakang/application/views/default/pages/partials/table-datatables/@page-script.js"></script> -->
        <!-- Form Element -->
        <!-- <script type="text/javascript" src="<?= base_url(); ?>/belakang/application/views/default/pages/partials/form-elements/@page-script.js"></script> -->
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/autosize/dist/autosize.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/bootstrap-maxlength/bootstrap-maxlength.js"></script>


        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/tiny-date-picker/dist/date-range-picker.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/moment/moment.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>


        <script type="text/javascript" src="<?= base_url(); ?>/belakang/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
        <!-- <script type="text/javascript" src="<?= base_url(); ?>/belakang/application/views/default/pages/partials/form-elements/@page-script.js"></script> -->

    </div><!-- /.body-container -->
</body>

</html>

<script>
    //add background color to sidebar icons
    //should be done in your HTML rather than in Javascript ... but this is just demo
    var bgcColors = ['bgc-primary-tp1', 'bgc-warning-tp1', 'bgc-success-tp1', 'bgc-purple-tp1', 'bgc-danger-tp1', 'bgc-info-tp1', 'bgc-pink-tp1', 'bgc-secondary-tp1', 'bgc-brown-tp1'];

    $('.nav > .nav-item > .nav-link > .nav-icon').addClass('nav-icon-round').each(function(a, b) {
        this.classList.add(bgcColors[a]); //.addClass( 'icon-glossy' );
    });

    $('.nav-item-caption').remove();
</script>

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

<script>
    //cek aktif link sidebar
    $('.nav-parent').each(function() {
        const navItem = $(this);
        const li = navItem.find("li")
        const location_url = location.href
        li.each(function() {
            const liItem = $(this)
            const url = liItem.find("a").attr("href")

            if (url == location_url) {
                liItem.addClass('active');
            } else {
                if (url == '#') {
                    $('.submenu').each(function() {
                        const subMenu = $(this)
                        const subLi = subMenu.find("li")
                        subLi.each(function() {
                            liSubItem = $(this)
                            const urlSubItem = liSubItem.find("a").attr("href")
                            if (urlSubItem == location_url) {
                                liItem.addClass('active open');
                                subMenu.addClass("show");
                                liSubItem.addClass("active");
                            }
                        })

                    })
                }
            }

        });
    })
    //end cek aktif link sidebar
</script>

<?= $this->renderSection("js_page"); ?>