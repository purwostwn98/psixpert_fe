<?= $this->extend("/template/front_layout.php"); ?>
<?= $this->section("konten"); ?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:500);

    .google-btn {
        width: 195px;
        height: 42px;
        background-color: #4285f4;
        border-radius: 2px;
        box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.25);
    }

    .google-btn .google-icon-wrapper {
        position: absolute;
        margin-top: 1px;
        margin-left: 1px;
        width: 40px;
        height: 40px;
        border-radius: 2px;
        background-color: #fff;
    }

    .google-btn .google-icon {
        position: absolute;
        margin-top: 7px;
        margin-left: 7px;
        width: 25px;
        height: 25px;
    }

    .google-btn .btn-text {
        float: right;
        margin: 11px 11px 0 0;
        color: #fff;
        font-size: 14px;
        letter-spacing: 0.2px;
        font-family: "Roboto";
    }

    .google-btn:hover {
        box-shadow: 0 0 6px #4285f4;
    }

    .google-btn:active {
        background: #1669F2;
    }
</style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h2 data-aos="fade-up">Login</h2>
                <blockquote data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body">
                        <!-- <h5 data-aos="fade-up">Silakan login dulu ya</h5> -->
                        <div class="google-btn">
                            <a href="<?=$google_auth_url?>">
                                <div class="google-icon-wrapper">
                                    <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                </div>
                                <p class="btn-text"><b>Login with google</b></p>
                            </a>
                        </div>
                        <br>
                        <!-- <div class="google-btn">
                            <div class="google-icon-wrapper">
                                <img class="google-icon" src="https://www.ums.ac.id/wp-content/uploads/2021/12/Resmi_Logo_UMS_Color-150x150.png" />
                            </div>
                            <p class="btn-text"><b>Login with sso ums</b></p>

                        </div> -->

                        <!-- <?= form_open("/auth/cek_user", ['class' => 'form_login']); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="a" value="<?//= $a; ?>">
                        <div class="input-group form-group">
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text"><i class="bi bi-person-square"></i></span>
                            </div>
                            <input style="border-radius: 10px; margin-left: 5px" type="text" class="form-control" placeholder="Email" name="username" required>
                        </div>
                        <div class="input-group form-group mt-4">
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            </div>
                            <input style="border-radius: 10px; margin-left: 5px" type="password" class="form-control" placeholder="password" name="password" required>
                        </div>
                        <div class="form-group mt-3 justify-content-center">
                            <input type="submit" value="Login" class="btn float-center login_btn">
                        </div>
                        <?= form_close(); ?> -->
                    </div>
                    <div class="card-footer mt-5">
                        <!-- <div class="d-flex justify-content-center links">
                            Don't have an account? &nbsp;&nbsp;
                            <a href="#"> Sign Up</a>
                        </div> -->
                        <!-- <div class="d-flex justify-content-center">
                            <a href="#">Forgot your password?</a>
                        </div> -->
                    </div>
                </blockquote>
            </div>
        </div>
    </div>
</section><!-- End Hero Section -->
<script type="text/javascript">
    $('.form_login').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btndaftar').prop('disabled', true);
                $('.btndaftar').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btndaftar').prop('disabled', false);
                $('.btndaftar').html('<span class="icon text-white-50"> <i class="fas fa-check"></i> </span> Simpan');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nik) {
                        $('.error_username').html('<i>' + response.error.nik + '</i>');
                    }
                    if (response.error.nama_pemohon) {
                        $('.error_password').html('<i>' + response.error.nama_pemohon + '</i>');
                    }
                    $("input[name='csrf_test_name']").val(response.error.token);
                }

                if (response.berhasil) {
                    // Swal.fire({
                    //     title: 'Berhasil',
                    //     text: response.berhasil.pesan,
                    //     icon: 'success',
                    //     confirmButtonText: 'Ok'
                    // }).then((result) => {
                    //     if (result.isConfirmed) {
                    //         window.location = response.berhasil.link;
                    //     }
                    // });
                    window.location = response.berhasil.link;
                }
                if (response.gagal) {
                    // Swal.fire({
                    //     title: 'Gagal',
                    //     text: response.gagal.pesan,
                    //     icon: 'error',
                    //     confirmButtonText: 'Ok'
                    // });
                    window.location = response.gagal.link;
                }

                if (response.terdaftar) {
                    window.location = response.terdaftar.link_form_ajuan;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

        return false;
    });
</script>

<?= $this->endSection(); ?>