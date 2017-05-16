<?php 
   class Test extends CI_Controller {  
			
			public function __construct() { 
		    parent::__construct();
	    	$this->load->library('session');
	    	$this->load->database();
		    $this->load->model('user_model');
	    } 

      public function index() { 
      	if($this->session->userdata['username'])
      		$this->load->view('user_view');
      } 
  
      public function hello() { 
         echo "This is hello function."; 
      } 
   } 
?>