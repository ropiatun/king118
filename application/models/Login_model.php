<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	public function checkLogin($username, $password)
	{
		return $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' ")->row();
	}
}
?>