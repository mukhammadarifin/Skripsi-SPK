<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getKelas()
	{
		return $this->db->get('kelas')->result();
	}

	public function getNilaiByKelas($kelas)
	{
		$this->db->where('fk_kelas', $kelas);
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		return $this->db->get('nilai')->result();
	}

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */