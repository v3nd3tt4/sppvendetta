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
                    <th>Aksi</th>
                </tr>
             </thead>
             <tbody>
                 <?php $no=1;foreach($list_siswa->result() as $row_list_siswa){?>
                <tr>
                    <td><?=$no++;?>.</td>
                    <td><?=$row_list_siswa->nis?><input type="hidden" name="id_siswa[]" value="<?=$row_list_siswa->id_siswa?>"></td>
                    <td><?=$row_list_siswa->nama_siswa?></td>
                    <td><a href="<?=base_url()?>pembayaran_daful/transaksi_daful/<?=$row_list_siswa->id_siswa?>/<?=$row_data->row()->id_set_daftar_ulang?>" class="btn btn-xs btn-danger">Transaksi</a></td>
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
                <?php foreach($list_detail_daful->result() as $row_detail_daful){?>
                 <tr>
                   <td><?=$row_detail_daful->nama_detail_pembayaran?></td>
                   <td>Rp. <?=number_format($row_detail_daful->nominal_bayar, '0', ',', '.')?></td>
                 </tr>
                 <?php }?>
             </tbody>
         </table>
       </div>
      </div>
   </div>
</div>
</form>
