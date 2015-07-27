<legend>Info Kereta</legend>
<label class="">Kereta : <?php echo $this->session->userdata('kereta');?></label>
<div class="">
<?php echo form_open('masinis/info_kereta');?>
<div class="input-control textarea">
	<textarea style="height:200px;" name="info"></textarea>
</div>
<div class="place-right">
	<button class="primary" type="submit">Kirim</button>
</div>
<?php
echo form_close();
?>
</div>