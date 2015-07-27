<?php
$tiga = $this->uri->segment(3);
if(empty($tiga)){
?>
<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/kasironline"><i class="icon-home"></i></a></li>
        <li class="active"><a href="<?php echo site_url();?>/kasironline/cekpembelian">Cek Pembelian</a></li>
    </ul>
</nav>
<hr>
<table class="table bordered hovered">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th class="no-phone">Stasiun Awal</th>
		<th class="no-phone">Stasiun Akhir</th>
		<th>Bayar</th>
		<th colspan=2>Tindakan</th>
	</thead>
	<tbody>
		<?php
		$no=1;
		foreach ($pembelian as $data) {
			$sudah;
			if($data['sudah_dibayar']=="1"){
				$sudah = "Sudah";
				$test = "<i class='icon-thumbs-up'></i><span class='no-phone'> Sudah</span>";
			}
			else{
				$sudah = "Belum";
				$test = "<i class='icon-thumbs-down'></i><span class='no-phone'> Belum</span>";
			}
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $data['nama'];?></td>
				<td class="no-phone"><?php echo $data['id_stasiun_awal'];?></td>
				<td class="no-phone"><?php echo $data['id_stasiun_akhir'];?></td>
				<td><?php echo $test;?></td>
				<td class="text-center"><a href="<?php echo site_url();?>/kasironline/cekpembelian/detail/<?php echo $data['id'];?>"><i class="icon-copy"></i><span class="no-phone"> Detail</span></span></a></td>
				<td class="text-center"><?php if($sudah=='Belum'){?><a href="<?php echo site_url();?>/kasironline/cekpembelian/setujui/<?php echo $data['id'];?>"><i class="icon-thumbs-up"></i> <span class="no-phone">Setujui</span></a><?php } else if($sudah=='Sudah'){?><a href="<?php echo site_url();?>/kasironline/cekpembelian/batalsetujui/<?php echo $data['id'];?>"><i class="icon-thumbs-down"></i><span class="no-phone"> Batal Setujui</span></a><?php }?></td>
			</tr>
			<?php
			$no++;
		}
		?>
	</tbody>
</table>
<?php
}
else if($tiga=="detail"){
	$empat = $this->uri->segment(4);
	$data = $this->db->where('id',$empat);
	$data = $this->db->get('pembelian');
	$hasil = $data->row_array();
	?>
	<nav class="breadcrumbs mini">
	    <ul>
	        <li><a href="<?php echo site_url();?>/kasironline"><i class="icon-home"></i></a></li>
	        <li class=""><a href="<?php echo site_url();?>/kasironline/cekpembelian">Cek Pembelian</a></li>
	    	<li class="active"><a href="">Detail Pembelian</a></li>
	    </ul>
	</nav>
	<fieldset>
		<legend>Detail Pembelian Tiket Kereta Api</legend>
		<table class="table">
			<tr>
				<td rowspan=0>Bukti <span class="no-phone">Pembayaran </span>: <br /><img class="size5" src="<?php echo base_url();?>bukti/<?php echo $hasil['bukti'];?>"></td>
			</tr>
			<tr>
				<td><span class="on-phone no-large no-desktop no-tablet">Nama : </span><span class="no-phone">Nama Pemesan : </span><?php echo $hasil['nama'];?></td>
			</tr>
			<tr class="no-phone">
				<td><span class="no-phone">Alamat : </span><?php echo $hasil['alamat'];?></td>
			</tr>
			<tr>
				<td><span class="on-phone no-large no-desktop no-tablet">Kereta : </span><span class="no-phone">Nama Kereta : </span><?php echo $hasil['id_kereta'];?></td>
			</tr>
			<tr>
				<td>Kelas : <?php echo $hasil['kelas'];?></td>
			</tr>
			<tr>
				<td><span class="on-phone no-large no-desktop no-tablet">Dari : </span><span class="no-phone">Stasiun Awal : </span><?php echo $hasil['id_stasiun_awal'];?></td>
			</tr>
			<tr>
				<td><span class="on-phone no-large no-desktop no-tablet">Ke : </span><span class="no-phone">Stasiun Akhir : </span><?php echo $hasil['id_stasiun_akhir'];?></td>
			</tr>
			<tr>
				<td><span class="no-phone">Metode : </span><?php echo $hasil['metode'];?></td>
			</tr>
			<tr class="no-phone">
				<td><span class="no-phone">Kode Pembelian : </span><?php 
				$this->load->helper('text');
				$a = character_limiter($hasil['kode_pembelian'],8);
				echo $a;?></td>
			</tr>
			<tr>
				<td><span class="no-phone">E-Mail : </span><?php echo $hasil['email'];?></td>
			</tr>
			<tr>
				<td><span class="no-phone">No Telepon : </span><?php echo $hasil['no_telepon'];?></td>
			</tr>
		</table>
	</fieldset>
	<div class="listview">
	<?php
}
else if($tiga=="setujui"){
	$empat = $this->uri->segment(4);
	$id = $empat;
	$this->load->model('home_model');
	$this->home_model->setujui($id);

		$query3 = $this->db->where('id',$id);
		$query3 = $this->db->get('pembelian');
		$hasil3 = $query3->row_array();
		$this->load->library('email');
		$this->email->from('no-reply@tss.labsoftware.net', 'PT. Kereta Api Indonesia (Persero)');
		$this->email->to($hasil3['email']); 
		$this->email->subject('Konfirmasi Tiket Kereta Api');
		$this->email->message('Yang terhormat Saudara '.$hasil3['nama'].',<br />
			Kami telah menerima permintaan tiket kereta api yang Saudara telah pesan untuk keberangkatan tanggal '.$hasil3['tanggal'].
			' dengan menggunakan kereta '.$hasil3['id_kereta'].' dan kelas '.$hasil3['kelas'].'. Tiket yang Anda pesan dapat diunduh pada link berikut ini'.
			'<a href=http://tss.labsoftware.net/cetak/tiket/'.$hasil3['id'].'>Unduh Tiket</a><br />Detail tiket : <br />Kode Transaksi : '.$hasil3['kode_pembelian'].'<br />Kata Sandi : '.$hasil3['kode_pembelian'].'<br />'.
			'Terima kasih telah menggunakan layanan kami.');	
		$this->email->send();
	redirect(site_url().'/kasironline/cekpembelian');
}
else if($tiga=="batalsetujui"){
	$id = $empat = $this->uri->segment(4);
	$this->load->model('home_model');
	$this->home_model->batalsetujui($id);
	redirect(site_url().'/kasironline/cekpembelian');
}
?>