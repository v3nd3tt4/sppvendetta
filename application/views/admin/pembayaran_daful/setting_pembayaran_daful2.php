<form method="POST" action="<?=base_url()?>pembayaran_daful/store">
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Setting Pembayaran Daftar Ulang</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
         
            <div class="form-group">
               <label >Keterangan *</label>
               <input type="text" name="keterangan" class="form-control" value="<?=$keterangan?>" readonly required>
            </div>
            <div class="form-group">
               <label >Kelas *</label>
               <select class="form-control" name="kelas" readonly>
                   <option value="">--pilih--</option>
                   <?php foreach($kelas as $row_kelas){?>
                   <option value="<?=$row_kelas->id_kelas?>" <?=$id_kelas == $row_kelas->id_kelas ? 'selected' : ''?>><?=$row_kelas->nama_kelas?></option>
                   <?php }?>
               </select>
            </div>
            <div class="form-group">
                <label>Dari</label>
                <input type="date" name="dari" value="<?=$dari?>" readonly class="form-control"/>
            </div>
             <div class="form-group">
                <label>Sampai</label>
                <input type="date" name="sampai" value="<?=$sampai?>" readonly class="form-control"/>
            </div>
            <div class="form-group">
                <label>Maximal Cicilan</label>
                <input type="date" name="sampai" value="<?=$sampai?>" readonly class="form-control"/>
            </div>
             <small>
             <i>*) Wajib diisi</i>
             </small>
             <br>
             <div class="form-group">
                <button type="submit"  class="btn btn-success ">
                <i class="fa fa-save"></i> Simpan
                </button>
                <br>
                <br>
             </div>
        
      </div>
   </div>
</div>
<div class="col-md-7 col-sm-7 col-xs-7 main post-inherit">
   <div class="x_panel post-inherit">
      
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
        <div class="table-responsive">
         <table class="table table-stripped datatable">
             <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                </tr>
             </thead>
             <tbody>
                 <?php $no=1;foreach($list_siswa->result() as $row_list_siswa){?>
                <tr>
                    <td><?=$no++;?>.</td>
                    <td><?=$row_list_siswa->nis?><input type="hidden" name="id_siswa[]" value="<?=$row_list_siswa->id_siswa?>"></td>
                    <td><?=$row_list_siswa->nama_siswa?></td>
                </tr>
                 <?php }?>
             </tbody>
         </table>
       </div>
      </div>
   </div>
</div>

<div class="col-md-5 col-sm-5 col-xs-5 main post-inherit">
   <div class="x_panel post-inherit">
      
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
        
          <div class="form-group">
            <label>Jenis:</label>
            <select class="form-control" name="jenis">
              <option value="">--pilih--</option>
            </select>
          </div>
          <div class="form-group">
            <label>Biaya:</label>
            <input class="form-control" name="biaya_detail_daful"/>
          </div>
          <button class="btn btn-primary">Tambah</button>
        <div class="table-responsive">
         <table class="table table-stripped">
             <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Biaya</th>
                </tr>
             </thead>
             <tbody>
                 <?php $no=1;foreach($list_siswa->result() as $row_list_siswa){?>
                <tr>
                    <td><?=$no++;?>.</td>
                    <td><?=$row_list_siswa->nis?><input type="hidden" name="id_siswa[]" value="<?=$row_list_siswa->id_siswa?>"></td>
                    <td><?=$row_list_siswa->nama_siswa?></td>
                </tr>
                 <?php }?>
             </tbody>
         </table>
       </div>
      </div>
   </div>
</div>
</form>
