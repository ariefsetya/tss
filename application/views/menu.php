<?php
$_SESSION['status']=$this->session->userdata('status');
?>
<style>
    li{
        margin-left: 1px;
    }
    h2{
        font-family:Segoe UI Light;
    }
    .breadcumb{
        font-size:12pt;
    }
    body{
        font-size:12pt;
    }
</style>
<div class="bg-white">
    <div class="bg-white container">
        <div class="" style="font-size:150%;">
            <div><img style="min-width:100px;width:15%;" src="<?php echo base_url();?>assets/images/tentang_logo.jpg"/>
            <span class="no-phone on-tablet on-large on-desktop" style="color:blue;font-family:Segoe UI Semilight;">PT. Kereta Api Indonesia (Persero)</span><span class="on-phone no-tablet no-large no-desktop" style="color:blue;font-family:Segoe UI Light;">PT. KAI</span></div>
        </div>
    </div>
</div>
<div class="navigation-bar bg-blue">
    <div class="navigation-bar-content bg-blue container">
        <a href="" class="element"><span class=""></span></a>
        <a class="element1 pull-menu" href="<?php echo site_url();?>/home"></a>

        <?php if($_SESSION['status']==""){ ?>
        <ul class="element-menu bg-blue">
            <li><a href="<?php echo site_url();?>/home"><i class="icon-home"></i> Home</a></li>
            <li><a href="<?php echo site_url();?>/home/tiket"><i class="icon-newspaper"></i> Tiket Kereta Api</a></li>
            <li><a href="<?php echo site_url();?>/home/jadwal"><i class="icon-clipboard-2"></i> Jadwal Kereta Api</a></li>
            <li><a href="<?php echo site_url();?>/home/kontak"><i class="icon-phone"></i> Kontak Kami</a></li>
            <li><a href="<?php echo site_url();?>/home/faq"><i class="icon-help"></i> FAQ</a></li>
        </ul>
        <ul class="element-menu place-right">
            <li><a href="<?php echo site_url();?>/home/masuk"><i class="icon-enter"></i> Masuk</a></li>
        </ul>
        <?php }
        else if($_SESSION['status']=="Admin"){
        ?>
        <ul class="element-menu bg-blue">
            <li><a href="<?php echo site_url();?>/admin"><i class="icon-home"></i> Home</a></li>
            <li><a href="<?php echo site_url();?>/admin/datastasiun"><i class="icon-diamond"></i> Data Stasiun</a></li>
            <li><a href="<?php echo site_url();?>/admin/datakereta"><i class="icon-bus"></i> Data Kereta Api</a></li>
            <li><a href="<?php echo site_url();?>/admin/datajadwal"><i class="icon-clipboard-2"></i> Data Jadwal Kereta Api</a></li>
            <li><a href="<?php echo site_url();?>/admin/datapengguna"><i class="icon-user-3"></i> Data Pengguna</a></li>
        </ul>
        <?php
        }
        else if($_SESSION['status']=="Kasir Online"){
        ?>
        <ul class="element-menu bg-blue">
            <li><a class="" href="<?php echo site_url();?>/kasironline/cekpemesanan"><i class="icon-diamond"></i> Cek Pemesanan</a></li>
            <li><a href="<?php echo site_url();?>/kasironline/cekpembelian"><i class="icon-bus"></i> Cek Pembelian</a></li>
            <li><a href="<?php echo site_url();?>/kasironline/cekpertanyaan"><i class="icon-clipboard-2"></i> Cek Pertanyaan</a></li>
        </ul>
        <?php
        }
        else if($_SESSION['status']=="Kasir Offline"){
        ?>
        <ul class="element-menu bg-blue">
            <li><a class="" href="<?php echo site_url();?>/kasiroffline/pembeliantiket"><i class="icon-diamond"></i> Pembelian Tiket</a></li>
            <li><a href="<?php echo site_url();?>/kasiroffline/pengambilantiket"><i class="icon-clipboard-2"></i> Pengambilan Tiket</a></li>
        </ul>
        <?php
        }
        else if($_SESSION['status']=="Masinis"){
        ?>
        <ul class="element-menu bg-blue">
            <li><a class="" href="<?php echo site_url();?>/masinis/setkereta"><i class="icon-diamond"></i> Set Kereta</a></li>
            <li><a href="<?php echo site_url();?>/masinis/infokereta"><i class="icon-bus"></i> Info Kereta</a></li>
        </ul>
        <?php
        }
        if($_SESSION['status']!=""){?>
        <ul class="element-menu place-right">
            <li><a href="<?php echo site_url();?>/home/keluar"><i class="icon-exit"></i> Keluar</a></li>
        </ul>
        <?php } ?>
    </div>
</div>