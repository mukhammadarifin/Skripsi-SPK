<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klaster_model extends CI_Model
{

	public function getTahun()
	{
		$this->db->distinct();
		$this->db->group_by('tahun');
		return $this->db->get('nilai')->result();
	}

	public function getNilai($tahun)
	{
		$this->db->where('tahun', $tahun);
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		return $this->db->get('nilai')->result();
	}

	public function getNilaiRand($tahun, $limit)
	{
		$this->db->where('tahun', $tahun);
		$this->db->order_by('rand()');
		$this->db->limit($limit);
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		return $this->db->get('nilai')->result();
	}

	public function getIterasi($iterasi)
	{
		$this->db->where('iterasi', $iterasi);
		return $this->db->get('hasil_iterasi')->result();
	}

	public function getCentroidTempByIterasi()
	{
		$this->db->group_by('iterasi');
		return $this->db->get('centroid_temp')->result();
	}

	public function getCentroidTemp()
	{
		return $this->db->get('centroid_temp')->result();
	}

	public function getHasilIterasi()
	{
		return $this->db->get('hasil_iterasi')->result();
	}

	public function getCentroidTempByC()
	{
		$this->db->group_by('c');
		return $this->db->get('centroid_temp')->result();
	}

	public function getHasilKlaster()
	{
		$this->db->join('nilai', 'nilai.id_nilai = hasil_klaster.fk_nilai', 'join');
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		return $this->db->get('hasil_klaster')->result();
	}
}

/* End of file Klaster_model.php */
/* Location: ./application/models/Klaster_model.php */