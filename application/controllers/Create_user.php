<?php

	class Create_user extends CI_Controller {
		public function __construct(){
	    parent::__construct();
      $this->load->library('session');
      $this->load->helper('url');
      $this->load->helper('form');
		}

		function index(){
			if(time() - $this->session->userdata('time') > 900){
        redirect('logout');
      }
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
        $this->load->view('create_user_view');
      }
			// $this->load->view('create_user_view');
		}
	}

?>