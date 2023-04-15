<?= $this->extend("/template/front_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php

$locale = service('request')->getLocale();
?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('https://www.ums.ac.id/wp-content/uploads/2020/09/penelitian-fku-ums.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center">

      <h3 style="color: white;"><?=$nama_instrument?></h3>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Our Services Section ======= -->
  <section id="services-list" class="services-list" style="padding-top: 40px;">
    <div class="container" data-aos="fade-up">

      <!-- <form id="regForm" action="/home/hasil-survei"> -->
      <?php
      $request = \Config\Services::request();
      $code_survei = $request->uri->getSegment(3);
      ?>
      <form id="regForm" action="<?=base_url($locale)?>/home/simpan-survei?instrument=<?=$id_instrument?>&survei=<?=$code_survei?>" method="POST">
        <?php foreach ($pertanyaan as $z => $prt) : ?>
          <div id="bagian" class="tab huhu">
            <strong style="font-size: 22px;"><?= $prt['soal']; ?></strong>
            <div class="row gy-5 my-2">
              <div class="col-lg-3 col-md-6 d-flex paling_atas" data-aos="fade-up" data-aos-delay="100">
                <div class="opt_input">
                  <input class="form-check-input" type="radio" name="answer_<?= $prt['id_pertanyaan']; ?>" id="option_01_<?= $z; ?>" value="<?= $prt['bobot_pilihan_1']; ?>">
                  <label class="form-check-label" for="option_01_<?= $z; ?>">
                    <?= $prt['judul_pilihan_1']; ?>
                  </label>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 d-flex paling_atas" data-aos="fade-up" data-aos-delay="100">
                <div class="opt_input">
                  <input class="form-check-input" type="radio" name="answer_<?= $prt['id_pertanyaan']; ?>" id="option_02_<?= $z; ?>" value="<?= $prt['bobot_pilihan_2']; ?>">
                  <label class="form-check-label" for="option_02_<?= $z; ?>">
                    <?= $prt['judul_pilihan_2']; ?>
                  </label>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 service-item d-flex paling_atas" data-aos="fade-up" data-aos-delay="100">
                <div class="opt_input">
                  <input class="form-check-input" type="radio" name="answer_<?= $prt['id_pertanyaan']; ?>" id="option_03_<?= $z; ?>" value="<?= $prt['bobot_pilihan_3']; ?>">
                  <label class="form-check-label" for="option_03_<?= $z; ?>">
                    <?= $prt['judul_pilihan_3']; ?>
                  </label>
                </div>
              </div>
              <?php if ($jumlah_pilihan == 4) { ?>
                <div class="col-lg-3 col-md-6 service-item d-flex paling_atas" data-aos="fade-up" data-aos-delay="100">
                  <div class="opt_input">
                    <input class="form-check-input" type="radio" name="answer_<?= $prt['id_pertanyaan']; ?>" id="option_04_<?= $z; ?>" value="<?= $prt['bobot_pilihan_4']; ?>">
                    <label class="form-check-label" for="option_04_<?= $z; ?>">
                      <?= $prt['judul_pilihan_4']; ?>
                    </label>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="my-2">
              <hr class="mt-5">
            </div>
          </div>
        <?php endforeach; ?>
        <div id="peringatan" class="row" style="display: none;">
          <div class="col-12">
            <div class="alert alert-warning" role="alert">
            <?= lang('Landing.message_error_quiz') ?>instansi
instansiinstansi
instansi
            </div>
          </div>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-auto">
            <div class="d-flex">
              <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)"><span class='bi bi-box-arrow-left'></span> | <?= lang('Landing.previous') ?></button>
            </div>
          </div>
          <div class="col-auto">
            <div class="d-flex">
              <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)"><span class='bi bi-box-arrow-right'></span> | <?= lang('Landing.next') ?></button>
            </div>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <?php foreach ($pertanyaan as $prt) : ?>
            <span style="display: none;" class="step"></span>
          <?php endforeach; ?>
          <div class="progress">
            <div id="progress_bar" class="progress-bar" role="progressbar" style="width: 3%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
          </div>
        </div>
      </form>
  </section><!-- End Our Services Section -->


</main><!-- End #main -->
<script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("huhu");
    var numHuhu = $(".huhu").length;
    // var x = document.getElementsById("bagian");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    
    if (n == (numHuhu-1)) {
        //   document.getElementById("nextBtn").type = "submit";
        document.getElementById("nextBtn").innerHTML = "<span class='bi bi-box-arrow-right'></span> | Submit";
    } else {

      document.getElementById("nextBtn").innerHTML = "<span class='bi bi-box-arrow-right'></span> | <?= lang('Landing.next') ?>";
    }
    var persen = (n / x.length) * 100;
      var strPersen = Math.floor(persen).toString();
      // alert(Math.floor(persen));
      $('#progress_bar').attr("aria-valuenow", strPersen);
      $('#progress_bar').attr("style", "width:" + Math.floor(persen) + "%");
      document.getElementById("progress_bar").innerHTML = strPersen + "%";
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("huhu");
    console.log(x)
    // var x = document.getElementsById("bagian");
    
    var numHuhu = $(".huhu").length;
    console.log(numHuhu)
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    var newKey = currentTab -1
    console.log(newKey)
    // Increase or decrease the current tab by 1:
    console.log('currentTab', currentTab)
    // alert(x.length + currentTab);
    // if you have reached the end of the form... :
    if (currentTab == numHuhu) {
      document.getElementById("regForm").submit();
      return false;
        document.getElementById("nextBtn").innerHTML = "Submit";
        // document.getElementById("nextBtn").type = "submit";
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    $("#peringatan").css('display', 'block');
    var x, y, i, valid = false;
    x = document.getElementsByClassName("huhu");
    var numHuhu = $(".huhu").length;
    // var x = document.getElementsById("bagian");
    // w = x[currentTab].getElemen
    w = $('input[name="answer_' + currentTab + '"]').checked;
    // var a = $(`input[name="answer_${currentTab}"]`)
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
      // console.log(y[i].checked);
      if (y[i].checked == true) {
        valid = true;
        $("#peringatan").css('display', 'none');
      }

    }
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
  }
</script>
<?= $this->endSection(); ?>