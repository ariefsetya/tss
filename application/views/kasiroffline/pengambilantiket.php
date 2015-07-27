<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/kasiroffline/"><i class="icon-home"></i></a></li>
        <li class=""><a href="<?php echo site_url();?>/kasiroffline/pengambilantiket">Pengambilan Tiket Kereta Api</a></li>
    </ul>
</nav>
<?php echo form_open('kasiroffline/bayar');?>
<label class="no-phone">Kode Pemesanan</label>
<input placeholder="Kode Pemesanan" data-transform="input-control" name="kode">
<button class="primary place-right" type="submit">Bayar</button>	
<?php echo form_close();?>