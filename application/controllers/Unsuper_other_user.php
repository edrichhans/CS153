<?php

  class Unsuper_other_user extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->database();
      $this->load->helper('url');
      $this->load->model('admin_model');
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
        $info = $this->admin_model->unsuper_user($id);
        redirect('admin');
      }
      else{
        redirect('/');
      }
    }
  }

?>