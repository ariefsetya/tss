<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Masinis extends CI_Controller {

	public function index(){
		redirect(site_url().'/masinis/setkereta');
	}
	public function setkereta(){
		$this->home_model->cekmasinis();
		$data['kereta'] = $this->home_model->get_kereta();
		$this->load->view('header');
		$this->load->view('masinis/setkereta',$data);
		$this->load->view('footer');
	}
	public function infokereta(){
		$this->home_model->cekmasinis();
		$this->load->view('header');
		$this->load->view('masinis/infokereta');
		$this->load->view('footer');
	}
	public function set_kereta(){
		$this->home_model->cekmasinis();
		$kereta = $this->input->post('kereta');
		$this->session->set_userdata('kereta',$kereta);
		redirect(site_url().'/masinis/infokereta');
	}
	public function info_kereta(){
		$this->home_model->cekmasinis();
		$info['info'] = $this->input->post('info');
		$info['kereta'] = $this->session->userdata('kereta');
		$this->home_model->set_info($info);
		redirect(site_url().'/masinis/infokereta');
	}
}