<center>
    <?php echo form_open('home/cekmasuk');?>
    <div  style="max-width:500px;">
        <fieldset>
            <legend>Masuk</legend>
            <label class="no-phone">Nama Pengguna</label>
            <div class="input-control text" data-role="input-control">
                <input type="text" required name="nama_pengguna" placeholder="Nama Pengguna">
                <button class="btn-clear" tabindex="-1" type="button"></button>
            </div>
            <label class="no-phone">Kata Sandi</label>
            <div class="input-control password" data-role="input-control">
                <input type="password" required name="kata_sandi" placeholder="Kata Sandi" autofocus="">
                <button class="btn-reveal" tabindex="-1" type="button"></button>
            </div>
            <div class="place-right">
            	<input type="reset" value="Reset">
            	<button type="submit">Masuk</button>
        	</div>
        </fieldset>
    </div>
    <?php echo form_close();?>
</center>