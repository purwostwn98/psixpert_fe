<?php for ($i = 0; $i < $jumlah; $i++) { ?>
    <div class="form-group row">
        <div class="col-sm-3 col-form-label text-sm-right pr-0">
            <label for="id-form-field-1" class="mb-0">Option <?= $i + 1; ?></label>
        </div>

        <div class="col-sm-6">
            <input type="text" name="judul_pilihan_<?= $i + 1; ?>" class="form-control col-md-12" id="id-form-field-1" placeholder="Label">
        </div>
        <div class="col-sm-3">
            <input type="number" name="bobot_pilihan_<?= $i + 1; ?>" class="form-control col-md-12" id="id-form-field-1" placeholder="Value">
        </div>
    </div>
<?php } ?>