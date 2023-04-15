<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale(); ?>
<div class="page-content container bg-white">
    <div class="page-header border-0 justify-content-between row">
        <div class="col-lg-7">
            <h1 class="page-title text-primary-d2">
                Respondents
                <small class="page-info text-secondary-d2">
                    <i class="fa fa-angle-double-right text-80"></i>
                    <?= $data->nama_instrument ?>
                </small>
            </h1>
        </div>
        <div class="col-auto">
            <a href="<?= $locale ?>/admin/daftar-responden" class="btn btn-xs btn-secondary"><i class="fa fa-arrow-left text-110 align-text-bottom mr-1"></i> | Back</a>
            <a href="<?= $locale ?>/admin/export_excel?instrument=<?= $_GET['instrument'] ?>" class="btn btn-xs btn-success text-white"><i class="fa fa-file-excel text-110 align-text-bottom mr-1"></i> | Export Excel</a>
        </div>

    </div>
    <hr class="my-3">

    <!-- stat boxes -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-12 bg-white" style="font-size: 13px">
                    <div class="table-responsive-md">
                        <table id="datatable" class="table table-border-y text-dark-m2 text-95 border-y-1 brc-secondary-l1">
                            <thead class="text-secondary-m2 text-uppercase text-85">
                                <tr>
                                    <th class="border-0 bgc-h-default-l3">No.</th>
                                    <th class="border-0 bgc-h-default-l3">Taken on</th>
                                    <th class="border-0 bgc-h-default-l3">Name</th>
                                    <th class="border-0 bgc-h-default-l3">Scor</th>
                                    <th class="border-0 bgc-h-default-l3">Label</th>
                                    <th class="border-0 bgc-h-default-l3">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data->data_respondent as $key => $value) : ?>
                                    <tr class="d-style bgc-h-default-l4">
                                        <td>
                                            <span class="text-105"><?= $key + 1 ?></span>
                                        </td>
                                        <td>
                                            <span class="text-105"><?= $value->take_on ?></span>
                                        </td>
                                        <td>
                                            <span class="text-105"><?= $value->name ?></span>
                                        </td>
                                        <td>
                                            <span class="text-105"><?= $value->score ?></span>
                                        </td>
                                        <td>
                                            <span class="text-105"><?= $value->label ?></span>
                                        </td>
                                        <td>
                                            <a data-rel="tooltip" title="Lihat Detail" href="<?= base_url($locale) ?>/admin/detail-responden<?= $value->action_detail ?>"><i class="fa fa-eye text-blue-m1 text-120"></i> Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="<?= base_url(); ?>/application/views/default/pages/partials/table-datatables/@page-script.js"></script>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<?= $this->endSection(); ?>