<div style="overflow: scroll;">
<center>
<h4>Laporan Transaksi Daftar Ulang Per Tanggal</h4>
Tanggal: <?=date('d/m/Y',strtotime($tgl))?>
</center>
<hr/>
<table width="100%">
	<tr>
		<td>No.</td>
		<td>NIS</td>
		<td>Nama</td>
		<td>No Kwitansi</td>
		<td>Tanggal Transaksi</td>
		<td>Jumlah Bayar</td>
		
	</tr>
	<?php $no=1;$total = 0; foreach($row->result() as $row_data){
		$total += $row_data->jumlah_bayar
	?>
	<tr>
		<td><?=$no++?>.</td>
		<td><?=$row_data->nis?></td>
		<td><?=$row_data->nama_siswa?></td>
		<td><?=$row_data->no_kwitansi?></td>
		<td><?=$row_data->tanggal_transaksi?></td>
		<td>Rp. <?=number_format($row_data->jumlah_bayar, '0', ',', '.')?></td>
		
	</tr>
	<?php }?>
	<tr>
		<td colspan="5" align="center">Total</td>
		<td colspan="1">Rp. <?=number_format($total, '0', ',', '.')?></td>
	</tr>
</table>
<style type="text/css">
	table {
    border-collapse: collapse;
	}

	table, th, td {
	    border: 1px solid black;
	}
</style>
</div>