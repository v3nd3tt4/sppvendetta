<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Detail Daftar Ulang</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
         <form method="POST" action="<?=base_url()?>detail_daful/store">
            <div class="form-group">
               <label >Nama Detail Daful *</label>
               <input type="text" name="nama_detail_daful" class="form-control" placeholder="contoh: baju olahraga" value="" required>
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