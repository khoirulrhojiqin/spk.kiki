<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// ob_start();
class MY_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
	    $this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('upload');
		}
	function render_page($content, $datax = NULL){ 
        $datax['header']=$this->load->view('template/admin/core/header',$datax, TRUE);
        $datax['sidebar']=$this->load->view('template/admin/core/sidebar',$datax, TRUE);
        $datax['navbar']=$this->load->view('template/admin/core/navbar',$datax, TRUE);
        $datax['content']=$this->load->view($content,$datax, TRUE);
        $datax['footer']=$this->load->view('template/admin/core/footer',$datax, TRUE);
        $this->load->view('template/admin/core/index',$datax);
    }
    
    public function authenticated(){ 
        if($this->uri->segment(1) != 'login' && $this->uri->segment(1) != ''){
            if( ! $this->session->userdata('authenticated'))
                redirect('login');
        }
    }
}