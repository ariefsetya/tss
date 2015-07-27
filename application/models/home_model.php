<?php
class Home_model extends CI_Model {

	function cekkasir(){
		$ses = $this->session->userdata('status');
		if($ses!="Kasir Online"){
			redirect(site_url().'/home');
		}
	}
	function cekmasinis(){
		$ses = $this->session->userdata('status');
		if($ses!="Masinis"){
			redirect(site_url().'/home');
		}
	}
	function simpan($data){
		$this->db->insert('siswa',$data);
	}
	function set_info($data){
		$this->db->insert('info_kereta',$data);
	}
	function artikel(){
		$query = $this->db->limit(8);
		$query = $this->db->get('artikel');
		$hasil = $query->result_array();
		return $hasil;
	}
	function simpan_pertanyaan($data){
		$this->db->insert('pertanyaan',$data);
	}
	function galeri(){
		$query = $this->db->get('galeri');
		$hasil = $query->result_array();
		return $hasil;
	}
	function cek_pemesanan(){
		$query = $this->db->where('metode','Pemesanan Online');
		$query = $this->db->get('pembelian');
		$hasil = $query->result_array();
		return $hasil;
	}
	function cek_pembelian(){
		$query = $this->db->where('metode','Pembelian Online');
		$query = $this->db->get('pembelian');
		$hasil = $query->result_array();
		return $hasil;
	}
	function get_kereta(){
		$query = $this->db->get('kereta');
		$hasil = $query->result_array();
		return $hasil;
	}
	function cek_pertanyaan(){
		$query = $this->db->get('pertanyaan');
		$hasil = $query->result_array();
		return $hasil;
	}
	function perbarui_jawaban($data,$id){
		$this->db->where('id',$id);
		$this->db->update('pertanyaan',$data);
	}
	function hapus_jawaban($id){
		$this->db->where('id',$id);
		$this->db->delete('pertanyaan');
	}
	function setujui($id){
		$data = array('sudah_dibayar'=>'1');
		$this->db->where('id',$id);
		$this->db->update('pembelian',$data);
	}
	function batalsetujui($id){
		$data = array('sudah_dibayar'=>'0');
		$this->db->where('id',$id);
		$this->db->update('pembelian',$data);
	}
	function get_stasiun(){
		$query = $this->db->get('stasiun');
		$hasil = $query->result_array();
		return $hasil;
	}
	function get_jadwal_stasiun($id){
		$query = $this->db->where('id_stasiun',$id);
		$query = $this->db->get('detail_jadwal');
		$hasil = $query->result_array();
		return $hasil;
	}
	function simpan_pembeli($data){
		$this->db->insert('pembelian',$data);
	}
	function update_data_pembeli($data,$id){
		$this->db->where('id',$id);
		$this->db->update('pembelian',$data);
	}
	function get_wilayah(){
		$query = $this->db->get('wilayah');
		$hasil = $query->result_array();
		return $hasil;
	}
	function cekin($data){
		$query = $this->db->where('nama_pengguna',$data['nama_pengguna']);
		$query = $this->db->get('pengguna');
		$hasil = $query->row_array();
		if(empty($hasil)){
			$hasil = "gagal";
		}
		$sandi = $hasil['kata_sandi'];
		if($data['kata_sandi']==$sandi){
			$this->session->set_userdata('nama_pengguna',$hasil['nama_pengguna']);
			$this->session->set_userdata('kata_sandi',$hasil['kata_sandi']);
			$this->session->set_userdata('status',$hasil['status']);
			$hasil = "sukses";
		}
		else{
			$hasil ="gagal";
		}
	return $hasil;
	}

}