<!-- <?php var_dump($row->row()); ?> -->
<form id="form_transaksi_pembayaran_spp">
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
	<div id="notif_transaksi_pembayaran_spp"></div>
</form>