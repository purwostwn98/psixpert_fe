<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php
$session = \Config\Services::session();
$locale = service('request')->getLocale();
?>
<div class="page-content container bg-white">
    <div class="page-header border-0 justify-content-between">
        <h1 class="page-title text-primary-d2">
            Choose Instrument
        </h1>
    </div>
    <hr class="my-4">
    <!-- stat boxes -->
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table table-border-y text-dark-m2 text-95 border-y-1 brc-secondary-l1">
                <thead class="text-secondary-m2 text-uppercase text-85">
                    <tr>
                        <th>No</th>
                        <th>Instrument Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value): ?> 
                    <tr>
                        <td><?=$value->no?></td>
                        <td><?=$value->nama_instrument?></td>
                        <td>
                            <a href="<?=base_url($locale)?>/peneliti/detail-instrumen<?=$value->action_open_detail?>&language=id" class="btn btn-xs btn-info text-white">Open Details</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
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