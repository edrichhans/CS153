<?php 

  class Logout extends CI_Controller { 	
  	public function __construct() { 
	    parent::__construct();
    	$this->load->library('session');
      $this->load->helper('url');
      $this->load->model('logout_model');
    	$this->load->database();
    } 
  
  	public function index() { 
      if(!$this->session->userdata('username')){
        redirect("login");
      }
      else {
      	$this->session->sess_destroy();
        $this->logout_model->set_status($this->session);
        redirect("login");
      }
    } 
  } 

?>