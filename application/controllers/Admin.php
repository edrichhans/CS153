<?php 

  class Admin extends CI_Controller { 	
  	public function __construct() { 
	    parent::__construct();
    	$this->load->library('session');
    	$this->load->database();
    	$this->load->helper('url');
	    $this->load->model('admin_model');
    } 
  
  	public function index() { 
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
      	$info = $this->admin_model->get_info($this->session);
      	$data = array(
      		'username' => $info['username'],
      		'name' => $info['name'],
      		'birthday' => $info['birthday'],
      		'address' => $info['address']
      	);
      	$users = $this->admin_model->get_users();
      	$data['users'] = $users;
      	$this->load->view('admin_view', $data);
      }
      else if($this->session->userdata('super') == 0 && $this->session->userdata('loginuser')){
        redirect("user");
    	}
      else{
        redirect("/");
      }
    } 

    public function update_user(){
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
        $form_data = $this->input->post();
        $this->admin_model->update_user($this->session->userdata('username'), $form_data);
        redirect("user");
      }
    }

    public function update_other_user(){
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
        $form_data = $this->input->post();
        $this->admin_model->update_user($form_data['username'], $form_data);
        redirect("user");
      }
    }
  } 
?>