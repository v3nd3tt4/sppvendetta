<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php echo form_open(current_url()); ?>
        <?php echo validation_errors(); ?>
        <div class="form-group">
            <?php if ($this->uri->segment(3) == 'cpw') { ?>
                <label >Password lama *</label>
                <input type="password" name="member_current_password" class="form-control" placeholder="Password lama">
            <?php } ?>
        </div>
        <div class="form-group">
            <label >Password baru*</label>
            <input type="password" name="member_password" class="form-control" placeholder="Password baru">
            <?php if ($this->uri->segment(3) == 'cpw') { ?>
                <input type="hidden" name="member_id" value="<?php echo $this->session->userdata('member_id'); ?>" >
            <?php } else { ?>
                <input type="hidden" name="member_id" value="<?php echo $member['member_id'] ?>" >
            <?php } ?>
        </div>
        <div class="form-group">
            <label > Konfirmasi password baru*</label>
            <input type="password" name="passconf" class="form-control" placeholder="Konfirmasi password baru" >
        </div>
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
        <a href="<?php echo site_url('admin/member'); ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Batal</a>
        <?php form_close() ?>
    </div>
</div>