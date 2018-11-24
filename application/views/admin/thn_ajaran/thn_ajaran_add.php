<?php
$this->load->view('admin/tinymce_init');
$this->load->view('admin/datepicker');
if (isset($thn_ajaran)) {
    $id = $thn_ajaran['thn_ajaran_id'];
    $inputFullName = $thn_ajaran['thn_ajaran_ket'];
    $inputStatus = $thn_ajaran['thn_ajaran_status'];
} else {
    
    $inputFullName = set_value('thn_ajaran_ket');
    $inputStatus = set_value('thn_ajaran_status');
}
?>
<?php echo isset($alert) ? ' ' . $alert : null; ?>
<?php echo validation_errors(); ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="col-lg-12">
            <h3><?php echo $operation ?> Tahun Ajaran</h3>
            <br>
        </div>
        <!-- /.col-lg-12 -->

        <?php echo form_open_multipart(current_url()); ?>
        <div class="col-md-12">
            <div class="col-sm-12 col-md-9">
                <?php if (isset($thn_ajaran)): ?>
                    <input type="hidden" name="thn_ajaran_id" value="<?php echo $thn_ajaran['thn_ajaran_id'] ?>" />
                <?php endif; ?>     
                <label >Tahun Ajaran *</label>
                <input type="text" name="thn_ajaran_ket" placeholder="Contoh: 2015/2016" class="form-control" value="<?php echo $inputFullName; ?>"><br>
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Wajib diisi</i></p>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-3">
                <div class="form-group">
                    <label>Status *</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="thn_ajaran_status" value="0" <?php echo ($inputStatus == '0') ? 'checked' : ''; ?>> Non-Aktif
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="thn_ajaran_status" value="1" <?php echo ($inputStatus == '1') ? 'checked' : ''; ?>> Aktif
                        </label>
                    </div>
                    <hr>
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button><br>
                    <a href="<?php echo site_url('admin/thn_ajaran'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a><br>
                    <?php if (isset($thn_ajaran)): ?>
                        <?php if ($this->session->userdata('thn_ajaran_id') != $id) {
                            ?>
                            <a href="<?php echo site_url('admin/thn_ajaran/delete/' . $thn_ajaran['thn_ajaran_id']); ?>" class="btn btn-danger btn-form"><i class="fa fa-trash"></i> Hapus</a><br>
                            <?php } ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <?php if (isset($thn_ajaran)): ?>
                <!-- Delete Confirmation -->
                <div class="modal fade" id="confirm-del">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><b>Konfirmasi Penghapusan</b></h4>
                            </div>
                            <div class="modal-body">
                                <p>Data yang dipilih akan dihapus oleh sistem, apakah anda yakin?;</p>
                            </div>
                            <?php echo form_open('admin/thn_ajaran/delete/' . $thn_ajaran['thn_ajaran_id']); ?>
                            <div class="modal-footer">
                                <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                                <input type="hidden" name="del_id" value="<?php echo $thn_ajaran['thn_ajaran_id'] ?>" />
                                <input type="hidden" name="del_name" value="<?php echo $thn_ajaran['thn_ajaran_ket'] ?>" />
                                <button type="submit" class="btn btn-primary">Ya</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <?php if ($this->session->flashdata('delete')) { ?>
                    <script type = "text/javascript">
                        $(window).load(function() {
                            $('#confirm-del').modal('show');
                        });
                    </script>
                    <?php }
                    ?>
                <?php endif; ?>

                <script type="text/javascript">
                    function validate(evt) {
                      var theEvent = evt || window.event;
                      var key = theEvent.keyCode || theEvent.which;
                      key = String.fromCharCode( key );
                      var regex = /[0-9]|\./;
                      if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                }
            </script>