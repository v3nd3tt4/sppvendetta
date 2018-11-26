<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Tahun Ajaran</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
         <form method="POST" action="<?=base_url()?>tahun_ajaran/update">
            <div class="form-group">
               <label >Tahun Ajaran *</label>
                <input type="hidden" name="id_tahun_ajaran" value="<?=$thn_ajaran->row()->id_tahun_ajaran?>"/>
               <input type="text" name="thn_ajaran" placeholder="Contoh: 2015/2016" class="form-control" value="<?=$thn_ajaran->row()->nama_tahun_ajaran?>" required>
            </div>
            <div class="form-group">
               <label >Keterangan *</label>
               <input type="text" name="thn_ajaran_ket" class="form-control" value="<?=$thn_ajaran->row()->keterangan?>">
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