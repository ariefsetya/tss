	<?php
		$id_data = $this->uri->segment(4);
		$id_dat = $this->uri->segment(3);
		$id = $this->db->query("select*from detail_jadwal where id='$id_dat'");
		$res_id = $id->row_array();
		$id2 = $this->db->query("select*from pembelian where id='$id_data'");
		$res_id2 = $id2->row_array();
		$stasiun_awal = $res_id2['id_stasiun_awal'];
		$stasiun_akhir = $res_id2['id_stasiun_akhir'];
	?>
<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/kasiroffline/"><i class="icon-home"></i></a></li>
        <li class=""><a href="<?php echo site_url();?>/kasiroffline/pembeliantiket">Pembelian Tiket Kereta Api</a></li>
    	<li class=""><a href="">Hasil Pencarian</a></li>
    	<li class="active"><a href="">Konfirmasi</a></li>
    </ul>
</nav>
<legend>Konfirmasi Tiket Kereta Api</legend>
<?php echo form_open('kasiroffline/perbaruipembelian');?>
<table class="table">
	<input type="hidden" name="id_data" value="<?php echo $id_data;?>"/>
	<input type="hidden" name="id_dat" value="<?php echo $id_dat;?>"/>
	<tr>
		<td style="width:150px;">Nama</td>
		<td></td>
		<td><?php echo $res_id2['nama'];?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td></td>
		<td><?php echo $res_id2['alamat'];?></td>
	</tr>
	<tr>
		<td>Stasiun Awal</td>
		<td></td>
		<td><?php echo $stasiun_awal;?></td>
	</tr>
	<tr>
		<td>Stasiun Tujuan</td>
		<td></td>
		<td><?php echo $stasiun_akhir;?></td>
	</tr>
	<tr>
		<td>Tanggal Keberangkatan</td>
		<td></td>
		<td><div class="input-control text">
		    <input name="tanggal" type="date"></button>
		</div></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td></td>
		<td><select required name="kelas" data-transform="input-control">
			<option value="Eksekutif">Eksekutif</option>
			<option value="Bisnis">Bisnis</option>
			<option value="Ekonomi">Ekonomi</option>
		</select></td>
	</tr>
	<tr>
		<td>Jumlah Dewasa</td>
		<td></td>
		<td><select required name="dewasa" data-transform="input-control">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></td>
	</tr>
	<tr>
		<td>Jumlah Anak</td>
		<td></td>
		<td><select required name="anak" data-transform="input-control">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></td>
	</tr>
	<tr>
		<td>Jumlah Infant</td>
		<td></td>
		<td><select required name="infant" data-transform="input-control">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><button class="place-right primary" type="submit">Lanjutkan</button></td>
	</tr>
</table>
<?php form_close();?>