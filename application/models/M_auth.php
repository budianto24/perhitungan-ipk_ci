<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_auth extends CI_Model {
	public function login($username, $pass)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('username',$username);
		$this->db->where('password',$pass);
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}
}