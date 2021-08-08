<?php

class App_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		//$this->load->database();
	}
	
	function insertContract()
	{	
		$password1 = $this->input->post('password1');
		$hashed_password = password_hash($password1,PASSWORD_DEFAULT);
		$data = array(
		"fullname" => $this->input->post('fullname'),
		"email" => $this->input->post('email'),
		"role" => $this->input->post('role'),
		"username" => $this->input->post('email'),
		"password" => $hashed_password,
		"is_active" => $this->input->post('status'),
		"date_created" => date('Y-m-d'),
		"last_modified" => date('Y-m-d'),
		"action_type" => "insert",
		//"action_user" => "user", //$this->session->userdata('userid');
		);
		$this->db->insert("users",$data);
		$insertId = $this->db->insert_id();
		return $insertId ;
	}
	
}
	
	
?>