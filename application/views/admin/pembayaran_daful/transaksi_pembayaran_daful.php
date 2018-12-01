<div class="col-md-7 col-sm-7 col-xs-7 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Transaksi Pembayaran Daftar Ulang</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
         
            <div class="form-group">
               <label >Keterangan *</label>
               <input type="text" name="keterangan" class="form-control" value="<?=$row_data->row()->keterangan?>" readonly required>
            </div>
            <div class="form-group">
               <label >Kelas *</label>
               <select class="form-control" name="kelas" readonly>
                   <option value="">--pilih--</option>
                   <?php foreach($kelas as $row_kelas){?>
                   <option value="<?=$row_kelas->id_kelas?>" <?=$row_data->row()->id_kelas == $row_kelas->id_kelas ? 'selected' : ''?>><?=$row_kelas->nama_kelas?></option>
                   <?php }?>
               </select>
            </div>
            <div class="form-group">
                <label>Dari</label>
                <input type="date" name="dari" value="<?=$row_data->row()->dari?>" readonly class="form-control"/>
            </div>
             <div class="form-group">
                <label>Sampai</label>
                <input type="date" name="sampai" value="<?=$row_data->row()->sampai?>" readonly class="form-control"/>
            </div>
            <div class="form-group">
                <label>Maximal Cicilan</label>
                <input type="number" name="max_cicilan" value="<?=$row_data->row()->max_angsuran?>" class="form-control" readonly required />
            </div>
            <div class="form-group">
                <label>Biaya Daftar Ulang</label>
                <input type="number" name="biaya_daful" value="<?=$row_data->row()->biaya_daful?>" class="form-control" readonly required />
            </div>
             <small>
             <i>*) Wajib diisi</i>
             </small>
             <br>
      </div>
   </div>
</div>
<div class="col-md-5 col-sm-5 col-xs-5 main post-inherit">
   <div class="x_panel post-inherit">
      
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
        <h4>Data Siswa</h4><hr/>
        <div class="table-responsive">
         <table class="table table-striped table-bordered">
             <!-- <thead> -->
                <tr>
                    <td>NIS</td>
                    <td><?=$list_siswa->row()->nis?></td>
                    
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td><?=$list_siswa->row()->nama_siswa?></td>
                    
                </tr>
             <!-- </thead> -->
             
         </table>
       </div>
      </div>
   </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
        <h4>Data Transaksi Pembayaran Daftar Ulang <button type="button" class="btn btn-success pull-right btn_bayar_transaksi_daful" value="<?=$list_siswa->row()->id_siswa?>_<?=$row_data->row()->id_set_daftar_ulang?>">Bayar</button></h4><hr/>
        <div class="table-responsive">
         <table class="table table-striped table-bordered">
             <thead>
               <tr>
                 <th>No</th>
                 <th>No Kwitansi</th>
                 <th>Tanggal Transaksi</th>
                 <th>Jumlah yang dibayar</th>
                 <th>Status</th>
               </tr>
             </thead>
             <tbody>
               <?php $no = 1; foreach($transaksi_pembayaran_daful->result() as $row_transaksi_pembayaran_daful){?>
                <tr>
                  <td><?=$no++?>.</td>
                  <td><?=$row_transaksi_pembayaran_daful->no_kwitansi?></td>
                  <td><?=$row_transaksi_pembayaran_daful->tanggal_transaksi?></td>
                  <td>Rp. <?=number_format($row_transaksi_pembayaran_daful->jumlah_bayar, '0', ',', '.')?></td>
                  <td><?=$row_transaksi_pembayaran_daful->status?></td>
                </tr>
               <?php }?>
             </tbody>
         </table>
       </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div id="modal_pembayaran_daful" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaksi</h4>
      </div>
      <div class="modal-body">
        <div id="result_pembayaran_daful"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
