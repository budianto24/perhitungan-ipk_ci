<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

	public function getAllData()
	{
		$query = $this->db->get('tb_mahasiswa');
		return $query->result_array();
	}

	public function getDataByNim($nim)
	{
		$query = $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim = $nim");
		return $query->row_array();
	}

	public function getDataSearch($keyword){
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');
		$this->db->like('nama',$keyword);
		$this->db->or_like('nim',$keyword);
		return $this->db->get()->result_array();
	}


	public function tambahDataMahasiswa()
	{
		$config['upload_path']          = './assets/img/mahasiswa';
	    $config['allowed_types']        = 'jpg|png|jpeg';
	    $config['file_name']			= uniqid();
	    $config['overwrite']			= true;
	    $config['max_size']             = 2000; // 2MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;
	    
	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('gambar')){
	    	 $picture = $this->upload->file_name;
		}else{
			 $picture = 'default.jpg';
		}

		$data = [
			"nim"    	=> $this->input->post('nim', true),
			"nama"    	=> $this->input->post('nama', true),
			"fakultas"	=> $this->input->post('fakultas', true),
			"prodi"		=> $this->input->post('prodi', true),
			"gambar"    => $picture,
		];
		$this->db->insert('tb_mahasiswa', $data);
	}


	public function editDataMahasiswa()
	{
		$config['upload_path']          = './assets/img/mahasiswa';
	    $config['allowed_types']        = 'jpg|png|jpeg';
	    $config['file_name']			= uniqid();
	    $config['overwrite']			= true;
	    $config['max_size']             = 2000; // 2MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;
	    
	    $this->load->library('upload', $config);

	    $old_gambar = $this->input->post('old_gambar');

	    if ($this->upload->do_upload('gambar')) {
	    	$picture = $this->upload->file_name;
	    	unlink("assets/img/mahasiswa/$old_gambar");
	    }else{
	    	$picture = $this->input->post('old_gambar');
	    }

		$data = [
			"nim"    	=> $this->input->post('nim', true),
			"nama"    	=> $this->input->post('nama', true),
			"fakultas"	=> $this->input->post('fakultas', true),
			"prodi"		=> $this->input->post('prodi', true),
			"gambar"    => $picture,
		];
		$this->db->where('nim', $this->input->post('nim'));
		$this->db->update('tb_mahasiswa', $data);
	}


	public function deleteMahasiswa($nim)
	{
		$this->db->where('nim', $nim);
		$this->db->delete('tb_mahasiswa');
	}
}