<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Siswa</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
         <form method="POST" action="<?=base_url()?>siswa/update">
            <div class="form-group">
               <label >NIS *</label>
                <input type="hidden" name="id_siswa" class="form-control" value="<?=$siswa->row()->id_siswa?>" required>
               <input type="text" name="nis" class="form-control" value="<?=$siswa->row()->nis?>" required>
            </div>
            <div class="form-group">
               <label >Nama Siswa *</label>
               <input type="text" name="nama_siswa" class="form-control" value="<?=$siswa->row()->nama_siswa?>">
            </div>
             <div class="form-group">
               <label >Kelas *</label>
               <select name="id_kelas" class="form-control">
                   <option value="">--pilih--</option>
                   <?php foreach($kelas as $row_kelas){?>
                   <option value="<?=$row_kelas->id_kelas?>" <?php if($row_kelas->id_kelas == $siswa->row()->id_kelas){ echo 'selected';}?>><?=$row_kelas->nama_kelas?></option>
                   <?php }?>
               </select>
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