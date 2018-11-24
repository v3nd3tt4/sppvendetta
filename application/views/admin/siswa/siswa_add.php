<?php
$this->load->view('admin/tinymce_init');
$this->load->view('admin/datepicker');
if (isset($siswa)) {
    $id = $siswa['siswa_id'];
    $inputFullName = $siswa['siswa_nama'];
    $inputBirthPlace = $siswa['siswa_tmpt_lhr'];
    $inputBirthDate = $siswa['siswa_tgl_lhr'];
    $inputNis = $siswa['siswa_nis'];
    $inputStatus = $siswa['siswa_status'];
} else {
    $inputNis = set_value('siswa_nis');
    $inputFullName = set_value('siswa_nama');
    $inputBirthPlace = set_value('siswa_tmpt_lhr');
    $inputBirthDate = set_value('siswa_tgl_lhr');
    $inputStatus = set_value('siswa_status');
}
?>
<?php echo isset($alert) ? ' ' . $alert : null; ?>
<?php echo validation_errors(); ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="col-lg-12">
            <h3><?php echo $operation ?> Siswa (Super User)</h3>
            <br>
        </div>
        <!-- /.col-lg-12 -->

        <?php echo form_open_multipart(current_url()); ?>
        <div class="col-md-12">
            <div class="col-sm-12 col-md-9">
                <?php if (isset($siswa)): ?>
                    <input type="hidden" name="siswa_id" value="<?php echo $siswa['siswa_id'] ?>" />
                <?php endif; ?>     
                <label >NIS *</label>
                <input name="siswa_nis" type="text" onkeypress="validate(event)" <?php echo (isset($siswa)) ? 'readonly' : '' ?> placeholder="NIS" class="form-control" value="<?php echo $inputNis; ?>"><br>
                <?php if (!isset($siswa)): ?>
                    <label >Password *</label>
                    <input type="password" placeholder="Password" name="password" class="form-control"><br>
                    <label >Konfirmasi Password *</label>
                    <input type="password" placeholder="Konfirmasi Password" name="passconf" class="form-control">
                    <p style="color:#9C9C9C;margin-top: 5px"><i>Password minimal 6 karakter</i></p>
                <?php endif; ?>

                <label >Nama Lengkap *</label> 
                <input type="text" name="siswa_nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo $inputFullName; ?>"><br>
                <label >Tempat Lahir *</label>
                <input type="text" name="siswa_tmpt_lhr" placeholder="Tempat Lahir" class="form-control" value="<?php echo $inputBirthPlace; ?>"><br>
                <label >Tanggal Lahir *</label>
                <input type="text" name="siswa_tgl_lhr" placeholder="Tanggal Lahir" class="form-control datepicker" value="<?php echo $inputBirthDate; ?>"><br>
                <label >Kelas *</label>
                <select name="jns_byr_kategori" class="form-control">
                    <option value="">--- Pilih ---</option>
                    <?php
                    foreach ($kelas as $row):
                        ?>
                    <option value="<?php echo $row['kelas_id']; ?>"> <?php echo $row['kelas_ket']; ?></option>

                    <?php
                    endforeach;
                    ?>
                </select><br>

                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Wajib diisi</i></p>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-3">
                <div class="form-group">
                    <label>Status *</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="siswa_status" value="0" <?php echo ($inputStatus == '0') ? 'checked' : ''; ?>> Non-Aktif
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="siswa_status" value="1" <?php echo ($inputStatus == '1') ? 'checked' : ''; ?>> Aktif
                        </label>
                    </div>
                    <hr>
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button><br>
                    <a href="<?php echo site_url('admin/siswa'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a><br>
                    <?php if (isset($siswa)): ?>
                        <?php if ($this->session->userdata('siswa_id') != $id) {
                            ?>
                            <a href="<?php echo site_url('admin/siswa/delete/' . $siswa['siswa_id']); ?>" class="btn btn-danger btn-form"><i class="fa fa-trash"></i> Hapus</a><br>
                            <?php } ?>
                            <?php if ($this->session->userdata('siswa_id') == $id) {
                                ?>
                                <a href="<?php echo site_url('admin/profile/cpw') ?>" class="btn btn-primary btn-form"><i class="fa fa-refresh"></i> Ubah Password</a><br>
                                <?php } elseif ($this->session->userdata('siswa_id') != $id) { ?>
                                    <a class="btn btn-primary btn-form" href="<?php echo site_url('admin/siswa/rpw/' . $siswa['siswa_id']); ?>" ><i class="fa fa-key"></i> Reset Password</a><br>
                                    <?php } ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <?php if (isset($siswa)): ?>
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
                            <?php echo form_open('admin/siswa/delete/' . $siswa['siswa_id']); ?>
                            <div class="modal-footer">
                                <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                                <input type="hidden" name="del_id" value="<?php echo $siswa['siswa_id'] ?>" />
                                <input type="hidden" name="del_name" value="<?php echo $siswa['siswa_nama'] ?>" />
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