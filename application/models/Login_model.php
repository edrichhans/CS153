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
          $sql = "select * from logins where username = '" . $usr . "' and password = '" . md5($pwd) . "' and status = 0";
          $query = $this->db->query($sql);
          $set_status = "update logins set status = 1 where username = '" . $user . "'";
          $this->db->query($set_status);
          return $query->num_rows();
     }
}?>