<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
   <div class="x_panel post-inherit">
      <div class="col-lg-12">
         <h3>Pembayaran SPP</h3>
         <br>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-md-12">
            <div class="form-group">
                <label >NIS *</label>
               <input type="text" name="nis" class="form-control" value="<?=$siswa->row()->nis?>" readonly required>
            </div>
            <div class="form-group">
                <label >Nama Siswa *</label>
               <input type="text" name="nama_siswa" class="form-control" value="<?=$siswa->row()->nama_siswa?>" readonly required>
            </div>
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
         <table class="table table-stripped">
             <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>No Kwitansi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Kewajiban</th>
                    <th>Jumlah Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
             </thead>
             <tbody>
                 <?php $no=1;foreach($list_transaksi->result() as $row_list_transaksi){?>
                <tr>
                    <td><?=$no++;?>.</td>
                    <td><?=$this->Model->konversi_bulan($row_list_transaksi->bulan)?></td>
                    <td><?=$row_list_transaksi->tahun?></td>
                    <td><?=$row_list_transaksi->no_kwitansi === NULL || $row_list_transaksi->no_kwitansi == ''  ? '<a class="btn btn-danger btn-xs" href="#">Belum Ada</a>' : $row_list_transaksi->no_kwitansi?></td>
                    <td><?=$row_list_transaksi->tanggal_transaksi?></td>
                    <td>Rp. <?=number_format($row_list_transaksi->nominal_default)?></td>
                    <td>Rp. <?=number_format($row_list_transaksi->jumlah_bayar)?></td>
                    <td><?=$row_list_transaksi->status?></td>
                    <td>
                        <?php if($row_list_transaksi->status == 'belum bayar'){?>
                        <a href="#" class="btn btn-success btn-xs btn_bayar_transaksi" id="<?=$row_list_transaksi->id_transaksi_spp?>">Lakukan Pembayaran</a>
                        <?php }else{?>
                        <a href="#" class="btn btn-primary btn-xs" id="<?=$row_list_transaksi->id_transaksi_spp?>"><i class="fa fa-check" aria-hidden="true"></i> Lunas</a>
                        <?php }?>
                    </td>
                </tr>
                 <?php }?>
             </tbody>
         </table>
      </div>
   </div>
</div>

<!-- Modal -->
<div id="modal_pembayaran" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaksi</h4>
      </div>
      <div class="modal-body">
        <div id="result_pembayaran"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>