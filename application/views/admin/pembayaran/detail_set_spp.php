<form method="POST" action="#">
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Pembayaran SPP</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
         
            <div class="form-group">
               <label >Keterangan *</label>
               <input type="text" name="keterangan" class="form-control" value="<?=$set_spp->row()->keterangan?>" readonly required>
            </div>
            <div class="form-group">
               <label >Kelas *</label>
               <select class="form-control" name="kelas" readonly>
                   <option value="">--pilih--</option>
                   <?php foreach($kelas as $row_kelas){?>
                   <option value="<?=$row_kelas->id_kelas?>" <?=$set_spp->row()->id_kelas== $row_kelas->id_kelas ? 'selected' : ''?>><?=$row_kelas->nama_kelas?></option>
                   <?php }?>
               </select>
            </div>
            <div class="form-group">
                <label>Dari</label>
                <input type="date" name="dari" value="<?=$set_spp->row()->dari?>" readonly class="form-control"/>
            </div>
             <div class="form-group">
                <label>Sampai</label>
                <input type="date" name="sampai" value="<?=$set_spp->row()->sampai?>" readonly class="form-control"/>
            </div>
             <small>
             <i>*) Wajib diisi</i>
             </small>   
        
      </div>
   </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
        <button class="btn btn-success btn_tambah_siswa_spp">Input siswa di dalam transaksi ini</button>
         <table class="table table-stripped datatable">
             <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kewaijiban SPP (Rp.)</th>
                    <th>Aksi</th>
                </tr>
             </thead>
             <tbody>
                 <?php $no=1;foreach($list_siswa->result() as $row_list_siswa){?>
                <tr>
                    <td><?=$no++;?>.</td>
                    <td><?=$row_list_siswa->nis?><input type="hidden" name="id_siswa[]" value="<?=$row_list_siswa->id_siswa?>"></td>
                    <td><?=$row_list_siswa->nama_siswa?></td>
                    <td><input type="number" class="form-control" value="<?=$row_list_siswa->nominal_default?>" name="kewajiban_bayar[]" readonly/></td>
                    <td><a href="<?=base_url()?>pembayaran/lihat_bayar_tansaksi/<?=$set_spp->row()->id_set_spp?>/<?=$row_list_siswa->id_siswa?>" class="btn btn-danger btn-sm">Transaksi</a></td>
                </tr>
                 <?php }?>
             </tbody>
         </table>
      </div>
   </div>
</div>
</form>


<!-- Modal -->
<div id="modal_tambah_siswa_spp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah siswa di dalam transaksi ini</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url()?>pembayaran/store_siswa_dalam_transaksi">
          <input type="hidden" name="id_set_spp" value="<?=$set_spp->row()->id_set_spp?>">
          <div class="form-group">
            <label>Judul Transaksi</label>
            <input type="text" name="keterangan" class="form-control" readonly required value="<?=$set_spp->row()->keterangan?>">
          </div>
          <div class="form-group">
                <label>Dari</label>
                <input type="date" name="dari" readonly value="<?=$set_spp->row()->dari?>" readonly class="form-control"/>
            </div>
             <div class="form-group">
                <label>Sampai</label>
                <input type="date" name="sampai" readonly value="<?=$set_spp->row()->sampai?>" readonly class="form-control"/>
            </div>
          <div class="form-group">
            <label>Siswa</label>
            <select class="form-control" name="siswa" required>
              <option value="">--pilih--</option>
              <?php foreach($siswa_yang_akan_ditambah->result() as $row_siswa_fresh){?>
              <option value="<?=$row_siswa_fresh->id_siswa?>"><?=$row_siswa_fresh->nis?> - <?=$row_siswa_fresh->nama_siswa?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Kewajiban Bayar SPP</label>
            <input type="number" name="kewajiban_bayar" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>