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
      if(time() - $this->session->userdata['time'] > 900){
        redirect('logout');
      }
      if($this->session->userdata('super') == 0 && $this->session->userdata('loginuser')){
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
      else if($this->session->userdata('super') == 1 && $this->session->userdata('loginuser')){
        redirect("admin");
    	}
      else{
        redirect("/");
      }
    } 

    public function isRealDate($date){ 
      if (false === strtotime($date)) { 
        return false;
      } 
      else{ 
        list($year, $month, $day) = explode('-', $date); 
        if (false === checkdate($month, $day, $year)) { 
          return false;
        } 
      } 
      return true;
    }

    public function update_user(){
      $form_data = $this->input->post();
      $form_data = $this->security->xss_clean($form_data);
      if(!$this->isRealDate($form_data['birthday'])) redirect('/');
      $this->user_model->update_user($this->session->userdata('username'), $form_data);
      redirect("user");
    }
  } 
?>