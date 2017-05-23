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
        $id = $_GET['id'];
        $info = $this->delete_other_user_model->delete_other_user($id);
        redirect("admin");
      }
    }

?>