<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/home/"><i class="icon-home"></i></a></li>
        <li class="active"><a href="<?php echo site_url();?>/home/tiket">Tiket Kereta Api</a></li>
    </ul>
</nav>
<legend>Jadwal Kereta Api</legend>
<div class="tab-control padding20" data-role="tab-control">
    <ul class="tabs">
        <li class="active"><a href="#beli">Beli</a></li>
        <li class=""><a href="#pesan">Pesan</a></li>
        <li class=""><a href="#konfirmasi">Konfirmasi</a></li>
    </ul>

    <div class="frames">
        <div id="beli"  class="frame" style="display: none;">
        <?php echo form_open('home/beli');?>
            <fieldset>
                <label class="no-phone">Nama Lengkap</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" required name="nama_lengkap" placeholder="Nama Lengkap">
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label class="no-phone">Alamat</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" required name="alamat" placeholder="Alamat" autofocus="">
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label class="no-phone">E-Mail</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" required name="email" placeholder="E-Mail" autofocus="">
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label class="no-phone">No Telepon</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" required name="no_telepon" placeholder="No Telepon" autofocus="">
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label class="no-phone">Stasiun Awal</label>
                <div class="input-control select">
                    <select name="sta_awal">
                        <?php 
                            foreach ($stasiun as $row) {
                                echo "<option value='$row[nama_stasiun]'>$row[nama_stasiun]</option>";
                            }
                        ?>
                    </select>
                </div>
                <label class="no-phone">Stasiun Akhir</label>
                <div class="input-control select">
                    <select name="sta_akhir">
                        <?php 
                            foreach ($stasiun as $row) {
                                echo "<option value='$row[nama_stasiun]'>$row[nama_stasiun]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="place-right no-phone">
                    <input type="reset" value="Reset">
                    <input type="submit" class="primary" value="Tampilkan">
                </div>
                <div style="width:100%" class="place-right on-phone no-large no-desktop no-tablet no-tablet-potrait">
                    <button style="width:100%" type="reset">Reset</button>
                    <button style="width:100%" class="primary" type="submit">Tampilkan</button>
                </div>
            </fieldset>
        <?php echo form_close();?>
        </div>
        <div id="konfirmasi" class="frame" style="display:none;">
            <?php echo form_open_multipart('home/konfirmasitiket');?>
            <label>Kode Pemesanan : </label><input required placeholder="Kode Pemesanan" data-transform="input-control" type="text" name="kode">
            <label>Bukti Pembayaran : </label><input required placeholder="Bukti Pembayaran" data-transform="input-control" type="file" name="bukti">
            <label>Angka Unik : </label><input required placeholder="Angka Unik" data-transform="input-control" type="text" name="unik">
            <div class="place-right">
            <button type="reset">Reset</button>
            <button type="submit" class="primary">Konfirmasi</button>
            </div>
            <?php echo form_close();?>
        </div>
        <div id="pesan" class="frame" style="display: none;">
            <?php echo form_open('home/pesan');?>
            <fieldset>
                <label class="no-phone">Nama Lengkap</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" required name="nama_lengkap" placeholder="Nama Lengkap">
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label class="no-phone">Alamat</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" required name="alamat" placeholder="Alamat" autofocus="">
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label class="no-phone">E-Mail</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" required name="email" placeholder="E-Mail" autofocus="">
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label class="no-phone">No Telepon</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" required name="no_telepon" placeholder="No Telepon" autofocus="">
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label class="no-phone">Stasiun Awal</label>
                <div class="input-control select">
                    <select name="sta_awal">
                        <?php 
                            foreach ($stasiun as $row) {
                                echo "<option value='$row[nama_stasiun]'>$row[nama_stasiun]</option>";
                            }
                        ?>
                    </select>
                </div>
                <label class="no-phone">Stasiun Akhir</label>
                <div class="input-control select">
                    <select name="sta_akhir">
                        <?php 
                            foreach ($stasiun as $row) {
                                echo "<option value='$row[nama_stasiun]'>$row[nama_stasiun]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="place-right no-phone">
                    <input type="reset" value="Reset">
                    <input type="submit" class="primary" value="Tampilkan">
                </div>
                <div style="width:100%" class="place-right on-phone no-large no-desktop no-tablet no-tablet-potrait">
                    <button style="width:100%" type="reset">Reset</button>
                    <button style="width:100%" class="primary" type="submit">Tampilkan</button>
                </div>
            </fieldset>
        <?php echo form_close();?>
        </div>
    </div>
</div>