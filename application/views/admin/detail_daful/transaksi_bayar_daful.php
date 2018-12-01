<!-- <?php var_dump($row->row()); ?> -->
<form id="form_transaksi_pembayaran_daful">
	<div class="form-group">
		<label>No Kwitansi1:</label>
		<input type="text" name="id_siswa" value="<?=$id_siswa?>">
		<input type="hidden" name="id_set_daftar_ulang" value="<?=$id_set_daftar_ulang?>">
		<input type="text" class="form-control" name="no_kwitansi" value="<?=$no_kwitansi?>" readonly />
	</div>
	<div class="form-group">
		<label>Kewajiban:</label>
		<input type="text" class="form-control" name="kewajiban" value="<?=$row->row()->biaya_daful?>" readonly/>
	</div>
	<div class="form-group">
		<label>Nominal bayar:</label>
		<input type="number" class="form-control" name="nominal_bayar"/>
	</div>
	<button type="submit" class="btn btn-primary">Simpan</button>

	<br/>
	<div id="notif_transaksi_pembayaran_daful"></div>
</form>