<?php

  class Delete_other_user extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->database();
      $this->load->helper('url');
      $this->load->model('delete_other_user_model');
    }

    public function index(){
      if(time() - $this->session->userdata('time') > 900){
        redirect('logout');
      }
      if($this->session->userdata('super') && $this->session->userdata('loginuser')){
        if(!isset($_GET['id'])){
          redirect('/');
        }
        $id = $_GET['id'];
        $info = $this->delete_other_user_model->delete_other_user($id);
        redirect("admin");
      }
    }
  }

?>