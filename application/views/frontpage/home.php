<legend>Artikel Terbaru...</legend>
<?php
foreach ($data as $key) {
?>
<div class="panel">
    <div class="panel-header">
        <b><?php echo $key['judul'];?></b>

    <div class="place-right"><b>#<?php echo $key['id'];?></b></div>
    </div>
    <div class="panel-content">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $key['isi'];?></p>
    </div>
</div>	  
<hr>
<?php
}
?>