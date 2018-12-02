<div style="overflow: scroll;">
<center>
<h4>Laporan Transaksi Daftar Ulang</h4>
</center>

<table>
	<tr>
		<td>Keterangan</td>
		<td>: <?=$tb_set_daful->row()->keterangan?></td>
	</tr>
	<tr>
		<td>Periode</td>
		<td>: <?=date("M Y", strtotime($tb_set_daful->row()->dari))?> - <?=date("M Y", strtotime($tb_set_daful->row()->sampai))?></td>
	</tr>
	<tr>
		<td>Biaya Daftar Ulang</td>
		<td>: Rp. <?=number_format($tb_set_daful->row()->biaya_daful)?></td>
	</tr>
</table>
<hr/>

<table width="100%" style="border-collapse: collapse;">
	<tr>
		<td rowspan="2">No</td>
		<td rowspan="2">NIS</td>
		<td rowspan="2">Nama</td>
		<td rowspan="2">Total Sudah Dibayar</td>
		<?php foreach($detail_daful->result() as $row_detail_daful){?>
		<td align="center"><?=$row_detail_daful->nama_detail_pembayaran?><br/>
			Rp. <?=number_format($row_detail_daful->nominal_bayar, '0', ',', '.')?>
		</td>

		<?php }?>
	</tr>
	
	<tr>
		<?php foreach($detail_daful->result() as $row_detail_daful){?>
		<td>Jumlah yang sudah dibayar</td>
		<?php }?>
	</tr>
	
	<?php $no=1;foreach($list_siswa->result() as $row_transaksi_spp){
		$id_siswa = $row_transaksi_spp->id_siswa;
		$id_set_daftar_ulang = $tb_set_daful->row()->id_set_daftar_ulang;
		$get_total_sudah_bayar = $this->Model->kueri("select sum(jumlah_bayar) as sudah_dibayar, jumlah_bayar, tanggal_transaksi from tb_transaksi_pembayaran_daful where id_siswa = '$id_siswa' and id_set_daftar_ulang = '$id_set_daftar_ulang'");
		$total_sudah_dibayar = $get_total_sudah_bayar->row()->sudah_dibayar;

	?>
	<tr>
		<td><?=$no++?>.</td>
		<td><?=$row_transaksi_spp->nis?></td>
		<td><?=$row_transaksi_spp->nama_siswa?></td>
		<td>Rp. <?=number_format($total_sudah_dibayar, '0', ',', '.')?></td>
		<?php $tampil1 = 0 ;foreach($detail_daful->result() as $row_detail_daful){
			$total_sudah_dibayar -= $row_detail_daful->nominal_bayar;
			// if($total_sudah_dibayar1 > 0){
				if($total_sudah_dibayar > $row_detail_daful->nominal_bayar){
					$tampil = $row_detail_daful->nominal_bayar;
				}else{
					
					$tampil = $total_sudah_dibayar + $row_detail_daful->nominal_bayar;
				}
			// }else{
			// 	$tampil = 1;
			// }
				// $tampil1 += $tampil;
				// if($tampil == $total_sudah_dibayar){
				// 	$tampil = $tampil1;
				// }else{
				// 	$tampil = $tampil;
				// }
		?>
		<td>
			Rp. <?=number_format($tampil, '0', ',', '.')?>
		</td>
		
		<?php }?>
	</tr>
	<?php }?>
</table>
</div>
<style type="text/css">
	table {
    border-collapse: collapse;
	}

	table, th, td {
	    border: 1px solid black;
	}
</style>