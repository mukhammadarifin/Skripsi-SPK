<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getAdmin()
	{
		$this->db->where('level', '1');
		return $this->db->get('user')->result();
	}

	public function getUser()
	{
		$this->db->where('level', '2');
		return $this->db->get('user')->result();
	}

	public function getNilai($tahun)
	{
		$this->db->where('tahun', $tahun);
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
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

	public function getTahun()
	{
		$this->db->distinct();
		$this->db->group_by('tahun');
		return $this->db->get('nilai')->result();
	}

	public function addAdmin()
	{
		$object = array('username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'level' => '1' );
		$this->db->insert('user', $object);
	}

	public function addNilai($tahun)
	{
		$object = array('fk_kelas' => $this->input->post('fk_kelas'),
			'PAI' => $this->input->post('PAI'),
			'PAK' => $this->input->post('PAK'),
			'PPKn' => $this->input->post('PPKn'),
			'BI' => $this->input->post('BI'),
			'M' => $this->input->post('M'),
			'SI' => $this->input->post('SI'),
			'Bing' => $this->input->post('Bing'),
			'SB' => $this->input->post('SB'),
			'PJOK' => $this->input->post('PJOK'),
			'F' => $this->input->post('F'),
			'K' => $this->input->post('K'),
			'SKD' => $this->input->post('SKD'),
			'SK' => $this->input->post('SK'),
			'KJD' => $this->input->post('KJD'),
			'PD' => $this->input->post('PD'),
			'DDG' => $this->input->post('DDG'),
			'BD' => $this->input->post('BD'),
			'tahun' =>$tahun );
		$this->db->insert('nilai', $object);
	}

	public function addUser()
	{
		$object = array('username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'level' => '2' );
		$this->db->insert('user', $object);
	}

	public function addKelas()
	{
		$object = array('nama_kelas' => $this->input->post('nama_kelas'));
		$this->db->insert('kelas', $object);
	}

	public function deleteUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}

	public function deleteKelas($id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);
		$this->db->delete('kelas');
	}

	public function deleteNilai($id_nilai)
	{
		$this->db->where('id_nilai', $id_nilai);
		$this->db->delete('nilai');
	}

	public function getAdminById($id_user)
	{
		$this->db->where('id_user', $id_user);
		// $this->db->where('level', '1');
		return $this->db->get('user')->result();
	}

	public function getUserById($id_user)
	{
		$this->db->where('id_user', $id_user);
		// $this->db->where('level', '2');
		return $this->db->get('user')->result();
	}

	public function getNilaiById($id_nilai)
	{
		$this->db->where('id_nilai', $id_nilai);
		$this->db->join('kelas', 'kelas.id_kelas = nilai.fk_kelas', 'join');
		return $this->db->get('nilai')->result();
	}

	public function getKelasById($id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);
		return $this->db->get('kelas')->result();
	}

	public function edit_admin($id_admin)
	{
		$object = array('username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'level' => '1' );
		$this->db->where('id_user', $id_admin);
		$this->db->update('user', $object);
	}

	public function edit_nilai($id_nilai)
	{
		$object = array('fk_kelas' => $this->input->post('fk_kelas'),
			'PAI' => $this->input->post('PAI'),
			'PAK' => $this->input->post('PAK'),
			'PPKn' => $this->input->post('PPKn'),
			'BI' => $this->input->post('BI'),
			'M' => $this->input->post('M'),
			'SI' => $this->input->post('SI'),
			'Bing' => $this->input->post('Bing'),
			'SB' => $this->input->post('SB'),
			'PJOK' => $this->input->post('PJOK'),
			'F' => $this->input->post('F'),
			'K' => $this->input->post('K'),
			'SKD' => $this->input->post('SKD'),
			'SK' => $this->input->post('SK'),
			'KJD' => $this->input->post('KJD'),
			'PD' => $this->input->post('PD'),
			'DDG' => $this->input->post('DDG'),
			'BD' => $this->input->post('BD'),
			'tahun' => $this->input->post('tahun') );
		$this->db->where('id_nilai', $id_nilai);
		$this->db->update('nilai', $object);
	}

	public function edit_user($id_user)
	{
		$object = array('username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'level' => '2' );
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $object);
	}

	public function edit_kelas($id_kelas)
	{
		$object = array('nama_kelas' => $this->input->post('nama_kelas'));
		$this->db->where('id_kelas', $id_kelas);
		$this->db->update('kelas', $object);
	}

	public function upload_file($filename){
	    $this->load->library('upload'); // Load librari upload
	    
	    $config['upload_path'] = './excel/';
	    $config['allowed_types'] = 'xlsx';
	    $config['max_size']  = '2048';
	    $config['overwrite'] = true;
	    $config['file_name'] = $filename;
	  
	    $this->upload->initialize($config); // Load konfigurasi uploadnya
	    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
	      // Jika berhasil :
	      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
	      return $return;
	    }else{
	      // Jika gagal :
	      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
	      return $return;
	    }
	  }

	  public function insert_multiple($data){
	    $this->db->insert_batch('nilai', $data);
	  }

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */