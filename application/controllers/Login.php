<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_login');   
    }
 
    public function index(){
    if($this->session->userdata('authenticated')) 
      redirect('home');
    $this->load->view('template/login/login');
  }
  public function login(){
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $user = $this->M_login->get($username);
    if(empty($user)){
      $this->session->set_flashdata('message', 'Username tidak ditemukan');
      redirect('login');
    }else{
      if($username==$user->username AND $password == $user->password AND $user->status=='1' AND $user->aktif=='1'){
        $session = array(
          'authenticated'=>true,
          'id'=>$user->id,
          'username'=>$user->username,
          'nama'=>$user->nama,
          'role'=>$user->role,
          'role_id'=>$user->role_id,
          'aktif'=>$user->aktif
        );
        $this->session->set_userdata($session);
        helper_log('login', 'Login user');
        redirect('home');
      }
      // elseif ($username==$user->username AND $password == $user->password AND $user->status=='0') {
      //   $id = array(
      //     'id'=>$user->id
      //   );
      //   $this->session->set_userdata($id);
      //   redirect('login/auth_password');
      // }
      // elseif ($username==$user->username AND $password == $user->password AND $user->aktif=='0') {
      //   $this->session->set_flashdata('message', 'Akun di non-aktifkan, silahkan hubungi Administrator');
      //   redirect('login');
      // }
      else{
        $this->session->set_flashdata('message', 'Password salah');
        redirect('login');
      }
    }
  }

  // public function landing_page(){
  //   if($this->session->userdata('role') != TRUE){
  //             $url='login';
  //             redirect($url);
  //         }
  //   if ($this->session->userdata('username') == 'disco_kalimantan' || $this->session->userdata('username') == 'tes' || $this->session->userdata('username') == 'disco_puma' || $this->session->userdata('username') == 'disco_sulawesi') {
  //     redirect('nodin_disco/nodin_disco');
  //   }else{
  //     $this->load->view('template/login/landing_page');  
  //   }  
  // }

      public function logout(){
        helper_log('logout', 'Logout user');
        $this->session->sess_destroy();
        redirect('login');
      }
      // public function auth_password(){
      //   $this->load->view('template/login/auth_password');
      // }

      function update_pass(){
      $id = $this->input->post('id');
      $status = $this->input->post('status');
      $password = $this->input->post('password');
      $length = strlen($password);
      $data = array(
        'password' => md5($password),
        'status' => $status
      );
      $where = array(
        'id' => $id
      );
      $cek = $this->db->query("SELECT * FROM billco_m_user where id='$id'")->row();
      if ($length < 8) {
        $this->session->set_flashdata('passwordnotsame', 'Kata sandi minimal 8 karakter !');
        $this->load->view('template/login/auth_password');
      }else if ($cek->id==$where['id'] AND $cek->password==$data['password']) {
        $this->session->set_flashdata('passwordnotsame', 'Password tidak boleh sama, silahkan input kembali dengan password yang baru');
        $this->load->view('template/login/auth_password');
      }else{
        $this->M_login->update_pass($where,$data,'billco_m_user');
        $this->session->set_flashdata('success', 'Password berhasil diganti, silahkan login kembali');
        redirect('login');
      }
    }
    function update_pass2(){
      $id = $this->input->post('id');
      $password_old = $this->input->post('password_old');
      $password = $this->input->post('password');
     
      $data = array(
        'password' => md5($password)
      );
      $where = array(
        'id' => $id
      );
      $qr = $this->db->query("SELECT password FROM billco_m_user where id=$id")->row_array();
      if ($qr['password'] == md5($password_old)) {
           $this->M_login->update_pass2($where,$data,'billco_m_user');
          $this->session->set_flashdata('success_pass', 'Password berhasil diganti');
          redirect('Admin');
         } 
         else{
          $this->session->set_flashdata('wrong_pass', 'Password gagal diganti, pastikan password lama sudah sesuai');
          redirect('Admin');
         }  
    }
}