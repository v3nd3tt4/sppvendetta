<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Jenis Pembayaran</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
         <form method="POST" action="<?=base_url()?>jenis_pembayaran/update">
            <div class="form-group">
               <label >Nama Jenis Pembayaran *</label>
                <input type="hidden" name="id_jenis_pembayaran" value="<?=$jenis_pembayaran->row()->id_jenis_pembayaran?>"/>
               <input type="text" name="nama_jenis_pembayaran" class="form-control" value="<?=$jenis_pembayaran->row()->nama_jenis_pembayaran?>" required>
            </div>
            <div class="form-group">
               <label >Keterangan *</label>
               <input type="text" name="keterangan" class="form-control" value="<?=$jenis_pembayaran->row()->keterangan?>">
            </div>
         
             <small>
             <i>*) Wajib diisi</i>
             </small>
             <br>
             <div class="form-group">
                <button type="submit"  class="btn btn-success ">
                <i class="fa fa-check"></i> Simpan
                </button>
                <br>
                <br>
             </div>
        </form>
      </div>
   </div>
</div>