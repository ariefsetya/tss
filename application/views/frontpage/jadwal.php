<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/home/"><i class="icon-home"></i></a></li>
        <li class="active"><a href="<?php echo site_url();?>/home/jadwal">Jadwal Kereta Api</a></li>
    </ul>
</nav>
<legend>Jadwal Kereta Api</legend>
<table class="table bordered hovered">
	<thead>
		<th>Nama Kereta</th>
		<th>Waktu Tiba</th>
		<th>Waktu Berangkat</th>
	</thead>
	<?php
	foreach($stasiun as $row){
	?>
	<tbody>
		<tr>
			<td colspan=3><b>Stasiun : <?php echo $row['nama_stasiun'];?></b></td>
		</tr>
	</tbody>
	<?php
	$this->load->model('home_model');
	$my = $this->home_model->get_jadwal_stasiun($row['nama_stasiun']);
	foreach($my as $key){
	?>
	<tbody>
		<tr>
			<td><?php echo $key['id_kereta'];?></td>
			<td><?php echo $key['tiba'];?></td>
			<td><?php echo $key['berangkat'];?></td>
		</tr>
	</tbody>
	<?php
		}
	}
	?>
</table>