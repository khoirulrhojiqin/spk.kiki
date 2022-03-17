<?php
 
class M_user extends CI_Model{
    function get_data(){     
        return $this->db->get('m_user')->result();
    } 
    function get_data_profil(){     
        $id=$this->session->userdata('id');
        $this->db->where('id_user',$id);
        return $this->db->get('m_user_detail')->result();
    } 
     function simpan_user($username,$password,$nama,$role){
        $status = '0';
        if ($role == 'admin') {
            $role_id = 1;
        }elseif($role == 'dosen'){
            $role_id = 2;
        }elseif($role == 'mahasiswa'){
            $role_id = 3;
        }
        $created_at = gmdate('Y-m-d H:i:s', strtotime("-3",time()));
        
        $sql = "INSERT INTO billco_m_user (username,password,nama,role,status,role_id,created_at) VALUES (?,?,?,?,?,?,?)";
        $this->db->query($sql, array($this->db->escape_str($username),md5($password), $this->db->escape_str($nama), $this->db->escape_str($role), $this->db->escape_str($status), $role_id, $created_at));

        // $hasil=$this->db->query("INSERT INTO billco_m_user (username,password,nama,role,status,role_id,created_at,mode_sidebar) VALUES ('$username',md5('$password'),'$nama','$role','$status','$role_id','$created_at','$mode_menu' )");
        return $hasil;
    } 
    // function hapus_user($id){
    //     $where = array('id' => $id);
    //     $this->M_user->hapus_data($where,'billco_m_user');
    //     redirect('User/Data_user');
    // }
    // function hapus_data($where,$table){
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }
    // function ubah_user($data,$id){
    // $this->db->where('id',$id);
    // $this->db->update('billco_m_user', $data);
    // return TRUE;
    // }
    // function ubah_pass($data,$id){
    // $this->db->where('id',$id);
    // $this->db->update('billco_m_user', $data);
    // return TRUE;
    // }
    
    // function get_data_berkas(){     
    //     $id=$this->session->userdata('id');
    //     $this->db->where('id_user',$id);
    //     return $this->db->get('m_berkas')->result();
    // }
    function insert_berkas($data)
    {
      $id=$this->session->userdata('id');  
      $query = $this->db->get_where('m_berkas', array('id_user' => $id));
        if ($query->num_rows() == 0 ) {
            $a = $this->db->insert('m_berkas', $data);
        }else{
            $this->db->where('id_user',$id);
            $a = $this->db->update('m_berkas', $data);
        }

     
      return $a;
    }    
}