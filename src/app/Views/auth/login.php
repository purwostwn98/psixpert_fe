<?= $this->extend("/template/front_layout.php"); ?>
<?= $this->section("konten"); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h2 data-aos="fade-up">Login</h2>
                <blockquote data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body">
                        <?= form_open("/auth/cek_user", ['class' => 'form_login']); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="a" value="<?= $a; ?>">
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
                        <?= form_close(); ?>
                    </div>
                    <div class="card-footer mt-5">
                        <div class="d-flex justify-content-center links">
                            Don't have an account? &nbsp;&nbsp;
                            <a href="#"> Sign Up</a>
                        </div>
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