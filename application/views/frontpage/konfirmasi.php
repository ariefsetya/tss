<?php
$id_data = $this->uri->segment(3);
$query1 = $this->db->query("select*from pembelian where id='$id_data'");
$hasil1 = $query1->row_array();
$query2 = $this->db->query("select*from detail_kereta where id_kereta='$hasil1[id_kereta]' and id_kelas='$hasil1[kelas]'");
$hasil2 = $query2->row_array();

$dewasa = $hasil1['dewasa']*$hasil2['dewasa'];

$anak = $hasil1['anak']*$hasil2['anak'];

$infant = $hasil1['infant']*$hasil2['bayi'];
?>
<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/home/"><i class="icon-home"></i></a></li>
        <li class=""><a href="<?php echo site_url();?>/home/tiket">Tiket Kereta Api</a></li>
    	<li class=""><a href="">Hasil Pencarian</a></li>
    	<li class=""><a href="">Konfirmasi</a></li>
    	<li class="active"><a href="">Pembayaran</a></li>
    </ul>
</nav>
<legend>Detail Pembayaran Tiket Kereta Api</legend>
<table class="">
	<tr>
		<td style="width:100px;">Nama Kereta</td>
		<td style="width:50px;">:</td>
		<td><?php echo $hasil1['id_kereta'];?></td>
	</tr>
	<tr>
		<td style="width:100px;">Kelas</td>
		<td style="width:50px;">:</td>
		<td><?php echo $hasil1['kelas'];?></td>
	</tr>
	<tr>
		<td style="width:100px;">Dewasa</td>
		<td style="width:50px;">:</td>
		<td><div class="place-right"><?php echo $dewasa;?></div></td>
	</tr>
	<tr>
		<td style="width:100px;"></td>
		<td style="width:50px;"></td>
		<td></td>
	</tr>
	<tr>
		<td>Anak</td>
		<td>:</td>
		<td><div class="place-right"><?php echo $anak;?></div></td>
	</tr>
	<tr>
		<td>Infant</td>
		<td>:</td>
		<td><div class="place-right"><?php echo $infant;?></div></td>
	</tr>
	<tr>
		<td>Total</td>
		<td>:</td>
		<td style="border-top:1px solid #2d89ef;"><div class="place-right"><?php echo $dewasa+$anak+$infant;?></div></td>
	</tr>
</table>
<hr>

<legend>Informasi Nomor Rekening</legend>
Bank BNI Cabang Jatinegara<br />
0317059671<br />
a.n. Arief Setya
<hr>

<?php echo form_open_multipart('home/simpan_konfirmasi/'.$id_data);?>
<legend>Konfirmasi Tiket Kereta Api</legend>
<table class="table">
	<tr>
		<td width="450px">Bukti Pembayaran</td>
		<td></td>
		<td><input required type="file" name="bukti" data-transform="input-control">
		</input></td>
	</tr>
	<tr>
		<td>Angka Unik (3 Angka terakhir dari biaya transfer, misalnya 123)</td>
		<td></td>
		<td><input required type="text" name="unik" data-transform="input-control">
		</input></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><button class="place-right primary" name="konfirmasi">Konfirmasi</button></td>
	</tr>
</table>
<?php echo form_close();?>