<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User  extends MY_Controller {
        function __construct(){

            parent::__construct();     
            $this->load->helper('form');
            // $this->load->helper('url');
            // $this->load->helper('file');
            // $this->load->helper('download');
            // $this->load->library('zip');
            $this->load->library('session');
            // $this->load->library('upload');  
            $this->load->model('M_user');  
            // $this->load->library('user_agent');   
            // #18b7b0
            
        if($this->session->userdata('role_id') != TRUE){
              $url='Login';
              redirect($url);
          }
          // else{
          //   if($this->session->userdata('role_id') != '1'){
          //       redirect('auth/blocked');
          //   }
          // } 

            
        }

	public function index()
	{
        // $data['user'] = $this->M_user->get_data();
        $this->render_page('template/admin/page/users');
	}

  public function userprofile()
  { 
      $data['user_profil'] = $this->M_user->get_data_profil();
      $this->render_page('template/admin/page/userprofile',$data);
  }
   
    function simpan_user(){        
        $username= $this->security->xss_clean($this->input->post('username'));
        $role = $this->input->post('role');
        $created_at = gmdate('Y-m-d H:i:s', strtotime("-3",time()));
        if ($role==1) {
            $r='admin';
        }else if ($role==2) {
            $r='dosen';
        }else{
            $r='mahasiswa';
        }

        $data = [
          'username' => $this->input->post('username'),
          'password' => md5($this->input->post('password')),
          'nama' => $this->input->post('nama'),
          'role' => $r,
          'status' => 1,
          'aktif' => 1,
          'role_id' => $this->input->post('role'),
          'created_at'=>$created_at
        ];

        $query = $this->db->get_where('m_user', array('username' => $username));
        if ($query->num_rows() != 0 ) {
            echo json_encode('gagal');
        }else{
            $data2 = $this->security->xss_clean($data);
            $data=$this->db->insert('m_user', $data2);
            echo json_encode($data);
        }
        
    }

    public function show_user(){
     $data = $this->db->get('m_user')->result();
     echo json_encode($data);
    }


    public function hapus_user(){
    $id=$this->input->post('id');
    $this->db->where('id',$id);
    $hasil = $this->db->delete('m_user');
 
    }

     public function get_user(){
      $id = $this->input->get('id');
      $this->db->where('id',$id);
      $hsl = $this->db->get('m_user');
      if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
              $hasil=array(
                  'id' => $data->id,
                  'nama' => $data->nama,
                  'username' => $data->username,
                  'role_id' => $data->role_id,
                  );
          }
      } 
      echo json_encode($hasil);
    }

    public function update_user(){
        $id=$this->input->post('id');
        $role=$this->input->post('role');
        $name=$this->input->post('name');
        $username=$this->input->post('username');
        if ($role==1) {
            $r='admin';
        }else if ($role==2) {
            $r='dosen';
        }else{
            $r='mahasiswa';
        }
        $data = array(
          'role' => $r,
          'nama' => $name,
          'username' => $username,
        );
        $data2 = $this->security->xss_clean($data);
        $this->db->where('id',$id);
        $hasil = $this->db->update('m_user',$data2);
           
        echo json_encode($hasil);

    }
    public function update_password(){
        $id=$this->input->post('id');
        $pass=md5($this->input->post('pass'));
        $data = array(
          'id' => $id,
          'password' => $pass,
        );
        $data2 = $this->security->xss_clean($data);
        $this->db->where('id',$id);
        $hasil = $this->db->update('m_user',$data2);
           
        echo json_encode($hasil);

    }

    public function update_password2(){
        $id=$this->input->post('id');
        $old_pass=md5($this->input->post('old_pass'));
        $pass=md5($this->input->post('pass'));
        $data = array(
          'id' => $id,
          'password' => $pass,
        );
        $data2 = $this->security->xss_clean($data);
        $query = $this->db->get_where('m_user', array('id' => $id, 'password' => $old_pass));
        if ($query->num_rows() == 0 ) {
            echo json_encode('gagal');
        }else{
            $this->db->where('id',$id);
            $hasil = $this->db->update('m_user',$data2);
            echo json_encode($hasil);
        }
        

    }

    public function update_profil(){
        $id=$this->input->post('id');
        $email=$this->input->post('email');
        $tgl=$this->input->post('tgl');
        $gender=$this->input->post('gender');
        $hp=$this->input->post('hp');
        $alamat=$this->input->post('alamat');
        $about=$this->input->post('about');
        $data = array(
          'id_user' => $id,
          'email' => $email,
          'tgl_lahir' => $tgl,
          'gender' => $gender,
          'no_hp' => $hp,
          'alamat' => $alamat,
          'tentang_saya' => $about,
        );
        $data2 = $this->security->xss_clean($data);
        $query = $this->db->get_where('m_user_detail', array('id_user' => $id));
        if ($query->num_rows() != 0 ) {
          $this->db->where('id_user',$id);
          $hasil = $this->db->update('m_user_detail',$data2);
        }else{
          $hasil = $this->db->insert('m_user_detail',$data2);
        }           
        echo json_encode($hasil);

    }
	// public function simpan_user(){
 //        $username= $this->security->xss_clean($this->input->post('username'));
 //        $password= $this->security->xss_clean($this->input->post('password'));
 //        $nama= $this->security->xss_clean($this->input->post('nama'));
 //        $role= $this->security->xss_clean($this->input->post('role'));


 //        $query = $this->db->get_where('m_user', array('username' => $username));
 //        if ($query->num_rows() != 0 ) {
 //            $this->session->set_flashdata('notifsimpan_gagal','<div class="alert alert-warning" role="alert"> Username telah terpakai <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 //             redirect('User');
 //        }else{
          
 //            $this->M_user->simpan_user($username,$password,$nama,$role);
 //            $this->session->set_flashdata('notifsimpan','<div class="alert alert-success" role="alert"> Username Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 //            redirect('User');
 //        }
 //    }
 //    public function hapus_user($id){
	// 	$where = array('id' => $id);
	// 	$this->M_user->hapus_data($where,'billco_m_user');
	// 		$data['id'] = $id;
	// 		$data['execute'] = true;		
	// 	echo json_encode(array('respon'=>$data));
	// 	$this->session->set_flashdata('notifhapus','<div class="alert alert-success" role="alert"> Username Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	// }

	// function ubah_user(){
 //    $id = $this->input->post('id');
 //    $role = $this->input->post('role');
 //    if ($role == 'super user') {
 //        $role_id = 1;
 //    }elseif($role == 'general manager'){
 //        $role_id = 2;
 //    }elseif($role == 'manager'){
 //        $role_id = 3;
 //    }elseif($role == 'supervisor'){
 //        $role_id = 4;
 //    }
 //    $data = array(
 //        'username'  => $this->input->post('username'),
 //        'nama'  => $this->input->post('nama'),
 //        'role' => $this->input->post('role'),
 //        'status'    => $this->input->post('status'),
 //        'role_id'    => $role_id

 //        );
 //        $query = $this->db->get_where('billco_m_user', array('username' => $data['username']));
 //        if ($query->num_rows() != 0 ) {
 //            $data2 = array(
 //                'nama'  => $this->input->post('nama'),
 //                'role' => $this->input->post('role'),
 //                'status'    => $this->input->post('status'),
 //                'role_id'    => $role_id
 //                );
 //            $data_x=$this->security->xss_clean($data2);
 //            $this->M_user->ubah_user($data_x,$id);
 //            $this->session->set_flashdata('notifsimpan_gagal','<div class="alert alert-success" role="alert">Perubahan berhasil<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 //             redirect('User');
 //        }else{
 //            $datax=$this->security->xss_clean($data);
 //            $this->M_user->ubah_user($datax,$id);
 //            $this->session->set_flashdata('notifubah','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 //            redirect('User');
 //            }
 //    }

 //    function ubah_pass(){
 //    $id = $this->input->post('id');
 //    $username = $this->input->post('pass');
 //    $data = array(
 //        'password'  => md5($username),
 //        'status'  => 0
 //        );
 //    $this->M_user->ubah_pass($data,$id);
 //    $this->session->set_flashdata('notifubahpass','<div class="alert alert-success" role="alert"> Password Berhasil di Reset <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 //    redirect('User');
 //    }

 //    public function get_data_user_aktifnonaktif(){
 //      $id = $this->input->get('id');
 //      $this->db->where('id',$id);
 //      $hsl = $this->db->get('billco_m_user');
 //      if($hsl->num_rows()>0){
 //          foreach ($hsl->result() as $data) {
 //              $hasil=array(
 //                  'id' => $data->id,
 //                  'username' => $data->username,
 //                  'is_active' => $data->aktif
 //                  );
 //          }
 //      } 
 //      echo json_encode($hasil);
 //    }

 //    public function update_user_aktifnonaktif(){
 //    $id=$this->input->post('id');
 //    $data = array(
 //          'aktif' => $this->input->post('is_active')
 //        );

 //    $data2 = $this->security->xss_clean($data);
 //    $this->db->where('id',$id);
 //    $hasil = $this->db->update('billco_m_user',$data2);
       
 //    echo json_encode($hasil);
 //  }

	// END Data User
}