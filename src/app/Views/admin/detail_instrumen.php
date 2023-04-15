<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale();?>
<div class="page-content container bg-white">
    <div class="page-header border-0 justify-content-between">
        <a href="<?=$locale?>/admin/data-instrumen" class="btn btn-xs btn-secondary"><i class="fa fa-arrow-left text-110 align-text-bottom mr-1"></i> | Back</a>

        <h1 class="page-title text-primary-d2">
            Instrumen <?=ucwords($detail_instrument->nama_instrument)?>
        </h1>
       
        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit text-110 align-text-bottom mr-1"></i> | Edit Instrument</button>
    </div>
    <!-- stat boxes -->
    <div class="row">
        <div class="col-12">
            <table style="font-size: 13px;" id="simple-table" class="table table-bordered-x table-hover text-dark-m2">
                <tbody>
                    <tr class="bgc-h-default-l3 d-style">
                        <td style="font-weight: bold;">
                            Name
                        </td>
                        <td><?=$detail_instrument->nama_instrument?></td>
                    </tr>
                    <tr class="bgc-h-default-l3 d-style">
                        <td style="font-weight: bold;">
                            Description
                        </td>
                        <td><?=$detail_instrument->deskripsi_instrument?></td>
                    </tr>
                    <tr class="bgc-h-default-l3 d-style">
                        <td style="font-weight: bold;">
                            Answer Option
                        </td>
                        <td>
                            <?php $count_option=0 ?>
                            <?php foreach ($detail_instrument->data_pilihan as $key => $value): ?>
                                <?=ucfirst($value->judul_pilihan)?> (<?=$value->bobot_pilihan?>) <br>
                                <?php $count_option +=1 ?>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr class="bgc-h-default-l3 d-style">
                        <td style="font-weight: bold;">
                            Scale Range
                        </td>
                        <td>
                            <?php foreach ($detail_instrument->scale_range as $key => $value): ?>
                                <?=ucfirst($value->type)?> (<?=$value->low?> - <?=$value->upper?>) <br>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr class="bgc-h-default-l3 d-style">
                        <td style="font-weight: bold;">
                            Result Description
                        </td>
                        <td>
                            <?php foreach ($detail_instrument->result_description as $key => $value): ?>
                                <strong><?=ucfirst($value->type)?> </strong><br>
                                <?=$value->deskripsi?>
                                <br>
                                <br>
                            <?php endforeach ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .modal-lg {
        max-width: 85%;
    }
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Instrument</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Instrument Name</label>
                    </div>

                    <div class="col-sm-9">
                        <input name="nama_instrument" value="<?=$detail_instrument->nama_instrument?>" required type="text" class="form-control col-sm-8 col-md-6" id="id-form-field-1">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Instrument Description</label>
                    </div>

                    <div class="col-sm-8">
                        <textarea id="summernote" name="deskripsi_instrument" required class="form-control" id="id-textarea-autosize" placeholder="" style=""><?=$detail_instrument->deskripsi_instrument?></textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Number of Answer Option</label>
                    </div>

                    <div class="col-sm-9">
                        <select required class="form-control col-sm-8 col-md-6 jumlah_option" id="option_answer">
                            <option value=""></option>
                            <?php if ($count_option == 3):?> 
                                <option selected value='3'>3</option>
                                <option value='4'>4</option>
                            <?php else: ?>
                                <option value='3'>3</option>
                                <option selected value='4'>4</option>
                            <?php endif ?>
                        </select>
                    </div>
                </div>
                <div class="form_label_value">
                    <?php foreach ($detail_instrument->data_pilihan as $key => $value): ?>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label for="id-form-field-1" class="mb-0">Option <?=$key+1?> </label>
                            </div>
        
                            <div class="col-sm-5">
                                <input type="text" value="<?=ucfirst($value->judul_pilihan)?>" name="judul_pilihan_<?=$key+1?>" class="form-control col-md-12" id="id-form-field-1" placeholder="Label">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" value="<?=$value->bobot_pilihan?>"  name="bobot_pilihan_<?=$key+1?>" class="form-control col-md-12" id="id-form-field-1" placeholder="Value">
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Result Ranges</label>
                    </div>
                </div>
                <?php foreach ($detail_instrument->scale_range as $key => $value): ?>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label for="id-form-field-1" class="mb-0"><?=ucfirst($value->type)?> </label>
                        </div>

                        <div class="col-sm-3">
                            <input required value="<?=$value->low?>" type="number" name="result_range_<?=$value->type?>_min" class="form-control col-md-12" id="id-form-field-1" placeholder="Lower limit">
                        </div>
                        <div class="col-sm-3">
                            <input required value="<?=$value->upper?>" type="number" name="result_range_<?=$value->type?>_max" class="form-control col-md-12" id="id-form-field-1" placeholder="Upper limit">
                        </div>
                    </div>
                <?php endforeach ?>
                
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Result Description</label>
                    </div>
                </div>
                <?php foreach ($detail_instrument->result_description as $key => $value): ?>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label for="id-form-field-1" class="mb-0"><?=ucfirst($value->type)?></label>
                        </div>

                        <div class="col-sm-8">
                            <textarea required name="result_description_<?=$value->type?>" class="form-control" id="id-textarea-autosize" placeholder="" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 62px;"><?=$value->deskripsi?></textarea>
                        </div>
                    </div>
                <?php endforeach ?>
                
                <div class="my-2 border-t-1 brc-grey-l1 bgc-grey-l3 py-3">
                    <div class="offset-md-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="fa fa-check mr-1"></i>
                            Submit
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


<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    jQuery(function($) {

        //update icons
        $.extend($.summernote.options.icons, {
            'align': 'fa fa-align',
            'alignCenter': 'fa fa-align-center',
            'alignJustify': 'fa fa-align-justify',
            'alignLeft': 'fa fa-align-left',
            'alignRight': 'fa fa-align-right',
            'indent': 'fa fa-indent',
            'outdent': 'fa fa-outdent',
            'arrowsAlt': 'fa fa-arrows-alt',
            'bold': 'fa fa-bold',
            'caret': 'fa fa-caret-down text-grey-m3 ml-1',
            'circle': 'fa fa-circle',
            'close': 'fa fa fa-close',
            'code': 'fa fa-code',
            'eraser': 'fa fa-eraser',
            'font': 'fa fa-font',
            'italic': 'fa fa-italic',
            'link': 'fa fa-link text-success-m1',
            'unlink': 'fas fa-unlink',
            'magic': 'fa fa-magic text-brown-m3',
            'menuCheck': 'fa fa-check',
            'minus': 'fa fa-minus',
            'orderedlist': 'fa fa-list-ol text-blue',
            'pencil': 'fa fa-pencil',
            'picture': 'far fa-image text-purple',
            'question': 'fa fa-question',
            'redo': 'fa fa-repeat',
            'square': 'fa fa-square',
            'strikethrough': 'fa fa-strikethrough',
            'subscript': 'fa fa-subscript',
            'superscript': 'fa fa-superscript',
            'table': 'fa fa-table text-danger-m2',
            'textHeight': 'fa fa-text-height',
            'trash': 'fa fa-trash',
            'underline': 'fa fa-underline',
            'undo': 'fa fa-undo',
            'unorderedlist': 'fa fa-list-ul text-blue',
            'video': 'far fa-file-video text-pink-m2'
        });

        $('#summernote').summernote({
            height: 250,
            minHeight: 150,
            maxHeight: 400
        });


        //lightweight wysiwyg editor
        $('#bootstrap-editor').aceWysiwyg({
            toolbarStyle: 2,
            toolbar: [
                'font',
                null,
                'fontSize',
                null,
                'bold',
                'italic',
                null,
                'insertunorderedlist',
                'insertorderedlist',
                null,
                'createLink',
                'unlink',
                null,
                'insertImage',
                null,
                'foreColor',
                'backColor',
                null,
                'undo',
                'redo',
                null,
                'viewSource'
            ],


            //toolbarPlacement: function(toolbarHtml) {
            //return $(toolbarHtml).appendTo('.card-header.bgc-success-tp2')
            //}
        });



        //markdown editor
        $('#markdown-editor').markdown({
            iconlibrary: 'fa'
        }).each(function() {
            $(this).parent().find('.btn')
                .addClass('btn-xs bg-white btn-outline-secondary btn-h-outline-info btn-a-outline-info')
                .removeClass('btn-default');

            $(this).parent().find('.btn[title~="Heading"] > .fa').attr('class', 'fas fa-heading');
            $(this).parent().find('.btn[title~="Image"] > .fa').attr('class', 'far fa-image');

            $(this).parent().find('.md-control-fullscreen > .fa , .exit-fullscreen > .fa').addClass('text-orange-m1 text-110');
        });


    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });


    $('#option_answer').on('change', function() {
        $('.form_label_value').html('');
        let html = ''
        for (let index = 0; index < this.value; index++) {
            const element = `<div class="form-group row">
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label for="id-form-field-1" class="mb-0">Option ${index+1} </label>
                            </div>
        
                            <div class="col-sm-5">
                                <input type="text" name="judul_pilihan_${index+1}" class="form-control col-md-12" id="id-form-field-1" placeholder="Label">
                            </div>
                            <div class="col-sm-3">
                                <input type="number"  name="bobot_pilihan_${index+1}" class="form-control col-md-12" id="id-form-field-1" placeholder="Value">
                            </div>
                        </div>`;

            html += element;
        }
        $('.form_label_value').html(html);

    });
</script>
<?= $this->endSection(); ?>