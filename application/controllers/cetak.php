<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {
	
	public function index()
	{
		redirect(site_url().'/cetak/tiket');
	}
	public function tiket(){
		$id_data = $this->uri->segment(3);
		$query = $this->db->where('id',$id_data);
		$query = $this->db->get('pembelian');
		$hasil['tiket'] = $query->row_array();
		$this->load->view('cetak/tiket',$hasil); 
	}
}