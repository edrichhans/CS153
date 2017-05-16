<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model
{
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
    $this->load->database();
  }

  //get the username & password from tbl_usrs
  function get_users()
  {
    $users = "select name, address, birthday, status from logins NATURAL JOIN users";
    $users_query = $this->db->query($users);
    return $users_query->result_array();
  }

  function get_info($sessiondata){
    $user_info = "select name, address, birthday, username from users NATURAL JOIN logins where id in ( select id from logins where username = 'admin' );";
    $user_info_query = $this->db->query($user_info, array($sessiondata->username));
    return $user_info_query->row_array();
  }
}?>