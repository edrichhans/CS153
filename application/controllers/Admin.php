<?php 

  class Admin extends CI_Controller { 	
  	public function __construct() { 
	    parent::__construct();
    	$this->load->library('session');
    	$this->load->database();
    	$this->load->helper('url');
	    $this->load->model('admin_model');
      $this->load->helper('form');
      $this->load->library('form_validation');
    } 
  
  	public function index() { 
      if(time() - $this->session->userdata('time') > 900){
        redirect('logout');
      }
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
        redirect("login");
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
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
        $form_data = $this->input->post();
        $form_data = $this->security->xss_clean($form_data);

        $this->form_validation->set_rules('name', 'name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('address', 'address', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('birthday', 'birthday', 'trim|required|max_length[50]');
        // $this->form_validation->set_rules('username', 'username', "trim|required|min_length[6]|max_length[20]");
        if ($this->form_validation->run() == FALSE){
          //validation fails
          redirect('/');
        }

        if(!$this->isRealDate($form_data['birthday'])) redirect('/');
        $this->admin_model->update_user($this->session->userdata('username'), $form_data);
        redirect('/');
      }
    }

    public function update_other_user(){
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
        $form_data = $this->input->post();
        $form_data = $this->security->xss_clean($form_data);

        $this->form_validation->set_rules('name', 'name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('address', 'address', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('birthday', 'birthday', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'username', "trim|required|min_length[4]|max_length[20]");
        if ($this->form_validation->run() == FALSE){
          //validation fails
          redirect('/');
        }

        if(!$this->isRealDate($form_data['birthday'])) redirect('/');
        $this->admin_model->update_user($form_data['username'], $form_data);
        redirect('/');
      }
    }

    public function create_user(){
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
        $form_data = $this->input->post();
        $form_data = $this->security->xss_clean($form_data);

        $this->form_validation->set_rules('name', 'name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('address', 'address', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('birthday', 'birthday', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'username', "trim|required|min_length[6]|max_length[20]");
        $this->form_validation->set_rules('password', 'password', "trim|required|min_length[8]|max_length[20]");
        if ($this->form_validation->run() == FALSE){
          //validation fails
          redirect('create_user');
        }

        if(!$this->isRealDate($form_data['birthday'])){
          redirect('create_user');
        }
        if($this->admin_model->create_user($form_data)) redirect('/');
        else redirect('create_user');
      }
    }
  } 
?>