<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{


	public function getNilai($tahun)
	{
		$this->db->where('tahun', $tahun);
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		return $this->db->get('nilai')->result();
	}

	public function getNilai2()
	{
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		return $this->db->get('nilai')->result();
	}

	public function getTahun()
	{
		$this->db->distinct();
		$this->db->group_by('tahun');
		return $this->db->get('nilai')->result();
	}

	public function getNilaiByKelas($kelas)
	{
		$this->db->where('fk_kelas', $kelas);
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		return $this->db->get('nilai')->result();
	}

	public function getKelas()
	{
		return $this->db->get('kelas')->result();
	}

	public function getHasilKlaster()
	{
		$this->db->join('nilai', 'nilai.id_nilai = hasil_klaster.fk_nilai', 'join');
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		// $this->db->join('hasil_klaster', 'hasil_klaster.id_klaster = pengujian.fk_pengujian', 'join');
		return $this->db->get('hasil_klaster')->result();
		return $this->db->get('pengujian')->result();
	}

	public function getHasilPengujian()
	{
		return $this->db->get('pengujian')->result();
	}

	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_multiple($data)
	{
		$this->db->insert_batch('pengujian', $data);
	}

	public function get_sum_count_if1()
	{
		$sql = "SELECT count(if(c='c1', c, NULL)) as cc1, count(if(c='c2',c, NULL)) as cc2, count(if(c='c3',c, NULL)) as cc3
		FROM hasil_klaster";

		$result = $this->db->query($sql);
		return $result->row();
	}

	public function get_sum_count_if2()
	{
		$sql = "SELECT count(if(cp='1', cp, NULL)) as ccp1, count(if(cp='2',cp, NULL)) as ccp2, count(if(cp='3',cp, NULL)) as ccp3
		FROM pengujian";

		$result = $this->db->query($sql);
		return $result->row();
	}

	public function chart_Tampil_C()
	{
		$sql = "SELECT SUM(IF(c='c1', 1, 0)) AS jumlah_c1, SUM(IF(c='c2', 1, 0)) AS jumlah_c2, 
		SUM(IF(c='c3', 1, 0)) AS jumlah_c3 FROM hasil_klaster";

		$perintah = $this->db->query($sql);
		return $perintah;
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */