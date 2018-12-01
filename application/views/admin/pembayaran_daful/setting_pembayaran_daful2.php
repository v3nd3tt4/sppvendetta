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
                <input type="number" name="max_cicilan" value="" class="form-control" required />
            </div>
            <div class="form-group">
                <label>Biaya Daftar Ulang</label>
                <input type="number" name="biaya_daful" value="" class="form-control" required />
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
        <h4>Daftar Siswa</h4><hr/>
        <div class="table-responsive">
         <table class="table table-stripped">
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
          <h4>Daftar Detail Daful</h4><hr/>
          <div class="form-group">
            <label>Jenis:</label>
            <select class="form-control" name="jenis_detail_daful" id="jenis_detail_daful">
              <option value="">--pilih--</option>
              <?php foreach($list_detail_daful as $row_detail_daful){?>
              <option value="<?=$row_detail_daful->id_detail_daftar_ulang?>"><?=$row_detail_daful->nama_detail_pembayaran?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Biaya:</label>
            <input type="number" class="form-control" name="biaya_detail_daful" id="biaya_detail_daful" />
          </div>
          <button type="button" class="btn btn-primary tambah_detail_daful">Tambah</button>
        <div class="table-responsive">
         <table class="table table-stripped tb_list_detail_daful">
             <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Biaya</th>
                    <th></th>
                </tr>
             </thead>
             <tbody>
                 
             </tbody>
         </table>
       </div>
      </div>
   </div>
</div>
</form>
