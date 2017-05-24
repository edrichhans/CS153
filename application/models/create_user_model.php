<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class form_model extends CI_Model
{
	function __construct()
  {
    // Call the Model constructor
    parent::__construct();
    $this->load->database();
  }
  
	function insert_into_db()
	{
		$f1 = $_POST['field1'];
		$f2 = $_POST['field2'];
		$f3 = $_POST['field3'];
		$f4 = $_POST['field4'];
		$f5 = $_POST['field5'];
		$f6 = $_POST['field6'];
		$this->db->query("INSERT INTO 'logins' VALUES (1, '$f4', '$f5', 0, 0)");
		$this->db->query("INSERT INTO 'membership' VALUES (1, 1, 0)");
		$this->db->query("INSERT INTO 'tbl_usrs' VALUES (1, '$f4', '$f5', '$f6', 0)");
		$this->db->query("INSERT INTO 'users' VALUES (1, '$f1', '$f2', '$f3')");
	}
}
?>