<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	private $filename = "import_data";

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->load->helper('url', 'form', 'file');
			$this->load->library('form_validation');
			$this->load->model('User_model');
			$this->load->model('Klaster_model');
			$this->load->database();
		} else {
			redirect('login', 'refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['kelas'] = $this->User_model->getKelas();

			$this->load->view('user/user_view', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function filter_grafik()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['kelas'] = $this->User_model->getKelas();
			$this->form_validation->set_rules('hidden', 'Kelas', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('user/user_view', $data);
			} else {
				$kelas = $this->input->post('kelas');
				$data['nilai'] = $this->User_model->getNilaiByKelas($kelas);
				$data['lks'] = $kelas;
				$this->load->view('user/user_filter', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function nilai()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['tahun'] = $this->User_model->getTahun();

			$this->load->view('user/nilai', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function filter_nilai()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;

			$data['tahun'] = $this->User_model->getTahun();
			$this->form_validation->set_rules('hidden', 'Tahun', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('user/nilai', $data);
			} else {
				$tahun = $this->input->post('tahun');
				$data['nilai'] = $this->User_model->getNilai($tahun);
				$data['thn'] = $tahun;
				$this->load->view('user/nilai_filter', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function cetak($tahun)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['tahun'] = $this->User_model->getTahun();
			$data['nilai'] = $this->User_model->getNilai($tahun);
			$data['thn'] = $tahun;
			$this->load->view('user/cetak', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function pengujian()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['kelas'] = $this->User_model->getKelas();
			$hasil = $this->User_model->getHasilKlaster();
			$data['cluspeng'] = $this->User_model->getHasilPengujian();
			$data['tahun'] = $this->Klaster_model->getTahun();
			$data['dataif1'] = $this->User_model->get_sum_count_if1();
			$data['dataif2'] = $this->User_model->get_sum_count_if2();
			$data['chart'] = $this->User_model->chart_Tampil_C();
			// $data['user'] = $this->User_model->did_delete_row();
			$data['hasil'] = $hasil;

			foreach ($hasil as $key) {
				$tahun = $key->tahun;
			}
			$data['thn'] = $tahun;

			$this->load->view('user/pengujian_view', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array

		if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->User_model->upload_file($this->filename);

			if ($upload['result'] == "success") { // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet;
			} else { // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}

		$this->load->view('User/form_pengujian', $data);
	}

	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();

		$numrow = 1;
		foreach ($sheet as $row) {
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if ($numrow > 1) {
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'cp' => $row['D']
				));
			}

			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->User_model->insert_multiple($data);

		redirect("User/pengujian"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */