<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
			$this->load->model('Admin_model');
			$this->load->library('curl');
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
			$data['kelas'] = $this->Admin_model->getKelas();
			// $data['admin'] = $this->Admin_model->getAdmin();

			if ($level == 1) {
				$this->load->view('admin/admin_view', $data);
			} elseif ($level == 2) {
				redirect('User', 'refresh');
			}
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
			$data['kelas'] = $this->Admin_model->getKelas();
			$this->form_validation->set_rules('hidden', 'kelas', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('admin/admin_view', $data);
			} else {
				$kelas = $this->input->post('kelas');
				$data['nilaisiswa'] = $this->Admin_model->getNilaiByKelas($kelas);
				$data['kls'] = $kelas;
				$this->load->view('admin/admin_filter', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function kelola_admin()
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
			$data['admin'] = $this->Admin_model->getAdmin();

			$this->load->view('admin/kelola_admin', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function kelola_user()
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
			$data['user'] = $this->Admin_model->getUser();

			$this->load->view('admin/kelola_user', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function kelola_kelas()
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
			$data['kelas'] = $this->Admin_model->getKelas();

			$this->load->view('admin/kelola_kelas', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function kelola_nilai()
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
			$data['tahun'] = $this->Admin_model->getTahun();

			$this->load->view('admin/kelola_nilai', $data);
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
			$data['tahun'] = $this->Admin_model->getTahun();
			$this->form_validation->set_rules('hidden', 'Tahun', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('admin/kelola_nilai', $data);
			} else {
				$tahun = $this->input->post('tahun');
				$data['nilai'] = $this->Admin_model->getNilai($tahun);
				$data['thn'] = $tahun;
				$this->load->view('admin/kelola_nilai_filter', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function tambah_admin()
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
			$data['tahun'] = $this->Admin_model->getTahun();
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/tambah_admin', $data);
			} else {
				$this->Admin_model->addAdmin();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_admin', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function tambah_user()
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
			$data['tahun'] = $this->Admin_model->getTahun();
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/tambah_user', $data);
			} else {
				$this->Admin_model->addUser();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_user', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function tambah_nilai($tahun)
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
			$data['kelas'] = $this->Admin_model->getKelas();

			$this->form_validation->set_rules('fk_kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('PAI', 'Pendidikan Agama Islam dan Budi Pekerti', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('PAK', 'Pendidikan Agama Katholik dan Budi Pekerti', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('PPKn', 'Pendidikan Pancasila dan Kewarganegaraan', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('BI', 'Bahasa Indonesia', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('M', 'Matematika Umum', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('SI', 'Sejarah Indonesia', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('Bing', 'Bahasa Inggris', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('SB', 'Seni Budaya', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('PJOK', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('F', 'FISIKA', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('K', 'Kimia', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('SKD', 'Simulasi dan Komunikasi Digital', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('SK', 'Sistem Komputer', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('KJD', 'Komputer dan Jaringan Dasar', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('PD', 'Pemrograman Dasar', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('DDG', 'Dasar Desain Grafis', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('BD', 'Muatan Lokal Bahasa Daerah', array('required', 'max_length[3]'));

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/tambah_nilai', $data);
			} else {
				$this->Admin_model->addNilai($tahun);
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_nilai', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function tambah_kelas()
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
			$this->form_validation->set_rules('nama_kelas', 'Kelas', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/tambah_kelas', $data);
			} else {
				$this->Admin_model->addKelas();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_kelas', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function delete_admin($id_admin)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->Admin_model->deleteUser($id_admin);
			echo "<script>alert('Hapus Data Berhasil')</script>";
			redirect('Admin/kelola_admin', 'refresh');
		} else {
			redirect('login', 'refresh');
		}
	}


	public function delete_kelas($id_kelas)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->Admin_model->deleteKelas($id_kelas);
			echo "<script>alert('Hapus Data Berhasil')</script>";
			redirect('Admin/kelola_kelas', 'refresh');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function delete_nilai($id_nilai)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->Admin_model->deleteNilai($id_nilai);
			echo "<script>alert('Hapus Data Berhasil')</script>";
			redirect('Admin/kelola_nilai', 'refresh');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function edit_kelas($id_kelas)
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
			$data['kelas'] = $this->Admin_model->getKelasById($id_kelas);

			$this->form_validation->set_rules('nama_kelas', 'Kelas', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/edit_kelas', $data);
			} else {
				$this->Admin_model->edit_kelas($id_kelas);
				echo "<script>alert('Update Data Berhasil')</script>";
				redirect('Admin/kelola_kelas', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function edit_admin($id_admin)
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
			$data['admin'] = $this->Admin_model->getAdminById($id_admin);

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/edit_admin', $data);
			} else {
				$this->Admin_model->edit_admin($id_admin);
				echo "<script>alert('Update Data Berhasil')</script>";
				redirect('Admin/kelola_admin', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function edit_user($id)
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
			$data['user'] = $this->Admin_model->getUserById($id);

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/edit_user', $data);
			} else {
				$this->Admin_model->edit_user($id);
				echo "<script>alert('Update Data Berhasil')</script>";
				redirect('Admin/kelola_user', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function edit_nilai($id_nilai)
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
			$data['nilai'] = $this->Admin_model->getNilaiById($id_nilai);
			$data['tahun'] = $this->Admin_model->getTahun();
			$data['kelas'] = $this->Admin_model->getKelas();

			$this->form_validation->set_rules('fk_kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('PAI', 'Pendidikan Agama Islam dan Budi Pekerti', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('PAK', 'Pendidikan Agama Katholik dan Budi Pekerti', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('PPKn', 'Pendidikan Pancasila dan Kewarganegaraan', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('BI', 'Bahasa Indonesia', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('M', 'Matematika Umum', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('SI', 'Sejarah Indonesia', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('Bing', 'Bahasa Inggris', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('SB', 'Seni Budaya', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('PJOK', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('F', 'FISIKA', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('K', 'Kimia', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('SKD', 'Simulasi dan Komunikasi Digital', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('SK', 'Sistem Komputer', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('KJD', 'Komputer dan Jaringan Dasar', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('PD', 'Pemrograman Dasar', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('DDG', 'Dasar Desain Grafis', array('required', 'max_length[3]'));
			$this->form_validation->set_rules('BD', 'Muatan Lokal Bahasa Daerah', array('required', 'max_length[3]'));

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/edit_nilai', $data);
			} else {
				$this->Admin_model->edit_nilai($id_nilai);
				echo "<script>alert('Update Data Berhasil')</script>";
				redirect('Admin/kelola_nilai', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array

		if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->Admin_model->upload_file($this->filename);

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

		$this->load->view('Admin/form', $data);
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
					'fk_kelas' => $row['A'],
					'nama_siswa' => $row['B'],
					'PAI' => $row['C'],
					'PAK' => $row['D'],
					'PPKn' => $row['E'],
					'BI' => $row['F'],
					'M' => $row['G'],
					'SI' => $row['H'],
					'Bing' => $row['I'],
					'SB' => $row['J'],
					'PJOK' => $row['K'],
					'F' => $row['L'],
					'K' => $row['M'],
					'SKD' => $row['N'],
					'SK' => $row['O'],
					'KJD' => $row['P'],
					'PD' => $row['Q'],
					'DDG' => $row['R'],
					'BD' => $row['S'],
					'tahun' => $row['T'],
				));
			}

			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->Admin_model->insert_multiple($data);

		redirect("Admin/kelola_nilai"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */