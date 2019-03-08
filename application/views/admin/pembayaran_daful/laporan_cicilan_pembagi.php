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
		<td>: Rp. <?=number_format($tb_set_daful->row()->biaya_daful, '0', ',', '.')?></td>
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
		<td rowspan ="2">Total Bayar</td>
		<td rowspan="2">Tunggakan</td>
	</tr>
	
	<tr>
		<?php foreach($detail_daful->result() as $row_detail_daful){?>
		<td>Jumlah yang sudah dibayar</td>
		<?php }?>
	</tr>
	
	<?php $no=1;
	$tot_show = 0;
	$tot_udah_bayar_show = 0;
	$arr_sum_detail = array();
	foreach($list_siswa->result() as $row_transaksi_spp){
		$id_siswa = $row_transaksi_spp->id_siswa;
		$id_set_daftar_ulang = $tb_set_daful->row()->id_set_daftar_ulang;
		$get_total_sudah_bayar = $this->Model->kueri("select sum(jumlah_bayar) as sudah_dibayar, jumlah_bayar, tanggal_transaksi from tb_transaksi_pembayaran_daful where id_siswa = '$id_siswa' and id_set_daftar_ulang = '$id_set_daftar_ulang'");
		$total_sudah_dibayar = $get_total_sudah_bayar->row()->sudah_dibayar;
		$tot_show += $total_sudah_dibayar;
		$total_sudah_dibayar_tampil = $get_total_sudah_bayar->row()->sudah_dibayar;
		$tot_udah_bayar_show += ($tb_set_daful->row()->biaya_daful - $total_sudah_dibayar_tampil); 
	?>
	<tr>
		<td><?=$no++?>.</td>
		<td><?=$row_transaksi_spp->nis?></td>
		<td><?=$row_transaksi_spp->nama_siswa?></td>
		<td>Rp. <?=number_format($total_sudah_dibayar, '0', ',', '.')?></td>
		<?php $tampil1 = 0 ;
		
		$t_1 = 0;
		foreach($detail_daful->result() as $row_detail_daful){
				if($total_sudah_dibayar > $row_detail_daful->nominal_bayar){
					$tampil = $row_detail_daful->nominal_bayar;
				}else{					
					$tampil = $total_sudah_dibayar;
				}
                $total_sudah_dibayar -= $row_detail_daful->nominal_bayar;
        
                if($total_sudah_dibayar < 0){
                    $total_sudah_dibayar = 0;
                }
		?>
		<td>
			Rp. <?=number_format($tampil, '0', ',', '.')?>
		</td>
		
		<?php $t_1 += $tampil;}array_push($arr_sum_detail, $t_1);?>
		<td>Rp. <?=number_format($total_sudah_dibayar_tampil, '0', ',', '.')?></td>
		<td>Rp. <?=number_format($tb_set_daful->row()->biaya_daful - $total_sudah_dibayar_tampil, '0', ',', '.')?></td>
	</tr>
	<?php 
		
	}?>
	<tr>
		<td colspan="3">Total</td>
		<td>Rp. <?=number_format($tot_show, '0', ',', '.')?></td>
		<?php foreach($detail_daful->result() as $data_tot){?>
		<td></td>
		<?php }?>
		<td>Rp. <?=number_format($tot_show, '0', ',', '.')?></td>
		<td>Rp. <?=number_format($tot_udah_bayar_show, '0', ',', '.')?></td>
	</tr>
</table><br/><br/>
</div>
<?=var_dump($arr_sum_detail)?>
<style type="text/css">
	table {
    border-collapse: collapse;
	}

	table, th, td {
	    border: 1px solid black;
	}
</style>