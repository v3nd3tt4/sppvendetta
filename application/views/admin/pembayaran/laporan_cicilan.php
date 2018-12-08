<center>
<h4>Laporan Transaksi SPP</h4>
</center>

<table>
	<tr>
		<td>Keterangan</td>
		<td>: <?=$tb_set_spp->row()->keterangan?></td>
	</tr>
	<tr>
		<td>Periode</td>
		<td>: <?=date("M Y", strtotime($tb_set_spp->row()->dari))?> - <?=date("M Y", strtotime($tb_set_spp->row()->sampai))?></td>
	</tr>
</table>
<hr/>

<table width="100%">
	<tr>
		<td rowspan="2">No</td>
		<td rowspan="2">NIS</td>
		<td rowspan="2">Nama</td>
		<td rowspan="2">Nominal SPP</td>
		<?php $loop1 = json_decode($loop_bln_thn);foreach($loop1 as $row_loop1){?>
		<td colspan="2"><?=$this->Model->konversi_bulan($row_loop1->month)?> <?=$row_loop1->year?></td>

		<?php }?>
		<td rowspan ="2">Total Bayar</td>
		<td rowspan ="2">Total Harus Dibayar</td>
		<td rowspan="2">Tunggakan</td>
	</tr>
	
	<tr>
		<?php $loop1 = json_decode($loop_bln_thn);foreach($loop1 as $row_loop1){?>
		<td>Jumlah Bayar</td>
		<td>Tanggal Bayar</td>
		<?php }?>
	</tr>
	
	<?php $no=1;foreach($tb_transaksi_pembayaran_spp->result() as $row_transaksi_spp){?>
	<tr>
		<td><?=$no++?>.</td>
		<td><?=$row_transaksi_spp->nis?></td>
		<td><?=$row_transaksi_spp->nama_siswa?></td>
		<td>Rp. <?=number_format($row_transaksi_spp->nominal_default)?></td>
		<?php $loop1 = json_decode($loop_bln_thn); $hitungsudahdibayar = 0; $hitungyangharusdibayar =0;foreach($loop1 as $row_loop1){

			$hitungyangharusdibayar += $row_transaksi_spp->nominal_default;
			?>
		<?php $querylagi= $this->Model->get_data('tb_transaksi_pembayaran_spp', array('id_siswa' => $row_transaksi_spp->id_siswa, 'id_set_spp' => $row_transaksi_spp->id_set_spp, 'bulan' => $row_loop1->month, 'tahun' => $row_loop1->year)) ?>
		<?php 
		
		foreach($querylagi->result() as $row_querylagi){
			$id = $row_querylagi->id_transaksi_spp;
			$querycicilan = $this->Model->kueri("select sum(jumlah_bayar) as jumlah_cicilan_sudah_dibayar from tb_cicilan_spp where id_transaksi_spp = '$id'");

			$jumlah_cicilan = $querycicilan->row()->jumlah_cicilan_sudah_dibayar === NULL ? 0 : $querycicilan->row()->jumlah_cicilan_sudah_dibayar; 

			$total = $row_querylagi->jumlah_bayar + $jumlah_cicilan;
			$hitungsudahdibayar += $total;

		?>
		<td>Rp. <?=number_format($total)?></td>
		<td><?=$row_querylagi->tanggal_transaksi?></td>


		<?php } }?>
		<td>Rp. <?=number_format($hitungsudahdibayar)?></td>
		<td>Rp. <?=number_format($hitungyangharusdibayar)?></td>
		<td>
			Rp. <?=number_format($hitungyangharusdibayar - $hitungsudahdibayar)?>

		</td>
	</tr>
	<?php }?>
</table>

<style type="text/css">
	table {
    border-collapse: collapse;
	}

	table, th, td {
	    border: 1px solid black;
	}
</style>