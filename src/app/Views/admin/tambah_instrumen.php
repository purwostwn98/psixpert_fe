<?= $this->extend("/template/back_layout.php"); ?>
<?= $this->section("konten"); ?>
<?php $locale = service('request')->getLocale();?>
<div class="page-content container bg-white">
    <div class="page-header border-0 justify-content-between">
        <h1 class="page-title text-primary-d2">
            Form Add New Instrument
        </h1>
    </div>
    <hr class="my-4">
    <!-- stat boxes -->
    <div style="font-size: 14px;" class="row">
        <div class="col-12">
            <form method="POST" action="">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Instrument Name</label>
                    </div>

                    <div class="col-sm-9">
                        <input name="nama_instrument" required type="text" class="form-control col-sm-8 col-md-6" id="id-form-field-1">
                    </div>
                </div>
                <hr class="my-2">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Instrument Description</label>
                    </div>

                    <div class="col-sm-9">
                        <textarea id="summernote" name="deskripsi_instrument" required class="form-control" placeholder="" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 62px;"></textarea>
                    </div>
                </div>
                <hr class="my-2">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Number of Answer Option</label>
                    </div>

                    <div class="col-sm-9">
                        <select required class="form-control col-sm-8 col-md-6 jumlah_option" id="form-field-select-1">
                            <option value=""></option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                        </select>
                    </div>
                </div>
                <div class="form_label_value">

                </div>
                <hr class="my-2">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Result Ranges</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="id-form-field-1" class="mb-0">Low</label>
                    </div>

                    <div class="col-sm-3">
                        <input required type="number" name="result_range_low_min" class="form-control col-md-12" id="id-form-field-1" placeholder="Lower limit">
                    </div>
                    <div class="col-sm-3">
                        <input required type="number" name="result_range_low_max" class="form-control col-md-12" id="id-form-field-1" placeholder="Upper limit">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="id-form-field-1" class="mb-0">Medium</label>
                    </div>

                    <div class="col-sm-3">
                        <input required type="number" name="result_range_medium_min" class="form-control col-md-12" id="id-form-field-1" placeholder="Lower limit">
                    </div>
                    <div class="col-sm-3">
                        <input required type="number" name="result_range_medium_max" class="form-control col-md-12" id="id-form-field-1" placeholder="Upper limit">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="id-form-field-1" class="mb-0">High</label>
                    </div>

                    <div class="col-sm-3">
                        <input required type="number" name="result_range_high_min" class="form-control col-md-12" id="id-form-field-1" placeholder="Lower limit">
                    </div>
                    <div class="col-sm-3">
                        <input required type="number" name="result_range_high_max" class="form-control col-md-12" id="id-form-field-1" placeholder="Upper limit">
                    </div>
                </div>
                <hr class="my-2">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label style="font-weight: bold;" for="id-form-field-1" class="mb-0">Result Description</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="id-form-field-1" class="mb-0">Low</label>
                    </div>

                    <div class="col-sm-9">
                        <textarea required name="result_description_low" class="form-control" id="id-textarea-autosize" placeholder="" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 62px;"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="id-form-field-1" class="mb-0">Medium</label>
                    </div>

                    <div class="col-sm-9">
                        <textarea required name="result_description_medium" class="form-control" id="id-textarea-autosize" placeholder="" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 62px;"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="id-form-field-1" class="mb-0">High</label>
                    </div>

                    <div class="col-sm-9">
                        <textarea required name="result_description_high" class="form-control" id="id-textarea-autosize" placeholder="" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 62px;"></textarea>
                    </div>
                </div>
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
    $('.jumlah_option').change(function(e) {
        e.preventDefault();
        var jumlah = $('.jumlah_option').val();
        $.ajax({
            url: "<?= site_url('/id/dinamis/form-answer-option'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                jumlah: jumlah
            },
            success: function(response) {
                // console.log(response);
                $('.form_label_value').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
</script>
<?= $this->endSection(); ?>