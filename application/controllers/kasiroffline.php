<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Kasiroffline extends CI_Controller {

	public function index(){
		redirect(site_url().'/kasiroffline/pembeliantiket');
	}
	public function pembeliantiket(){
		$this->load->helper('form');
		$this->load->model('home_model');
		$data['stasiun'] = $this->home_model->get_stasiun();
		
		$this->load->view('header');
		$this->load->view('kasiroffline/belitiket.php',$data);
		$this->load->view('footer');
	}
	public function bayar(){
		$query = $this->db->where('kode_pembelian',$this->input->post('kode'));
		$query = $this->db->get('pembelian');
		$hasil = $query->row_array();
		$id_data = $hasil['id'];
		$data['sudah_dibayar']=1;
		$this->db->where('id',$id_data);
		$this->db->update('pembelian',$data);
		redirect('Kasiroffline/pembayaran/'.$id_data);
	}
	public function pengambilantiket(){
		$this->load->view('header');
		$this->load->view('Kasiroffline/pengambilantiket');
		$this->load->view('footer');
	}
	public function beli(){
		$this->load->model('home_model');
		$data['id_stasiun_awal']=$this->input->post('sta_awal');
		$data['id_stasiun_akhir']=$this->input->post('sta_akhir');
		if($data['id_stasiun_awal']==$data['id_stasiun_akhir']){
			redirect('Kasiroffline/tidakvalid');
		}
		$data['no_telepon']=$this->input->post('no_telepon');
		$data['nama']=$this->input->post('nama_lengkap');
		$data['alamat']=$this->input->post('alamat');
		$data['email']=$this->input->post('email');
		$data['metode']='Pembelian';
		$data['sudah_dibayar']='0';
		$this->home_model->simpan_pembeli($data);
		$id=mysql_insert_id();
		redirect('kasiroffline/lanjutbeli/'.$id);
	}
	public function lanjutbeli(){
		$this->load->view('header');
		$this->load->view('kasiroffline/lanjutbeli');
		$this->load->view('footer');
	}
	public function ambilpembelian(){
		$this->load->view('header');
		$this->load->view('kasiroffline/ambilpembelian');
		$this->load->view('footer');
	}
	public function perbaruipembelian()
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
		$data['sudah_dibayar']=1;
		$this->load->model('home_model');
		$this->home_model->update_data_pembeli($data,$id_data);
		redirect('kasiroffline/pembayaran/'.$id_data);
	}
	public function selesaipembelian(){
		$this->load->view('header');
		$this->load->view('kasiroffline/selesaipembelian');
		$this->load->view('footer');
	}
	public function pembayaran(){
		$this->load->view('header');
		$this->load->view('kasiroffline/pembayaran');
		$this->load->view('footer');
	}
}