<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {
    
    public function get($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('m_user')->row(); // Untuk mengeksekusi dan mengambil data hasil query

        return $result;
    }
	function update_pass($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function update_pass2($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}