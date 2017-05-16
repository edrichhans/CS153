<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
    $this->load->database();
  }

  //get the username & password from tbl_usrs
  function get_user($usr, $pwd)
  {
    $sql = "select super from logins where username = ? and password = ?";
    $query = $this->db->query($sql, array($usr, md5($pwd)));
    if($query->num_rows()){
      $set_status = "update logins set status = 1 where username = ?";
      $this->db->query($set_status, array($usr));
    }
    return $query;
  }
}?>