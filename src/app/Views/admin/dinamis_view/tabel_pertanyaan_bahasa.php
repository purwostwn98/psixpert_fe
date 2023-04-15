<?php if ($bahasa == 'in') { ?>
    <table id="example" class="display" style="width:100%; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th style="max-width: 500px;">Question</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Secara seksual, saya lebih tertarik memperhatikan penampilan lawan jenis dibandingkan penampilan sesama jenis</td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                    <a href="#" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash text-white"></i></a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ketika berada di dekat orang sejenis (laki-laki dekat dengan laki-laki, perempuan dekat dengan perempuan) yang wajahnya cakep (tampan/cantik) jantung saya terasa berdetak lebih kencang</td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                    <a href="#" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash text-white"></i></a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ketika berjabat tangan dengan orang sejenis yang wajahnya cakep, saya memegang tangannya lebih erat</td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                    <a href="#" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash text-white"></i></a>
                </td>
            </tr>
            <tr>
                <td>etc</td>
                <td>etc..</td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                    <a href="#" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash text-white"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
<?php } else { ?>
    <table id="example" class="display" style="width:100%; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th style="max-width: 500px;">Question</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Sexually, I am more interested in the appearance of the opposite sex than the appearance of the same sex</td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                    <a href="#" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash text-white"></i></a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>When I'm near a person of the same kind (men are close to men, women are close to women) whose faces are handsome (handsome/beautiful) my heart beats faster</td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                    <a href="#" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash text-white"></i></a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>When shaking hands with someone of the same kind with a pretty face, I hold his hand tighter</td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                    <a href="#" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash text-white"></i></a>
                </td>
            </tr>
            <tr>
                <td>etc</td>
                <td>etc..</td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit text-white"></i></a>
                    <a href="#" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash text-white"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
<?php } ?>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>