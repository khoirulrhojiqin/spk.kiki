<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent::__construct();	   
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('upload');	
		// $this->load->model('M_ctrlactivation');	
		
		if (!$this->session->userdata('role')) {
			redirect('login');
		}	
		// if($this->session->userdata('username') != 'hoirul'){
  //             $this->session->set_userdata('maintenance','maintenance');
  //             redirect('Maintenance');
  //               $this->session->unset_userdata('maintenance');
  //     }
		
	    }
	      
	public function index()
	{	
		$this->render_page('template/admin/page/index');
	}

	public function users()
	{	
		
		$this->render_page('template/admin/page/users');
	}

	public function data1()
	{	
		
		$this->render_page('template/admin/page/data1');
	}

	

}
