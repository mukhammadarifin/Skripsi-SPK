<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->model('Login_model');
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_tombollogin');

		if ($this->form_validation->run() == FALSE) {

			$data['error'] = "Maaf, Username dan Password tidak valid.";
			$this->load->view('login/login_view', $data);
		} else {
			redirect('Admin', 'refresh');
		}
	}

	public function tombollogin($password)
	{
		$username = $this->input->post('username');
		$result = $this->Login_model->login($username, $password);

		// $password=$this->input->post('login_password');

		if ($result > 0) {
			foreach ($result as $row) {
				$session_variables = array('id_user' => $row->id_user, 'username' => $row->username, 'password' => $row->password, 'nama' => $row->nama, 'email' => $row->email, 'level' => $row->level);
			}

			$this->session->set_userdata('logged_in', $session_variables);
			echo '<script>alert("Login Sukses!!!");</script>';
			return true;
		} else {
			echo '<script>alert("Username atau Password anda tidak ditemukan");</script>';
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('Home', 'refresh');
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['error'] = "Data Harus Lengkap";
			$this->load->view('login/register_view', $data);
		} else {
			$this->Login_model->register();
			echo "<script>alert('Register berhasil. Silahkan Login')</script>";
			redirect('Login', 'refresh');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */