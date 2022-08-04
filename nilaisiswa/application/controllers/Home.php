<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form','file');
		$this->load->library('form_validation');
		$this->load->model('Home_model');
	}

	public function index()
	{
		$data['kelas'] = $this->Home_model->getKelas();
		$this->load->view('login/login_view',$data);
	}

	// public function filter_grafik()
	// {
	// 	$data['kelas'] = $this->Home_model->getKelas();
	// 	$this->form_validation->set_rules('hidden', 'Kelas', 'trim|required');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$data['error'] = "Pilih Tahun";
	// 		$this->load->view('home/home', $data);
	// 	} else {
	// 		$kelas = $this->input->post('kelas');
	// 		$data['nilai'] = $this->Home_model->getNilaiByKelas($kelas);
	// 		$data['kls'] = $kelas;
	// 		$this->load->view('home/home_filter',$data);
	// 	}
	// }

}

/* End of file Awal.php */
/* Location: ./application/controllers/Awal.php */