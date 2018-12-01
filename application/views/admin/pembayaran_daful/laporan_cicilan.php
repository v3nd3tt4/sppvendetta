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
		<?php for($i=1;$i<=$tb_set_daful->row()->max_angsuran;$i++){?>
		<td colspan="2">Angsuran ke-<?=$i?></td>

		<?php }?>
	</tr>
	
	<tr>
		<?php for($i=1;$i<=$tb_set_daful->row()->max_angsuran;$i++){?>
		<td>Jumlah Bayar</td>
		<td>Tanggal Bayar</td>
		<?php }?>
	</tr>
	
	<?php $no=1;foreach($list_siswa->result() as $row_transaksi_spp){?>
	<tr>
		<td><?=$no++?>.</td>
		<td><?=$row_transaksi_spp->nis?></td>
		<td><?=$row_transaksi_spp->nama_siswa?></td>
		<?php for($i=1;$i<=$tb_set_daful->row()->max_angsuran;$i++){?>
		<?php $querylagi= $this->Model->get_data('tb_transaksi_pembayaran_daful', array('id_siswa' => $row_transaksi_spp->id_siswa, 'id_set_daftar_ulang' => $row_transaksi_spp->id_set_daftar_ulang)) ;
			$hitung_loop = $querylagi->num_rows();
			if($hitung_loop!= 10){
				$cek_loop = 10 - $hitung_loop ;
			}else{
				$cek_loop = 10;
			}
		?>
		<?php 
			foreach($querylagi->result() as $row_querylagi){

		?>
		<td>Rp. <?=number_format($row_querylagi->jumlah_bayar)?></td>
		<td><?=$row_querylagi->tanggal_transaksi?></td>
		<?php } 
		 //if ($i == 1) {
        
        	for($i<1; $i<=$cek_loop;$i++){
        		echo '<td></td><td></td>';
        	}
        	break;
           /* You could also write 'break 1;' here. */
    	}

    	//echo '<td></td><td></td>'; ?>

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