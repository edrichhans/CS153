<?php
class createuser extends CI_Controller {
	public function __construct(){
		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->library('form_validation');
		$this->load->view('create_user_view.php');
	}

	function insert_to_db(){
		$this->load->model('form_model');
		$this->form_model->insert_to_db();
	}
}