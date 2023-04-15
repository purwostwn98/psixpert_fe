<?= $this->extend("/template/front_layout.php"); ?>
<?php
$locale = service('request')->getLocale();
$session = \Config\Services::session();
?>
<?= $this->section("konten"); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url(); ?>/depan/image/edutorium_ums.jpeg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h3 style="color: white;"><?= $data_instrument['nama_instrument']; ?></h3>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="services-list" class="services-list" style="padding-top: 40px;">
        <div class="container" id="section_container" data-aos="fade-up" style="text-align: justify;">
            <p>
                <?= $data_instrument['deskripsi_instrument']; ?>
            </p>
            <br>
            <p class="text-center"><button id="btn_take_survei" class="btn btn-buatanku">Take the Free Survey</button></p>
        </div>
    </section><!-- End Our Services Section -->



</main><!-- End #main -->


<?= $this->endSection(); ?>

<?= $this->section("js_page"); ?>
<?php if(isset($_GET['take_survey'])):?>
<script>
    var take_survey = `<?=$_GET['take_survey']?>`
    var url_callback = `<?=$session->get('url_callback')?>?quiz=1`
</script>
<?php else: ?>
<script>
    var take_survey = false
    var url_callback = false

</script>
<?php endif ?>
<script>
    console.log(take_survey ? 'link survie' : 'link biasa');
    console.log(url_callback)
    $('#btn_take_survei').on('click', function () {
        if (lang_url == 'en') {
            $('#section_container').html(`
            <h5> Questionnaire Filling Instructions</h5>
            <ol style="font-size: 18px;">
                <li>Questionnaire Filling Instructions </li>
                <li>Choose one of the alternative answers that you think fits your situation. <br>
                </li>
    
                <li>All alternative answers are not true/false as long as they suit your situation. </li>
                <li>You are expected to answer all statements to completion. Don't miss anything</li>
                <li>All of your answers are kept confidential.</li>
                <li>The seriousness of choosing an alternative answer that suits your situation will determine the validity of the measurement.</li>
            </ol>
            <br>
            <h5 class="text-center">After reading the brief description and instructions for filling out the questionnaire, I voluntarily and without any coercion fill out this questionnaire and agree to use the results for research purposes</h5>
            <br>
            <p class="text-center">
                <a style="min-width: 207px; background-color: #8dadbd;" href="/en" class="btn btn-buatanku">do not consent </a>
                <a style="min-width: 207px; background-color: #2aa5df;" href="${take_survey ? url_callback : '<?=base_url()?>/<?=$locale?>/home/quiz?instrument=<?= $id_instrument; ?>'}" class="btn btn-buatanku">consent</a>
            </p>
            `)

        }else{
            $('#section_container').html(`
            <h5> Petunjuk Pengisian Kuesioner</h5>
            <ol style="font-size: 18px;">
                <li>Di dalam skala ini akan disajikan sejumlah pernyataan, bacalah setiap pernyataan dengan cermat. </li>
                <li>Pilihlah salah satu alternatif jawaban yang menurut anda sesuai dengan keadaan anda. <br>
                </li>
    
                <li>Semua alternatif jawaban tidak bernilai benar/salah selama itu sesuai dengan keadaan diri anda . </li>
                <li>Anda diharapkan untuk menjawab semua pernyataan sampai dengan selesai. Jangan sampai ada yang terlewat</li>
                <li>Seluruh jawaban anda dijamin kerahasiaannya.</li>
                <li>Kesungguhan memilih alternatif jawaban yang sesuai dengan keadaan diri anda sangat menentukan validitas pengukuran.</li>
            </ol>
            <br>
            <h5 class="text-center">Setelah membaca deskripsi singkat dan petunjuk pengisian kuesioner, saya dengan sukarela dan tanpa paksaan apapun mengisi kuesioner ini serta menyetujui hasilnya digunakan untuk kepentingan penelitian</h5>
            <br>
            <p class="text-center">
                <a style="min-width: 207px; background-color: #8dadbd;" href="/id" class="btn btn-buatanku">Tidak bersedia</a>
                <a style="min-width: 207px; background-color: #2aa5df;" href="${take_survey ? url_callback : '<?=base_url()?>/<?=$locale?>/home/quiz?instrument=<?= $id_instrument; ?>'}" class="btn btn-buatanku">Bersedia</a>
            </p>
            `)
        }

    })
</script>
<?= $this->endSection(); ?>
<?php if(isset($data_user)): ?>
    <?php if( $data_user != false): ?>
        <?php if($data_user->data->jenis_kelamin == '' || $data_user->data->tanggal_lahir == '' || $data_user->data->negara == '' || $data_user->data->provinsi == ''): ?>

        <script>
            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

            $(window).on('load', function() {
                $('#modal_profile').modal('show');
                $('.my-select').selectpicker();
                $('#provinsi').selectpicker();

            });
            $('.my-select').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
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

                    Object.defineProperty(String.prototype, 'capitalize', {
                    value: function() {
                        return this.charAt(0).toUpperCase() + this.slice(1);
                    },
                    enumerable: false
                    });
                                        
                    $.ajax({
                        url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
                        type: 'GET',
                        dataType: 'json',
                        success: function( response ) {
                            const select_provinsi = $('#provinsi')
                            $.each(response, function(index, value) {
                                var opt = document.createElement('option');
                                opt.value = capitalizeFirstLetter(value.name.toLowerCase())
                                opt.innerHTML = capitalizeFirstLetter(value.name.toLowerCase())
                                select_provinsi.append(opt);
                            });
                            $("#provinsi").selectpicker("refresh");
                        }
        
                    });
                }else{
                    $('#span_provinsi').html(`<input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="<?= lang('Landing.province') ?>" required>`)
                }
            });

            $.ajax({
                // url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
                url: "https://laravel-world.com/api/countries",
                type: 'GET',
                dataType: 'json',
                success: function( response ) {
                    const select_negara = $('#negara')
                    $.each(response.data, function(index, value) {
                        var opt = document.createElement('option');
                        opt.value = value.name;
                        opt.innerHTML = value.name;
                        select_negara.append(opt);
                    });
                    $(".my-select").selectpicker("refresh");
                }

            });
            
        </script>
        <?php endif ?>
    <?php endif ?>
<?php endif ?>