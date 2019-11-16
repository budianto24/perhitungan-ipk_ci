<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

	public function getAllData()
	{
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');
		$this->db->join('tb_fakultas', 'tb_fakultas.kode_fakultas=tb_mahasiswa.kode_fakultas', 'left');
		$this->db->join('tb_prodi', 'tb_prodi.kode_prodi=tb_mahasiswa.kode_prodi', 'left');
		
		return $this->db->get()->result_array();
	}

	public function getDataByNim($nim)
	{
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');
		$this->db->join('tb_fakultas', 'tb_fakultas.kode_fakultas=tb_mahasiswa.kode_fakultas', 'left');
		$this->db->join('tb_prodi', 'tb_prodi.kode_prodi=tb_mahasiswa.kode_prodi', 'left');
		$this->db->where('nim',$nim);
		return $this->db->get()->row_array();
	}

	public function getDataSearch($keyword){
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');
		$this->db->like('nama',$keyword);
		$this->db->or_like('nim',$keyword);
		return $this->db->get()->result_array();
	}

	public function viewByFakultas($kode_fakultas)
	{
		$query = $this->db->get_where('tb_prodi', ['kode_fakultas' => $kode_fakultas])->result();
        return $query;
	}

	public function addDataMahasiswa()
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
			"nim"    		=> htmlspecialchars($this->input->post('nim', true)),
			"nama" 		   	=> htmlspecialchars($this->input->post('nama', true)),
			"jenis_kelamin" => htmlspecialchars($this->input->post('jenis_kelamin', true)),
			"kode_fakultas"	=> htmlspecialchars($this->input->post('fakultas', true)),
			"kode_prodi"	=> htmlspecialchars($this->input->post('prodi', true)),
			"gambar"    	=> $picture,
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
			"nim"	    	=> htmlspecialchars($this->input->post('nim', true)),
			"nama"  	  	=> htmlspecialchars($this->input->post('nama', true)),
			"jenis_kelamin" => htmlspecialchars($this->input->post('jenis_kelamin', true)),
			"gambar"    	=> $picture,
		];
		$this->db->where('nim', htmlspecialchars($this->input->post('nim')));
		$this->db->update('tb_mahasiswa', $data);
	}


	public function deleteDataMahasiswa($nim)
	{
		$this->db->where('nim', $nim);
		$this->db->delete('tb_mahasiswa');
	}
}