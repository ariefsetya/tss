<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/home/"><i class="icon-home"></i></a></li>
        <li class="active"><a href="<?php echo site_url();?>/home/faq">Pertanyaan Berulang</a></li>
    </ul>
</nav>
<?php echo form_open('home/tanyakan');?>
<legend>Ajukan pertanyaan, saran atau pendapat</legend>
<fieldset>
	<label class="no-phone">Nama</label>
	<input type="text" required name="nama" data-transform="input-control" placeholder="Nama"/>
	<label class="no-phone">Alamat (Tidak akan ditampilkan)</label>
	<input type="text" required name="alamat" data-transform="input-control" placeholder="Alamat"/>
	<label class="no-phone">E-Mail (Tidak akan ditampilkan)</label>
	<input type="text" required name="email" data-transform="input-control" placeholder="E-Mail"/>
	<label class="no-phone">Pertanyaan</label>
	<textarea required data-transform="input-control"  name="pertanyaan" placeholder="Pertanyaan"></textarea>
	<input class="place-right primary" type="submit" name="save" value="Kirim Pertanyaan"/>
</fieldset>
<?php echo form_close();?>