<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {

	public function getDataByNim($nim)
	{
		$query = $this->db->query("SELECT `tb_nilai`.`nilai`, `tb_nilai`.`id`, `tb_nilai`.`nim` ,`tb_matkul`.`nama_matkul`, `tb_matkul`.`sks` FROM `tb_nilai` LEFT JOIN `tb_matkul` ON `tb_nilai`.`kode_matkul` = `tb_matkul`.`kode_matkul` WHERE nim = $nim");
		return $query->result_array();
	}

	public function getDataById($id)
	{
		$query = $this->db->query("SELECT `tb_nilai`.`nilai`, `tb_nilai`.`id`, `tb_nilai`.`nim` ,`tb_matkul`.`nama_matkul`, `tb_matkul`.`sks` FROM `tb_nilai` LEFT JOIN `tb_matkul` ON `tb_nilai`.`kode_matkul` = `tb_matkul`.`kode_matkul` WHERE  id = $id");
		return $query->result_array();
	}

	public function addDataNilai()
	{
		$data = [
			"nim"    		 => $this->input->post('nim', true),
			"kode_matkul"    => $this->input->post('kode_matkul', true),
			"nilai"     	 => $this->input->post('nilai', true)
		];
		$this->db->insert('tb_nilai', $data);
	}

	public function editDataNilai()
	{
		$data = [
			"id"		=>$this->input->post('id', true),
			"nilai"     => $this->input->post('nilai', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_nilai', $data);
	}

	public function deleteDataNilai($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_nilai');
	}
}