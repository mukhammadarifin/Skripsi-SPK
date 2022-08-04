<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klaster extends CI_Controller
{

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
			$this->load->model('Klaster_model');
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
			$hasil = $this->Klaster_model->getHasilKlaster();
			$data['tahun'] = $this->Klaster_model->getTahun();
			$data['hasil'] = $hasil;
			foreach ($hasil as $key) {
				$tahun = $key->tahun;
			}
			$data['thn'] = $tahun;
			$this->load->view('klaster/klaster_view', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function iterasi_klaster()
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
			$data['tahun'] = $this->Klaster_model->getTahun();
			$this->form_validation->set_rules('hidden', 'Tahun', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('klaster/klaster_view', $data);
			} else {
				$tahun = $this->input->post('tahun');
				$jumlah = $this->input->post('jumlah');
				if ($jumlah < 2) {
?>
					<script>
						alert("Jumlah Klaster harus lebih dari 1");
					</script>
				<?php
					redirect('Klaster', 'refresh');
				} else {
					$data['nilai'] = $this->Klaster_model->getNilai($tahun);
					$data['thn'] = $tahun;
					$data['jml'] = $jumlah;
					$data['nilai_rand'] = $this->Klaster_model->getNilaiRand($tahun, $jumlah);
					$data['nilai_rand2'] = $this->Klaster_model->getNilaiRand($tahun, $jumlah);
					$this->load->view('klaster/iterasi', $data);
				}
			}
		} else {
			redirect('login', 'refresh');
		}
	}


	public function iterasi_lanjut($tahun, $jumlah, $iterasi)
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
			$data['tahun'] = $this->Klaster_model->getTahun();
			$hasil_iterasi = $this->Klaster_model->getIterasi($iterasi);
			$data['hasil_iterasi'] = $hasil_iterasi;
			$data['iterasi'] = $iterasi;

			foreach ($hasil_iterasi as $key) {
				$selisih = $key->selisih;
			}
			if ($selisih > 0) {
				?>
				<script>
					alert("Proses iterasi berakhir pada tahap ke-<?php echo $iterasi; ?>");
				</script>
<?php
				// redirect('Klaster/iterasi_hasil/'.$tahun,'refresh');
				redirect('Klaster/iterasi_hasil/' . $tahun, 'refresh');
			} else {
				$data['nilai'] = $this->Klaster_model->getNilai($tahun);
				$data['thn'] = $tahun;
				$data['jml'] = $jumlah;
				$data['nilai_rand'] = $this->Klaster_model->getNilaiRand($tahun, $jumlah);

				$this->load->view('klaster/iterasi_lanjut', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function iterasi_hasil($tahun)
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
			$data['tahun'] = $this->Klaster_model->getTahun();
			$data['hasil_iterasi'] = $this->Klaster_model->getHasilIterasi();
			$data['centroid_temp_by_iterasi'] = $this->Klaster_model->getCentroidTempByIterasi();
			$data['centroid_temp_by_c'] = $this->Klaster_model->getCentroidTempByC();
			$data['centroid_temp'] = $this->Klaster_model->getCentroidTemp();
			$data['nilai'] = $this->Klaster_model->getNilai($tahun);
			$data['thn'] = $tahun;
			$this->load->view('klaster/iterasi_hasil', $data);
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
			// $data['tahun'] = $this->User_model->getTahun();
			// $data['nilai'] = $this->User_model->getNilai($tahun);
			// $data['thn'] = $tahun;
			$hasil = $this->Klaster_model->getHasilKlaster();
			$data['tahun'] = $this->Klaster_model->getTahun();
			$data['hasil'] = $hasil;
			foreach ($hasil as $key) {
				$tahun = $key->tahun;
			}
			$data['thn'] = $tahun;
			$this->load->view('klaster/cetak', $data);
		} else {
			redirect('login', 'refresh');
		}
	}
}

/* End of file Klaster.php */
/* Location: ./application/controllers/Klaster.php */