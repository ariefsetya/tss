<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('home_model');
		$artikel['data'] = $this->home_model->artikel();
		$this->load->view('header'); 
		$this->load->view('frontpage/home',$artikel);
		$this->load->view('footer'); 
	}
	public function tiket()
	{
		$this->load->helper('form');
		$this->load->model('home_model');
		$data['stasiun'] = $this->home_model->get_stasiun();
		$this->load->view('header');
		$this->load->view('frontpage/tiket',$data);
		$this->load->view('footer'); 
	}
	public function tidakvalid(){
		$this->load->view('header');
		$this->load->view('frontpage/tidakvalid');
		$this->load->view('footer'); 
	}
	public function pesan()
	{	
		$this->load->model('home_model');
		$data['id_stasiun_awal']=$this->input->post('sta_awal');
		$data['id_stasiun_akhir']=$this->input->post('sta_akhir');
		if($data['id_stasiun_awal']==$data['id_stasiun_akhir']){
			redirect('home/tidakvalid');
		}
		$data['no_telepon']=$this->input->post('no_telepon');
		$data['nama']=$this->input->post('nama_lengkap');
		$data['alamat']=$this->input->post('alamat');
		$data['email']=$this->input->post('email');
		$data['metode']='Pemesanan Online';
		$data['sudah_dibayar']='0';
		$this->home_model->simpan_pembeli($data);
		$id=mysql_insert_id();
		redirect('home/lanjutpesan/'.$id);
	}
	public function selesaipemesanan()
	{
		$this->load->view('header');
		$this->load->view('frontpage/selesaipemesanan');
		$this->load->view('footer');
	}
	public function selesaipembelian()
	{
		$this->load->view('header');
		$this->load->view('frontpage/selesaipembelian');
		$this->load->view('footer');
	}
	public function lanjutpesan()
	{
		$this->load->view('header');
		$this->load->view('frontpage/lanjutpesan');
		$this->load->view('footer');
	}
	public function lanjutbeli()
	{
		$this->load->view('header');
		$this->load->view('frontpage/lanjutbeli');
		$this->load->view('footer');
	}
	public function ambilpemesanan()
	{
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('frontpage/ambilpemesanan');
		$this->load->view('footer');
	}
	public function ambilpembelian()
	{
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('frontpage/ambilpembelian');
		$this->load->view('footer');
	}
	public function jadwal()
	{
		$this->load->model('home_model');
		$data['stasiun'] = $this->home_model->get_stasiun();
		$this->load->view('header');
		$this->load->view('frontpage/jadwal',$data);
		$this->load->view('footer');
	}
	public function perbaruipemesanan()
	{
		$data['tanggal'] = $this->input->post('tanggal');
		$id_data = $this->input->post('id_data');
		$data['id_jadwal'] = $this->input->post('id_dat');
		$data['kelas']=$this->input->post('kelas');
		$query = $this->db->query("select*from jadwal where id='$data[id_jadwal]'");
		$hasil = $query->row_array();
		$query2 = $this->db->query("select*from detail_jadwal where id_jadwal='$hasil[nama_jadwal]'");
		$hasil2 = $query2->row_array();
		

		$data['id_kereta']=$hasil2['id_kereta'];
		$data['dewasa']=$this->input->post('dewasa');
		$data['anak']=$this->input->post('anak');
		$data['infant']=$this->input->post('infant');
		$data['kode_pembelian']=md5($id_data);

		$this->load->model('home_model');
		$this->home_model->update_data_pembeli($data,$id_data);
		
		$query3 = $this->db->where('id',$id_data);
		$query3 = $this->db->get('pembelian');
		$hasil3 = $query3->row_array();
		$this->load->library('email');
		$this->email->from('no-reply@tss.labsoftware.net', 'PT. Kereta Api Indonesia (Persero)');
		$this->email->to($hasil3['email']); 
		$this->email->subject('Konfirmasi Tiket Kereta Api');
		$this->email->message('Yang terhormat Saudara '.$hasil3['nama'].',<br />
			Kami telah menerima permintaan tiket kereta api yang Saudara telah pesan untuk keberangkatan tanggal '.$hasil3['tanggal'].
			' dengan menggunakan kereta '.$hasil3['id_kereta'].' dan kelas '.$hasil3['kelas'].'. Tiket yang Anda pesan dapat diunduh pada link berikut ini'.
			'<a href=http://tss.labsoftware.net/cetak/tiket/'.$hasil3['id'].'>Unduh Tiket</a><br />Detail tiket : <br />Kode Transaksi : '.$hasil3['kode_pembelian'].'<br />Kata Sandi : '.$hasil3['kode_pembelian'].'<br />'.
			'Terima kasih telah menggunakan layanan kami.');	
		$this->email->send();

		redirect('home/selesaipemesanan');
	}
	public function simpan_konfirmasi()
	{
		$this->load->model('home_model');
		$id = $this->uri->segment(3);
		$folder = $_FILES['bukti']['name'];
		$lokasi = $_FILES['bukti']['tmp_name'];
		move_uploaded_file($lokasi,"bukti/$id$folder");
		$data['unik'] = $this->input->post('unik');
		$data['bukti'] = "$id$folder";
		$this->home_model->update_data_pembeli($data,$id);
		redirect("home/selesaipembelian");
	}
	public function tiketkosong(){
		$this->load->view('header');
		$this->load->view('frontpage/tiketkosong');
		$this->load->view('footer');
	}
	public function konfirmasitiket(){
		$this->load->model('home_model');
		$query = $this->db->where('kode_pembelian',$this->input->post('kode'));
		$query = $this->db->get('pembelian');
		$hasil = $query->row_array();
		if(empty($hasil)||$hasil['sudah_dibayar']==1){
			redirect('home/tiketkosong');
		}
		$id = $hasil['id'];
		$folder = $_FILES['bukti']['name'];
		$lokasi = $_FILES['bukti']['tmp_name'];
		move_uploaded_file($lokasi,"bukti/$id$folder");
		$data['unik'] = $this->input->post('unik');
		$data['bukti'] = "$id$folder";
		$data['metode'] = "Pembelian Online";
		$this->home_model->update_data_pembeli($data,$id);
		redirect('home/selesaipembelian');
	}
	public function perbaruipembelian()
	{
		$data['tanggal'] = $this->input->post('tanggal');
		$id_data = $this->input->post('id_data');
		$data['id_jadwal'] = $this->input->post('id_dat');
		$data['kelas']=$this->input->post('kelas');
		$data['dewasa']=$this->input->post('dewasa');
		$query = $this->db->query("select*from jadwal where id='$data[id_jadwal]'");
		$hasil = $query->row_array();
		$query2 = $this->db->query("select*from detail_jadwal where id_jadwal='$hasil[nama_jadwal]'");
		$hasil2 = $query2->row_array();
		$data['id_kereta']=$hasil2['id_kereta'];
		$data['anak']=$this->input->post('anak');
		$data['infant']=$this->input->post('infant');
		$data['kode_pembelian']=md5($id_data);
		$this->load->model('home_model');
		$this->home_model->update_data_pembeli($data,$id_data);
		redirect('home/konfirmasi/'.$id_data);
	}
	public function beli()
	{	
		$this->load->model('home_model');
		$data['id_stasiun_awal']=$this->input->post('sta_awal');
		$data['id_stasiun_akhir']=$this->input->post('sta_akhir');
		if($data['id_stasiun_awal']==$data['id_stasiun_akhir']){
			redirect('home/tidakvalid');
		}
		$data['no_telepon']=$this->input->post('no_telepon');
		$data['nama']=$this->input->post('nama_lengkap');
		$data['alamat']=$this->input->post('alamat');
		$data['email']=$this->input->post('email');
		$data['metode']='Pembelian Online';
		$data['sudah_dibayar']='0';
		$this->home_model->simpan_pembeli($data);
		$id=mysql_insert_id();
		redirect('home/lanjutbeli/'.$id);
	}
	public function konfirmasi()
	{
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('frontpage/konfirmasi');
		$this->load->view('footer'); 

	}
	public function kontak()
	{
		$this->load->model('home_model');
		$artikel['galeri'] = $this->home_model->galeri();
		$this->load->view('header');
		$this->load->view('frontpage/kontak');
		$this->load->view('footer'); 
	} 
	public function masuk()
	{
		$this->load->helper('form');
		$this->load->view('header'); 
		$this->load->view('in/masuk');
		$this->load->view('footer');
	}
	public function faq(){
		$this->load->view('header');
		$this->load->view('frontpage/faq');
		$this->load->view('footer');
	}
	public function tanyakan(){
		$data['nama']=$this->input->post('nama');
		$data['alamat']=$this->input->post('alamat');
		$data['email']=$this->input->post('email');
		$data['pertanyaan']=$this->input->post('pertanyaan');
		$data['ip']=$_SERVER['REMOTE_ADDR'];
		$data['tanggal']=date("y-M-d");
		$data['waktu']=date("H:i:s");
		$this->home_model->simpan_pertanyaan($data);
		redirect(site_url().'/home/faq');
	}
	public function cekmasuk()
	{
		$this->load->model('home_model');
		$data['nama_pengguna'] = $this->input->post('nama_pengguna');
		$data['kata_sandi'] = $this->input->post('kata_sandi');
		$hasil = $this->home_model->cekin($data);
		if($hasil=="sukses"){
			echo "<script>alert('Selamat Datang ".$this->session->userdata('status')."');</script>";
		}
		else if($hasil=="gagal"){
			echo "<script>alert('Maaf, akun Anda tidak terdaftar');</script>";

			echo "<script>window.location='".site_url()."/home';</script>";
		}
		$ses = $this->session->userdata('status');
		if($ses==""){
			echo "<script>window.location='".site_url()."/home';</script>";
		}
		else if($ses=="Kasir Online"){
			echo "<script>window.location='".site_url()."/kasironline';</script>";
		}
		else if($ses=="Masinis"){
			echo "<script>window.location='".site_url()."/masinis';</script>";
		}
		else if($ses=="Admin"){
			echo "<script>alert('Admin tidak boleh masuk disini');</script>";
			echo "<script>window.location='".site_url()."/home/keluar';</script>";
		}
		else if($ses=="Kasir Offline"){
			echo "<script>window.location='".site_url()."/kasiroffline';</script>";
		}
		else if($ses=="Bos"){
			echo "<script>window.location='".site_url()."/bos';</script>";
		}
	}
	public function keluar(){
		$this->session->set_userdata('nama_pengguna','');
		$this->session->set_userdata('kata_sandi','');
		$this->session->set_userdata('status','');
		redirect(site_url().'/home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */