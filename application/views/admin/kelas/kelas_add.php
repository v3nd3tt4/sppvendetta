<?php
$this->load->view('admin/tinymce_init');
$this->load->view('admin/datepicker');
if (isset($kelas)) {
    $id = $kelas['kelas_id'];
    $inputFullName = $kelas['kelas_ket'];
    $inputTarif = $kelas['kelas_tarif'];
} else {
    
    $inputFullName = set_value('kelas_ket');
    $inputTarif = set_value('kelas_tarif');
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
            <div class="col-sm-8 col-md-6">
                <?php if (isset($kelas)): ?>
                    <input type="hidden" name="kelas_id" value="<?php echo $kelas['kelas_id'] ?>" />
                <?php endif; ?>     
                <label >Kelas *</label>
                <input type="text" name="kelas_ket" autofocus placeholder="Nama Kelas" class="form-control" value="<?php echo $inputFullName; ?>"><br>
                <label >Tarif SPP Per Kelas *</label>
                <input type="text" name="kelas_tarif" placeholder="Tarif SPP" class="form-control" onkeypress="validate(event)" value="<?php echo $inputTarif; ?>"><br>
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Wajib diisi</i></p>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-3">
                <div class="form-group">
                    </div>
                    <hr>
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button><br>
                    <a href="<?php echo site_url('admin/kelas'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a><br>
                    <?php if (isset($kelas)): ?>
                        <?php if ($this->session->userdata('kelas_id') != $id) {
                            ?>
                            <a href="<?php echo site_url('admin/kelas/delete/' . $kelas['kelas_id']); ?>" class="btn btn-danger btn-form"><i class="fa fa-trash"></i> Hapus</a><br>
                            <?php } ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <?php if (isset($kelas)): ?>
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
                            <?php echo form_open('admin/kelas/delete/' . $kelas['kelas_id']); ?>
                            <div class="modal-footer">
                                <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                                <input type="hidden" name="del_id" value="<?php echo $kelas['kelas_id'] ?>" />
                                <input type="hidden" name="del_name" value="<?php echo $kelas['kelas_ket'] ?>" />
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