<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model
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
    $users = "select id, name, address, birthday, status from logins NATURAL JOIN users";
    $users_query = $this->db->query($users);
    return $users_query->result_array();
  }

  function get_info($sessiondata){
    $user_info = "select name, address, birthday, username from users NATURAL JOIN logins where id in ( select id from logins where username = ? );";
    $user_info_query = $this->db->query($user_info, array($sessiondata->username));
    return $user_info_query->row_array();
  }

  function update_user($username, $formdata){
    $query_id = "SELECT id from logins WHERE username = ?";
    $id = $this->db->query($query_id, array($username))->row()->id;
    $query_user = "UPDATE users SET name = ?, address = ?, birthday  = ? WHERE id = " . $id;
    $q = $this->db->query($query_user, array($formdata['name'], $formdata['address'], $formdata['birthday']));
  }

  function get_other_info($id){
    $user_info = "select name, address, birthday, username from users NATURAL JOIN logins where id = ?";
    $user_info_query = $this->db->query($user_info, array($id));
    return $user_info_query->row_array();
  }

  function super_user($id){
    $sql = "UPDATE logins SET super = 1 WHERE id = ?";
    $query = $this->db->query($sql, array($id));
  }

  function unsuper_user($id){
    $sql = "UPDATE logins SET super = 0 WHERE id = ?";
    $query = $this->db->query($sql, array($id));
  }
}?>