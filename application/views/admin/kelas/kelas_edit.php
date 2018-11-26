<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Kelas</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
         <form method="POST" action="<?=base_url()?>kelas/update">
            <div class="form-group">
               <label >Tahun Ajaran *</label>
                <input type="hidden" name="id_kelas" value="<?=$kelas->row()->id_kelas?>"/>
               <input type="text" name="nama_kelas" class="form-control" value="<?=$kelas->row()->nama_kelas?>" required>
            </div>
            <div class="form-group">
               <label >Keterangan *</label>
               <input type="text" name="keterangan" class="form-control" value="<?=$kelas->row()->keterangan?>">
            </div>
         
             <small>
             <i>*) Wajib diisi</i>
             </small>
             <br>
             <div class="form-group">
                <button type="submit"  class="btn btn-success ">
                <i class="fa fa-check"></i> Update
                </button>
                <br>
                <br>
             </div>
        </form>
      </div>
   </div>
</div>