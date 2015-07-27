<legend>Set Kereta</legend>
<label class="no-phone">Nama Kereta</label>
<div class="">
<?php echo form_open('masinis/set_kereta');?>
<div class="input-control select">
    <select name="kereta">
    	<?php foreach ($kereta as $key) {
    		echo "<option value='$key[nama_kereta]'>$key[nama_kereta]</option>";
    	}
    	?>
    </select>
</div>
<div class="place-right">
	<button class="primary" type="submit">Kirim</button>
</div>
<?php
echo form_close();
?>
</div>