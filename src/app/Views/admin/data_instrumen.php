<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale();?>
<div class="page-content container bg-white">
    <div class="page-header border-0 justify-content-between">
        <h1 class="page-title text-primary-d2">
            Data Instrument
        </h1>
        <a href="<?=$locale?>/admin/form-tambah-instrumen" class="btn btn-xs btn-primary"><i class="fa fa-plus text-110 align-text-bottom mr-1"></i> | Add Instrument</a>
    </div>
    <hr class="my-1">
    <!-- stat boxes -->
    <div class="row">
        <div class="col-12">
            <div class="mt-4 mx-md-2 border-t-1 brc-secondary-l1">
                <div class="table-responsive-md">
                    <table id="datatable" class="table table-border-y text-dark-m2 text-95 border-y-1 brc-secondary-l1">
                        <thead class="text-secondary-m2 text-uppercase text-85">
                            <tr>
                                <th class="border-0 bgc-h-default-l3 text-strong">No</th>
                                <th class="border-0 bgc-h-default-l3">Instrument Name</th>
                                <th class="border-0 bgc-h-default-l3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_instrument as $key => $value):?>
                                <tr class="d-style bgc-h-default-l4">
                                    <td class="pos-rel">
                                        <?=$key+1?>
                                    </td>
                                    <td>
                                        <span class="text-105"><?=$value->nama_instrument?></span>
                                    </td>
                                    <td>
                                        <a href="<?=base_url($locale)?>/admin/detail-instrumen<?=$value->action_detail?>" class="btn btn-xs btn-info text-white">Detail</a>
                                        <a href="<?=base_url($locale)?>/admin/data-pertanyaan<?=$value->action_open_question?>&language=id" class="btn btn-xs btn-secondary text-white">Open Question</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<?= $this->endSection(); ?>