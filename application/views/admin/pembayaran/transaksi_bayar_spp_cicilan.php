<!-- <?php var_dump($row->row()); ?> -->
<?php $jumlah_cicilan = $row_cicilan->row()->jumlah_cicilan_sudah_dibayar === NULL ? 0 : $row_cicilan->row()->jumlah_cicilan_sudah_dibayar; $total = $row->row()->jumlah_bayar+$jumlah_cicilan; 


?>
<form id="form_transaksi_pembayaran_spp_cicilan">
	<div class="form-group">
		<label>No Kwitansi:</label>
		<input type="hidden" name="id_transaksi_spp" value="<?=$row->row()->id_transaksi_spp?>">
		<input type="text" class="form-control" name="no_kwitansi" value="<?=$no_kwitansi?>" readonly />
	</div>
	<div class="form-group">
		<label>Kewajiban:</label>
		<input type="text" class="form-control" name="kewajiban" value="<?=$row->row()->nominal_default?>" readonly/>
	</div>
	<div class="form-group">
		<label>Tanggal Transaksi:</label>
		<input type="date" class="form-control" name="tgl_trx" value="<?=date('Y-m-d')?>"/>
	</div>
	<div class="form-group">
		<label>Nominal bayar:</label>
		<input type="number" class="form-control" name="nominal_bayar"/>
	</div>
	<button type="submit" class="btn btn-primary">Simpan</button>

	<br/>
	<div id="notif_transaksi_pembayaran_spp_cicilan"></div>
</form>
<br/><br/>
<table class="table table-stri">
	<tr>
		<td>No</td>
		<td>No Kwitansi</td>
		<td>Tanggal Transaksi</td>
		<td>Jumlah Bayar</td>
	</tr>
	<?php $no =1; foreach($row_detail_cicilan->result() as $row_detail_cicilannya){?>
	<tr>
		<td><?=$no++?>.</td>
		<td><?=$row_detail_cicilannya->no_kwitansi?></td>
		<td><?=$row_detail_cicilannya->tanggal_transaksi?></td>
		<td>Rp. <?=number_format($row_detail_cicilannya->jumlah_bayar)?></td>
	</tr>
	<?php }?>
</table>