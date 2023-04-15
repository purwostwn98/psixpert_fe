<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale();?>
<div class="page-content container bg-white">
    <div class="page-header border-0 justify-content-between">
        <h1 class="page-title text-primary-d2">
            Researcher Request
        </h1>
    </div>
    <hr class="my-3">
    <!-- stat boxes -->
    <div class="row">
        <div class="col-12 tabel-pertanyaan">
            <table id="datatable" class="table table-border-y text-dark-m2 text-95 border-y-1 ">
                <thead class="text-secondary-m2 text-uppercase text-85">
                    <tr>
                        <th>No</th>
                        <th style="max-width: 500px;">Email</th>
                        <th style="max-width: 500px;">Name</th>
                        <th style="max-width: 500px;">Institusi</th>
                        <th style="max-width: 500px;">Keperluan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_user as $key => $value): ?>
                        
                        <tr class="d-style ">
                            <td class="pos-rel">
                                <?=$key+1?>
                            </td>
                            <td>
                                <span class="text-105"><?=$value->email?></span>
                            </td>
                            <td>
                                <span class="text-105"><?=$value->nama_lengkap?></span>
                            </td>
                            <td>
                                <span class="text-105"><?=$value->lembaga?></span>
                            </td>
                            <td>
                                <span class="text-105"><textarea style="background-color: white;" readonly disabled name="" id="" cols="40" rows="5"><?=$value->keperluan?></textarea></span>
                            </td>
                            
                            <td>
                                <a onclick="Edit('<?=$value->email?>', '<?=$value->nama_lengkap?>', '<?=$value->action_detail?>')"  data-toggle="modal" data-target="#editModal" href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal edit user -->
<style>
    .modal-lg {
        max-width: 55%;
    }
</style>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Researcher Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="">
                <input type="hidden" name="user" id="user_edit">
                <input type="hidden" name="level_user" value="peneliti" id="user_edit">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Email</label>
                    </div>

                    <div class="col-sm-9">
                        <input readonly name="email" id="email" value="" required type="text" class="form-control col-sm-8 col-md-10" id="id-form-field-1">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Full Name</label>
                    </div>

                    <div class="col-sm-9">
                        <input readonly name="nama_lengkap" id="nama_lengkap" value="" required type="text" class="form-control col-sm-8 col-md-10" id="id-form-field-1">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Researcher Request</label>
                    </div>

                    <div class="col-sm-9">
                        <select name="status" required class="form-control col-sm-8 col-md-6 jumlah_option" id="level_user">
                            <option disabled selected value=""></option>
                            <option value=1>accepted</option>
                            <option value='rejected'>rejected</option>
                        </select>
                    </div>
                </div>
                <div class="my-2 border-t-1 brc-grey-l1 bgc-grey-l3 py-3">
                    <div class="offset-md-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="fa fa-check mr-1"></i>
                            Save
                        </button>

                        <button class="btn btn-secondary ml-3" type="reset">
                            <i class="fa fa-undo mr-1"></i>
                            Reset
                        </button>
                    </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
<!-- end modal edit user -->

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script>
    function Edit( email, nama_lengkap, user){
        $('#email').val(email)
        $('#nama_lengkap').val(nama_lengkap)
        $('#user_edit').val(user)
    }
</script>
<?= $this->endSection(); ?>