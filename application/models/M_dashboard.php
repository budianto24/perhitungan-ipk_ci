<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function dataTotal()
    {
        $query['mahasiswa'] = $this->db->query('SELECT count(nim) AS total FROM tb_mahasiswa')->row_array();
        $query['fakultas'] 	= $this->db->query('SELECT count(kode_fakultas) AS total FROM tb_fakultas')->row_array();
        $query['prodi'] 	= $this->db->query('SELECT count(kode_prodi) AS total FROM tb_prodi')->row_array();
        $query['matkul'] 	= $this->db->query('SELECT count(kode_matkul) AS total FROM tb_matkul')->row_array();
        return $query;
    }

    public function getDataBars()
    {

    	$query = $this->db->query("SELECT `tb_mahasiswa`.`nim`, `tb_fakultas`.`nama_fakultas`, COUNT(nim) AS total FROM `tb_mahasiswa` LEFT JOIN `tb_fakultas` ON `tb_fakultas`.`kode_fakultas`=`tb_mahasiswa`.`kode_fakultas` LEFT JOIN `tb_prodi` ON `tb_prodi`.`kode_prodi`=`tb_mahasiswa`.`kode_prodi` GROUP BY `nama_fakultas`");
		
		return $query->result_array();
    }
}