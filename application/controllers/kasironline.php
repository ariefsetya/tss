<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Kasironline extends CI_Controller {


	public function index(){
		redirect(site_url().'/kasironline/cekpemesanan');
	}
	public function hapus(){
		$id = $this->uri->segment(3);
		$this->db->where('id',$id);
		$this->db->delete('pembelian');
		redirect('kasironline/');
	}
	public function cekpemesanan(){
		$this->load->model('home_model');
		$this->home_model->cekkasir();
		$data['pemesanan'] = $this->home_model->cek_pemesanan();
		$this->load->view('header');
		$this->load->view('kasironline/cekpemesanan',$data);
		$this->load->view('footer');
	}
	public function cekpembelian(){
		$this->load->model('home_model');
		$this->home_model->cekkasir();
		$data['pembelian'] = $this->home_model->cek_pembelian();
		$this->load->view('header');
		$this->load->view('kasironline/cekpembelian',$data);
		$this->load->view('footer');
	}
	public function cekpertanyaan(){
		$this->load->model('home_model');
		$this->home_model->cekkasir();
		$data['pertanyaan'] = $this->home_model->cek_pertanyaan();
		$this->load->view('header');
		$this->load->view('kasironline/cekpertanyaan',$data);
		$this->load->view('footer');
	}
	public function jawaban(){
		$this->load->model('home_model');
		$this->home_model->cekkasir();
		$data['jawaban'] = $this->input->post('jawaban');
		$id=$this->input->post('id');
		$this->home_model->perbarui_jawaban($data,$id);
		redirect(site_url()."/kasironline/cekpertanyaan");
	}
	public function tampilkan(){
		$this->load->model('home_model');
		$this->home_model->cekkasir();
		$data['jawaban'] = $this->input->post('jawaban');
		$id=$this->input->post('id');
		$this->home_model->perbarui_jawaban($data,$id);
		redirect(site_url()."/kasironline/cekpertanyaan");
	}
}