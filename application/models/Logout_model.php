<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout_model extends CI_Model
{
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
    $this->load->database();
  }

  //get the username & password from tbl_usrs
  function set_status($sessiondata){
    $data = array('status' => 0);
    $this->db->where('username', $sessiondata->username);
    $this->db->update('logins', $data);
  }
}?>