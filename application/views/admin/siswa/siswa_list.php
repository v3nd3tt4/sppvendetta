<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Siswa
            <a href="<?php echo site_url('admin/siswa/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3><br>
        <span class="pull-right">
            <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-align-justify"></span></a>               
        </span>
    </h3>       

    <div>
        <?php echo form_open(current_url(), array('method' => 'get')) ?>
        <div class="row">                
            <div class="col-md-3">                 
                <input autofocus type="text" name="n" id="field" placeholder="Nama" class="form-control">            
            </div>                
            <input type="submit" class="btn btn-success" value="Cari">
        </div>
    </div>
<?php echo form_close() ?>
</div>
<?php echo validation_errors() ?>
<br>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="gradient">
            <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php				
        if (!empty($siswa)) {
            foreach ($siswa as $row) {
                ?>
                <tbody>
                    <tr>
                        <td ><?php echo $row['siswa_nis']; ?></td>
                        <td ><?php echo $row['siswa_nama']; ?></td>
                        <td ><?php echo pretty_date($row['siswa_tgl_lhr'], 'd F Y',false); ?></td>
                        <td ><?php echo ($row['siswa_status'] == 0)? 'Non-Aktif' : 'Aktif'; ?></td>
                        <td>
                            <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/siswa/detail/' . $row['siswa_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/siswa/edit/' . $row['siswa_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                            <?php if ($this->session->userdata('siswa_id') != $row['siswa_id']) { ?>
                            <a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/siswa/rpw/' . $row['siswa_id']); ?>" ><span class="glyphicon glyphicon-lock"></span> Reset Password</a>
                            <?php } else {
                                ?>
                                <a class = "btn btn-primary btn-xs" href = "<?php echo site_url('admin/profile/cpw/'); ?>" ><span class = "glyphicon glyphicon-repeat"></span> Ubah Password</a>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                }
            } else {
                ?>
                <tbody>
                    <tr id="row">
                        <td colspan="5" align="center">Data Kosong</td>
                    </tr>
                </tbody>
                <?php
            }
            ?>   
        </table>
    </div>
    <div >
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
</div>

<script>
    $(function() {

        var siswa_list = [
        <?php foreach ($siswas as $row): ?>
        {
                       
            "label": "<?php echo $row['siswa_nama'] ?>",
            "label_nik": "<?php echo $row['siswa_nis'] ?>"

        },
    <?php endforeach; ?>
    ];
    function custom_source(request, response) {
        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        response($.grep(siswa_list, function(value) {
            return matcher.test(value.label)
            || matcher.test(value.label_nik);
        }));
    }

    $("#field").autocomplete({
        source: custom_source,
        minLength: 1,
        select: function(event, ui) {
                // feed hidden id field                
                $("#field_id").val(ui.item.label_nik);  
                $("#field_name").val(ui.item.value);                

                // update number of returned rows
            },
            open: function(event, ui) {
                // update number of returned rows
                var len = $('.ui-autocomplete > li').length;
            },
            close: function(event, ui) {
                // update number of returned rows
            },
            // mustMatch implementation
            change: function(event, ui) {
                if (ui.item === null) {
                    $(this).val('');
                    $('#field_id').val('');
                }
            }
        });

        // mustMatch (no value) implementation
        $("#field").focusout(function() {
            if ($("#field").val() === '') {
                $('#field_id').val('');
            }
        });
    });
</script>