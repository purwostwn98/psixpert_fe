<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale();?>
<div class="page-content container bg-white">
    <div class="page-header border-0 ">
        <h1 class="page-title text-primary-d2">
            Survey
        </h1>
    </div>
    <hr class="my-3">
    <!-- stat boxes -->
    <div class="row">
        <div class="col-12">
            <table id="datatable" class="table table-border-y text-dark-m2 text-95 border-y-1 brc-secondary-l1">
                <thead class="text-secondary-m2 text-uppercase text-85">
                    <tr>
                        <th>No</th>
                        <th>Kode Survey</th>
                        <th>Instrument</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Number of Respondents</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_survei as $key => $value):?> 
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$value->code_survei?></td>
                            <td><?=$value->instrument?></td>
                            <td>
                                <?php
                                $time = strtotime($value->start_date);
                                echo date('d-m-Y',$time);    
                                ?>
                            </td>
                            <td>
                                <?php
                                $time = strtotime($value->end_date);
                                echo date('d-m-Y',$time);    
                                ?>
                            </td>
                            <td><?=$value->jumlah_respondent?></td>
                            <td>
                                <button id="copy_btn" onclick="copyLink('<?=base_url()?>/<?=$value->language?>/survey/<?=$value->code_survei?>')" type='button' class="btn btn-xs btn-primary"><i class="fa fa-copy text-110 mr-1"></i> Link</button>
                                <a onclick="Edit('<?=$value->code_survei?>', '<?=$value->start_date?>', '<?=$value->end_date?>', '<?=$value->action_edit?>', '<?=$value->language?>')" data-toggle="modal" data-target="#editSurveiModal" href="#" class="btn btn-xs btn-warning text-white">Edit</a>
                                <a href="/id/peneliti/daftar-responden-survei<?=$value->action_respondent?>" class="btn btn-xs btn-info text-white">Respondents</a>
                                <a onclick="Delete('<?= $value->code_survei ?>')" data-toggle="modal" data-target="#dangerModal" href="#" class="btn btn-xs btn-danger text-white">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- modal delete -->
<div class="modal fade" data-backdrop-bg="bgc-white" id="dangerModal" tabindex="-1" role="dialog" aria-labelledby="dangerModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content bgc-transparent brc-danger-m2 shadow">

            <div class="modal-header py-2 bgc-danger-tp1 border-0  radius-t-1">
                <h5 class="modal-title text-white-tp1 text-110 pl-2 font-bolder" id="dangerModalLabel">WARNING!</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body bgc-white-tp2 p-md-4 pl-md-5">

                <div class="d-flex align-items-top mr-2 mr-md-5">
                    <i class="fas fa-exclamation-triangle fa-2x text-warning-d2 float-rigt mr-4 mt-1"></i>
                    <div class="text-muted text-105">
                        are you sure you want to delete this survey?

                        <div class="mt-2 d-none" id="id-danger-yes-input">
                            <div class="mb-1 text-grey-m2 text-90">Type YES to continue</div>
                            <input type="text" class="form-control form-control-sm brc-danger text-danger-m2" autocomplete="off">
                        </div>

                    </div>
                </div>
            </div>
            <form action="<?=base_url('/id/peneliti/delete-survey')?>" method="post">
                <input type="hidden" name="code_survei" id="id_code_survei">
            <div class="modal-footer bgc-white-tp2 border-0">
                <button type="button" class="btn btn-md btn-wide btn-light-grey" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-md btn-danger" id="id-danger-yes-btn" >Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal delete -->


<!-- modal edit survei -->
<div class="modal modal-lg fade" id="editSurveiModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-width-0 border-t-4 brc-warning-m2 px-3">

            <div class="modal-header py-2">
                <!-- <i class="fa-regular fa-calendar-pen"></i> -->
                <i class="bgc-white fas fa-exclamation-circle mb-n4 mx-auto fa-3x text-warning-m2"></i>
            </div>

            <div class="modal-body text-center">
                <p class="text-warning-d1 text-130 mt-3">
                    Edit range date survey
                </p>
            </div>

            <form action="" method="post">
                <input type="hidden" value="" id="edit_endpoint" name="edit_endpoint">
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="id-form-field-1" class="mb-0">Date Range</label>
                </div>

                <div class="col-sm-7">
                    <div style="min-width: 455px;" id="id-daterange-wrapper" class="pos-rel">
                        <div class="form-row">
                            <div class="col">
                                <input readonly required id="id-daterange-from" name="start_date" class="form-control ex-inputs-start" placeholder="From date">
                            </div>
                            <div class="text-grey-l2">_</div>
                            <div class="col">
                                <input type="date" required id="id-daterange-to" name="end_date" class="form-control ex-inputs-end" placeholder="To date">
                            </div>
                        </div>

                        <div id="id-daterange-container" class="dp-daterange-picker dp-daterange-above"></div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="id-form-field-1" class="mb-0">Survey link</label>
                </div>

                <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span style="min-width: 366px;" id="link_survei" class="input-group-text">https://assessme.puslogin.com/survei/</span>
                            <button id="copy_btn" onclick="copyLink()" type='button' class="btn btn-primary"><i class="fa fa-copy text-110 mr-1"></i> Copy</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-white justify-content-between px-0 py-3">
                <button type="button" class="btn btn-md px-2 px-md-4 btn-light-secondary btn-h-light-warning btn-a-light-danger" data-dismiss="modal">
                    <i class="fas fa-undo-alt mr-1 text-danger-m2"></i>
                    Cancel
                </button>

                <button type="submit" class="btn btn-md px-2 px-md-4 btn-light-secondary btn-h-light-success btn-a-light-success">
                    Save
                    <i class="fa fa-arrow-right ml-1 text-success-m2"></i>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal edit survei -->

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script>
    function Edit(code_survei, start_date, end_date, edit_endpoint, language){
        const link_survei = `<?=base_url()?>/${language}/survey/${code_survei}`
        $('#link_survei').text(link_survei)
        let startDate = new Date(start_date);
        $('#id-daterange-from').val(`${startDate.getDate()}/${startDate.getMonth()+1}/${startDate.getFullYear()}`)
        $('#id-daterange-to').val(end_date)
        $('#edit_endpoint').val(edit_endpoint)
        $('#copy_btn').attr('onClick',`copyLink('${link_survei}')`)

    }

    function copyLink(link) {
        navigator.clipboard.writeText(link);
        toastr.info('Link survey copied')
    }

    function Delete(code_survei){
        $('#id_code_survei').val(code_survei)
    }
</script>

<?= $this->endSection(); ?>
