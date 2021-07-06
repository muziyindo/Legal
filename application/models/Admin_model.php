<?php

class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
		//$this->load->database();
	}
	
	function storePartner()
	{
		$data = array(
		"bank" => strtoupper($this->input->post('partnerName')),
		"description" => $this->input->post('description'),
		"dateAdded" => date('Y-m-d'),
		"dateModified" => date('Y-m-d'),
		"ModifiedBy" => $this->session->userdata('userid'),
		"isActive" => "1"
		);
		return $this->db->insert("mf_banks",$data);
	}	
	
	
	function getPartners()
	{
		$sql = "select * from mf_banks";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function insert_user()
	{
			$fullname = $this->input->post('fullname');
			$email = $this->input->post('email');
			$company = "NA";
			$role = $this->input->post('role');
			$username = $email ;
			$password1 = $this->input->post('password1');
			$password2 = $this->input->post('password2');
			$status = "1";
			$date_created = date('Y-m-d');
			$action_type='insert';
			$action_user = $this->session->userdata('uname');
			$encrypted_password = $this->encrypt->encode($password1);
			return $this->db->query("INSERT INTO users (name, email, company, role, username, password,isActive,date_created,last_modified,action_type,action_user) VALUES ('$fullname', '$email', '$company', '$role', '$username', '$encrypted_password','$status','$date_created','$date_created','$action_type','$action_user')");
	}
	
	function storeMember()
	{
		
		$data = array(
		"name" => strtoupper($this->input->post('memberName')),
		"oracleNumber" => $this->input->post('oracleNumber'),
		"savingsStartingBalance" => $this->input->post('savingsBalance'),
		"loanStartingBalance" => $this->input->post('loanBalance'),
		"savingsBalance" => $this->input->post('savingsBalance'),
		"loanBalance" => $this->input->post('loanBalance'),
		"dateAdded" => date('Y-m-d'),
		"dateModified" => date('Y-m-d'),
		"ModifiedBy" => $this->session->userdata('userid'),
		"isActive" => "1"
		);
		return $this->db->insert("members",$data);
	}	
	
	function getMembers()
	{
		$sql = "select * from members";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_all_users()
	{
		$sql = "select * from users";
		$query = $this->db->query($sql);
		return $query->result();
	}
}
	
	
?>