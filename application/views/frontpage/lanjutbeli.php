<nav class="breadcrumbs mini">
    <ul>
        <li><a href="<?php echo site_url();?>/home/"><i class="icon-home"></i></a></li>
        <li class=""><a href="<?php echo site_url();?>/home/tiket">Tiket Kereta Api</a></li>
    	<li class="active"><a href="">Hasil Pencarian</a></li>
    </ul>
</nav>
<?php
		echo "<legend>Hasil Pencarian</legend>";
		$id_data = $this->uri->segment(3);

		$select = $this->db->query("select*from pembelian where id='$id_data'");
		$res = $select->row_array();
		$stasiun_awal = $res['id_stasiun_awal'];
		$stasiun_akhir = $res['id_stasiun_akhir'];
		$jadwal_awal = $this->db->query("select*from detail_jadwal where id_stasiun = '$stasiun_awal'");
		$jadwal_akhir = $this->db->query("select*from detail_jadwal where id_stasiun = '$stasiun_akhir'");
		$id_awal = $jadwal_awal->row_array();
		$id_akhir = $jadwal_akhir->row_array();
		$desc = "desc";
		if($id_awal['id']<$id_akhir['id']){
		$desc = "asc";
		}

		$kereta = $this->db->query("select*from kereta");
		$res_trai=$kereta->result_array();
		foreach($res_trai as $res_train){
		$jadwal = mysql_query("select*from detail_jadwal where id_kereta='$res_train[nama_kereta]' and id_stasiun = '$stasiun_awal' order by id $desc");
		while($res_jadwal = mysql_fetch_array($jadwal)){
			$id_jadwal = $res_jadwal['id_jadwal'];
			$id_kereta = $res_jadwal['id_kereta'];
			$berangkat = $res_jadwal['tiba'];
			$sel_sta_akhir = mysql_query("select*from detail_jadwal where id_kereta='$res_train[nama_kereta]' and id_stasiun='$stasiun_akhir' order by id $desc");
			$res_sel_sta_akhir = mysql_fetch_array($sel_sta_akhir);
			if($id_jadwal==$res_sel_sta_akhir['id_jadwal']){
				$id = mysql_query("select*from jadwal where nama_jadwal='$id_jadwal'");
				$res_id = mysql_fetch_array($id);
				$tiba = $res_sel_sta_akhir['tiba'];

				?>
				<div class='listview-outlook'>
				    <a href='<?php echo site_url();?>/home/ambilpembelian/<?php echo $res_id[id];?>/<?php echo $id_data;?>' class='list'>
				        <div class='list-content'>
				        <?php echo $id_kereta;?><br />
				        &nbsp;&nbsp;Berangkat : <?php echo $berangkat;?><br />
				        &nbsp;&nbsp;Tiba : <?php echo $tiba;?>
				        <div class='place-right'>
				        <button>Beli</button></div>
				        </div>
				    </a>
				</div>
				<?php
				}

			}
		}
?>