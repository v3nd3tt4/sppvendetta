<div >
<center>
<h4>Tunggakan Pembayaran</h4>
NIS: <?=$siswa->row()->nis?><br>
Atas Nama: <?=$siswa->row()->nama_siswa?> <br>
Kelas: <?=$siswa->row()->nama_kelas?><br>
Kelas: <?=$siswa->row()->keterangan?>
</center>
<hr/>
<H3>Tunggakan SPP:</H3>
<table width="100%" class="tbku">
	<tr>
		<th rowspan="2">No</th>
		<th rowspan="2">NIS</th>
		<th rowspan="2">Nama</th>
		<th rowspan="2">Nominal SPP</th>
		<?php $loop1 = json_decode($loop_bln_thn);foreach($loop1 as $row_loop1){?>
		<th colspan="2"><?=$this->Model->konversi_bulan($row_loop1->month)?> <?=$row_loop1->year?></th>

		<?php }?>
		<th rowspan ="2">Total Bayar</th>
		<th rowspan ="2">Total Harus Dibayar</th>
		<th rowspan="2">Tunggakan</th>
	</tr>
	
	<tr>
		<?php $loop1 = json_decode($loop_bln_thn);foreach($loop1 as $row_loop1){?>
		<th>Jumlah Bayar</th>
		<th>Tanggal Bayar</th>
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
<h3>Tunggakan Daftar Ulang:</h3>
<table width="100%" class="tbku" style="border-collapse: collapse;">
	<tr>
		<th rowspan="2">No</th>
		<th rowspan="2">NIS</th>
		<th rowspan="2">Nama</th>
		<th rowspan="2">Total Sudah Dibayar</th>
		<?php foreach($detail_daful->result() as $row_detail_daful){?>
		<th align="center"><?=$row_detail_daful->nama_detail_pembayaran?><br/>
			Rp. <?=number_format($row_detail_daful->nominal_bayar, '0', ',', '.')?>
		</th>

		<?php }?>
		<th rowspan ="2">Total Bayar</th>
		<th rowspan="2">Tunggakan</th>
	</tr>
	
	<tr>
		<?php foreach($detail_daful->result() as $row_detail_daful){?>
		<th>Jumlah yang sudah dibayar</th>
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

                $t_1 += $tampil;

                array_push($arr_sum_detail, $tampil);
		?>
		<td>
			Rp. <?=number_format($tampil, '0', ',', '.')?>
		</td>
		
		<?php }?>
		<td>Rp. <?=number_format($total_sudah_dibayar_tampil, '0', ',', '.')?></td>
		<td>Rp. <?=number_format($tb_set_daful->row()->biaya_daful - $total_sudah_dibayar_tampil, '0', ',', '.')?></td>
	</tr>
	<?php 
		
	}
	$array = array_chunk($arr_sum_detail, count($detail_daful->result()));
 	
	$first = $array[0];
	$result = [];

	// Terus di foreach key $first

	foreach ($first as $i => $val) {
		$result[$i] = array_sum(array_map(function($d) use ($i) {
		return isset($d[$i]) ? $d[$i] : 0;
		}, $array));
	}

	

	?>
	<!-- <tr>
		<td colspan="3">Total</td>
		<td>Rp. <?=number_format($tot_show, '0', ',', '.')?></td>
		<?php for($i=0;$i<count($result);$i++){?>
		<td>Rp. <?=number_format($result[$i], '0', ',', '.')?></td>
		<?php }?>
		<td>Rp. <?=number_format($tot_show, '0', ',', '.')?></td>
		<td>Rp. <?=number_format($tot_udah_bayar_show, '0', ',', '.')?></td>
	</tr> -->
</table>
<br><br><br><br><br>
</div>
<style>
.tbku {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.tbku td, .tbku th {
  border: 1px solid #ddd;
  padding: 8px;
}

.tbku tr:nth-child(even){background-color: #f2f2f2;}

.tbku tr:hover {background-color: #ddd;}

.tbku th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>