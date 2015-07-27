<?php
$tiga = $this->uri->segment(3);
if(empty($tiga)){
?>
<nav class="breadcrumbs mini">
	    <ul>
	        <li><a href="<?php echo site_url();?>/kasironline"><i class="icon-home"></i></a></li>
	        <li class="active"><a href="<?php echo site_url();?>/kasironline/cekpertanyaan">Cek Pertanyaan</a></li>
	    </ul>
	</nav>
<hr>
<table class="table bordered hovered">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th>Jawab</th>
		<th colspan=2>Tindakan</th>
	</thead>
	<tbody>
		<?php
		$no=1;
		foreach ($pertanyaan as $data) {
				
			
			$sudah;
			if($data['jawaban']==""){
				$sudah = "<i class='icon-thumbs-down'></i><span class='no-phone'> Belum</span>";
			}
			else{
				$sudah = "<i class='icon-thumbs-up'></i><span class='no-phone'> Sudah</span>";
			}
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $data['nama'];?></td>
				<td><?php echo $sudah;?></td>
				<td><a href="<?php echo site_url().'/kasironline/cekpertanyaan/jawab/'.$data['id'];?>"><i title="Jawab" class="icon-reply"></i><span class="no-phone"> Jawab</span></a></td>
				<td><a href="<?php echo site_url().'/kasironline/cekpertanyaan/hapus/'.$data[id]	;?>"><i title="Hapus" class="icon-remove"></i><span class="no-phone"> Hapus</span></a></td>
			</tr>
			<?php
			$no++;
		}
		?>
	</tbody>
</table>

<?php
}
else if($tiga=='jawab'){
$empat = $this->uri->segment(4);
$this->load->helper('form');
$isi = $this->db->where('id',$empat);
$isi = $this->db->get('pertanyaan');
$hasil = $isi->row_array();
?>
<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/kasironline"><i class="icon-home"></i></a></li>
        <li class=""><a href="<?php echo site_url();?>/kasironline/cekpertanyaan">Cek Pertanyaan</a></li>
        <li class="active"><a href="">Jawab</a></li>
    </ul>
</nav>
<?php
echo form_open("kasironline/jawaban/".$empat);
?>
<input type="hidden" name="id" value="<?php echo $empat;?>">
<label>Pertanyaan</label>
<textarea type="text" data-transform='input-control' disabled><?php echo $hasil['pertanyaan'];?></textarea>
<label>Jawaban</label>
<textarea type="text" data-transform='input-control' name="jawaban"><?php echo $hasil['jawaban'];?></textarea>
<button class="place-right" type="submit" name="simpan">Simpan Jawaban</button>
<?php
echo form_close();
}
else if($tiga=='hapus'){
		$id=$this->uri->segment(4);
		$this->load->model('home_model');
		$this->home_model->hapus_jawaban($id);
		redirect(site_url()."/kasironline/cekpertanyaan");
}
?>