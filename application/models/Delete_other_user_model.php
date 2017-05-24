<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class delete_other_user_model extends CI_Model
{
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
    $this->load->database();
  }

  //get the username & password from tbl_usrs
  function delete_other_user($id){
    $sql = "select super from logins where id = ?";
    $query = $this->db->query($sql, array($id));
    $super = $query->row()->super;
    if ($super == 0){
      $sql1 = "delete from logins where id = ?";
      $query1 = $this->db->query($sql1, array($id));
      $sql2 = "delete from users where id = ?";
      $query2 = $this->db->query($sql2, array($id));      
    }
  }
}?>
