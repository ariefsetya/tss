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
        <li><a href="<?php echo site_url();?>/kasiroffline/"><i class="icon-home"></i></a></li>
        <li class=""><a href="<?php echo site_url();?>/kasiroffline/pembeliantiket">Tiket Kereta Api</a></li>
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
		<td style="width:50px;">: Rp.</td>
		<td><div class="place-right"><?php echo $dewasa;?></div></td>
	</tr>
	<tr>
		<td style="width:100px;"></td>
		<td style="width:50px;"></td>
		<td></td>
	</tr>
	<tr>
		<td>Anak</td>
		<td>: Rp.</td>
		<td><div class="place-right"><?php echo $anak;?></div></td>
	</tr>
	<tr>
		<td>Infant</td>
		<td>: Rp.</td>
		<td><div class="place-right"><?php echo $infant;?></div></td>
	</tr>
	<tr>
		<td>Total</td>
		<td>: Rp.</td>
		<td style="border-top:1px solid #2d89ef;"><div class="place-right"><?php echo $dewasa+$anak+$infant;?></div></td>
	</tr>
</table>
<hr>
<a target="_blank" href="<?php echo site_url();?>/cetak/tiket/<?php echo $id_data;?>"><button>Cetak Tiket</button></a>