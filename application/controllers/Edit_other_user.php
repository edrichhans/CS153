<?php

  class Edit_other_user extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->database();
      $this->load->helper('url');
      $this->load->model('admin_model');
    }

    public function index(){
      if(time() - $this->session->userdata('time') > 900){
        $this->session->sess_destroy();
        redirect('login');
      }
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
        if(!isset($_GET['id'])){
          redirect('/');
        }
        $id = $_GET['id'];
        $info = $this->admin_model->get_other_info($id);
        $data = array(
          'username' => $info['username'],
          'name' => $info['name'],
          'birthday' => $info['birthday'],
          'address' => $info['address'],
        );
        echo $info['name'];
        $this->load->view('edit_other_user_view', $data);
      }
    }
  }

?>