<?php 

  class User extends CI_Controller { 	
  	public function __construct() { 
	    parent::__construct();
    	$this->load->library('session');
    	$this->load->database();
    	$this->load->helper('url');
	    $this->load->model('user_model');
    } 
  
  	public function index() { 
      if($this->session->userdata('username')){
      	$info = $this->user_model->get_info($this->session);
      	$data = array(
      		'username' => $info['username'],
      		'name' => $info['name'],
      		'birthday' => $info['birthday'],
      		'address' => $info['address'],
      	);
      	$users = $this->user_model->get_users();
      	$data['users'] = $users;
      	$this->load->view('user_view', $data);
      }
      else{
        redirect("login");
    	}
    } 
  } 

?>