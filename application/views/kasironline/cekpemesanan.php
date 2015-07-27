<nav class="breadcrumbs mini">
	    <ul>
	        <li><a href="<?php echo site_url();?>/kasironline"><i class="icon-home"></i></a></li>
	        <li class="active"><a href="<?php echo site_url();?>/kasironline/cekpemesanan">Cek Pemesanan</a></li>
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
		<th>Tindakan</th>
	</thead>
	<tbody>
		<?php
		$no=1;
		foreach ($pemesanan as $data) {
				
			
			$sudah;
			if($data['sudah_dibayar']=="1"){
				$sudah = "Sudah";
			}
			else{
				$sudah = "Belum";
			}
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $data['nama'];?></td>
				<td class="no-phone"><?php echo $data['id_stasiun_awal'];?></td>
				<td class="no-phone"><?php echo $data['id_stasiun_akhir'];?></td>
				<td><?php echo $sudah;?></td>
				<td><a href="<?php echo site_url();?>/kasironline/hapus/<?php echo $data['id'];?>"><i title="Hapus" class="icon-remove"></i> <span class="no-phone"> Hapus</span></a></td>
			</tr>
			<?php
			$no++;
		}
		?>
	</tbody>
</table>

