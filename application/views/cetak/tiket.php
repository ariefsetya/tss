<?php
$data = $tiket;
?>
<table border="0" style="font-family:Segoe UI Light;margin-left:auto;margin-right:auto;width:800px;border:1px solid #2d89ef;">
	<tr>
		<td colspan=3><img width="80" src="<?php echo base_url();?>/assets/images/tentang_logo.jpg"/> <b>PT. Kereta Api Indonesia (Persero)</b><h2>Tiket Kereta Api</h2></td>
	</tr>
	<tr>
		<td style="width:200px">Nama Pemesan</td>
		<td>:</td>
		<td><?php echo $data['nama'];?></td>
	</tr>
	<tr>
		<td style="width:200px">Kereta</td>
		<td>:</td>
		<td><?php echo $data['id_kereta'];?></td>
	</tr>
	<tr>
		<td style="width:200px">Kelas<hr></td>
		<td>:<hr></td>
		<td><?php echo $data['kelas'];?><hr></td>
	</tr>
	<tr>
		<td style="width:200px"><b>Detail Penumpang</b></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td style="width:200px">Dewasa</td>
		<td>:</td>
		<td><?php echo $data['dewasa'];?></td>
	</tr>
	<tr>
		<td style="width:200px">Anak</td>
		<td>:</td>
		<td><?php echo $data['anak'];?></td>
	</tr>
	<tr>
		<td style="width:200px">Infant<hr></td>
		<td>:<hr></td>
		<td><?php echo $data['infant'];?><hr></td>
	</tr>
	<tr>
		<td colspan=2><b>Detail Keberangkatan</b></td>
		<td></td>
	</tr>
	<tr>
		<td style="width:200px">Stasiun Awal</td>
		<td>:</td>
		<td><?php echo $data['id_stasiun_awal'];?></td>
	</tr>
	<tr>
		<td style="width:200px">Stasiun Akhir</td>
		<td>:</td>
		<td><?php echo $data['id_stasiun_akhir'];?></td>
	</tr>
	<tr>
		<td style="width:200px">Tanggal Keberangkatan</td>
		<td>:</td>
		<td><?php echo $data['tanggal'];?></td>
	</tr>
</table>