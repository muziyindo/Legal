<?php

class App_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		//$this->load->database();
	}
	
	function getPendingReviewCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Pending_Review'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Pending_Review' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getPendingValidationCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Pending_Validation'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Pending_Validation' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getPendingSignoffCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Pending_Signoff'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Pending_Signoff' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getExpiredCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='expired' or status='terminated'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='expired' or status='terminated' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getTotalCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	
	
	
	function getFailReviewCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Fail_Review'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Fail_Review' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getFailValidationCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Fail_Validation'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Fail_Validation' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getFailSignoffCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Fail_Signoff'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Fail_Signoff' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getSignedoffCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Signed_Off'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Signed_Off' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	
	function insertContract()
	{	
		$data = array(
		"requester_id" =>$this->session->userdata('userid'), 
		"requester_title" =>$this->input->post('requester_title'),  
		"requester_name" =>$this->input->post('requester_name'),
		"requester_dept" =>$this->input->post('requester_dept'),
		"other_party_title" =>$this->input->post('other_party_title'),
		"other_party_name" =>$this->input->post('other_party_name'),
		"service_location" =>$this->input->post('service_location'),
		"authorized_signatory" =>$this->input->post('authorized_signatory'),
		"phone_no" =>$this->input->post('phone_no'),
		"email" =>$this->input->post('email'),
		"address" =>$this->input->post('address'),
		"contract_duration" =>$this->input->post('contract_duration'),
		"proposed_start_date" =>$this->input->post('proposed_start_date'),
		"proposed_end_date" =>$this->input->post('proposed_end_date'),
		"proposal_agreed_upon" =>$this->input->post('proposal_agreed_upon'),
		"termination_notice" =>$this->input->post('termination_notice'),
		"payment_term" =>$this->input->post('payment_term'),
		"sale_of_equipment" =>$this->input->post('sale_of_equipment'),
		"status" =>"Pending_Review",
		"date_created" =>date('Y-m-d'),
		"last_modified" =>date('Y-m-d'),
		"modified_by" =>$this->session->userdata('userid'),
		);
		$this->db->insert("contract",$data);
		$insertId = $this->db->insert_id();
		return $insertId ;
	
	}
	
	function getContracts($status)
	{
		if($status=="pr")
			$status="Pending_Review";
		else if($status=="pv")
			$status="Pending_Validation";
		else if($status=="ps")
			$status="Pending_Signoff";
		else if($status=="fr")
			$status="Fail_Review";
		else if($status=="fv")
			$status="Fail_Validation";
		else if($status=="fs")
			$status="Fail_Signoff";
		else if($status=="so")
			$status="Signed_Off";
		
		
			
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			if($status == "all")
			{
				$sql = "select * from contract";
				$query = $this->db->query($sql);
			}
			else
			{
				$sql = "select * from contract where status='$status'";
				$query = $this->db->query($sql);
			}
		}
		else
		{
			if($status == "all")
			{
				$sql = "select * from contract where requester_id='$requester_id'";
				$query = $this->db->query($sql);
			}
			else
			{
				$sql = "select * from contract where status='$status' and requester_id = '$requester_id'";
				$query = $this->db->query($sql);
			}
		}
		
		
		
		
		return $query->result();
	}
	
	function getContractDetails($id)
	{
		$query = $this->db->query("select * from contract where id='$id'");
		return $query->row_array();
	}
	
	function updateContract($id)
	{
		$role = $this->session->userdata('role');
		if($role == "Legal Officer")
		{
			$review = $this->input->post('review');
			$validate = $this->input->post('validate');
			$signoff = $this->input->post('signoff');
			
			$review_comment = $this->input->post('review_comment');
			$validate_comment = $this->input->post('validate_comment');
			$signoff_comment = $this->input->post('signoff_comment');
			//echo $review." ".$validate." Hello";
			
			$review_comment = str_replace("'","\'",$this->input->post('review_comment'));
			$validate_comment = str_replace("'","\'",$this->input->post('validate_comment'));
			$signoff_comment = str_replace("'","\'",$this->input->post('signoff_comment'));
			
			if(empty($review))
			{
				return 10 ; //no update 
			}
			else if($review == 1 && empty($validate) &&  empty($signoff))
			{
				//update as pending validation
				$this->db->query("update contract set status='Pending_Validation',review_comment='$review_comment' where id='$id'");
				return 1 ; //updated
			}
			else if($review == 2 && empty($validate) &&  empty($signoff))
			{
				//update as fail review
				$this->db->query("update contract set status='Fail_Review', review_comment='$review_comment' where id='$id'");	
				return 1 ; //updated
			}
			else if($validate == 1 &&  empty($signoff))
			{
				//update as pending signoff
				$this->db->query("update contract set status='Pending_Signoff', validation_comment='$validate_comment' where id='$id'");
				return 1 ; //updated
			}
			else if($validate == 2 &&  empty($signoff))
			{
				//update as fail validation
				$this->db->query("update contract set status='Fail_Validation', validation_comment='$validate_comment' where id='$id'");
				return 1 ; //updated
			}
			else if($signoff == 1)
			{
				//update as signed off
				$this->db->query("update contract set status='Signed_Off', signoff_comment='$signoff_comment' where id='$id'");
				return 1 ; //updated
			}
			else if($signoff == 2)
			{
				//update as fail signoff
				$this->db->query("update contract set status='Fail_Signoff', signoff_comment='$signoff_comment' where id='$id'");
				return 1 ; //updated
			}
			else
			{
				return 10 ;
			}	
		} 
		else if($role == "Contract Requester")
		{
			$status = $this->input->post('status');
			if($status=="Fail_Review")
				$status_ = "Pending_Review" ;
			else if($status=="Fail_Validation")
				$status_ = "Pending_Validation" ;
			else if($status=="Fail_Signoff")
				$status_ = "Pending_Signoff" ;
				
			$data = array(
			"requester_id" =>$this->session->userdata('userid'), 
			"requester_title" =>$this->input->post('requester_title'),  
			"requester_name" =>$this->input->post('requester_name'),
			"requester_dept" =>$this->input->post('requester_dept'),
			"other_party_title" =>$this->input->post('other_party_title'),
			"other_party_name" =>$this->input->post('other_party_name'),
			"service_location" =>$this->input->post('service_location'),
			"authorized_signatory" =>$this->input->post('authorized_signatory'),
			"phone_no" =>$this->input->post('phone_no'),
			"email" =>$this->input->post('email'),
			"address" =>$this->input->post('address'),
			"contract_duration" =>$this->input->post('contract_duration'),
			"proposed_start_date" =>$this->input->post('proposed_start_date'),
			"proposed_end_date" =>$this->input->post('proposed_end_date'),
			//"proposal_agreed_upon" =>$this->input->post('proposal_agreed_upon'),
			"termination_notice" =>$this->input->post('termination_notice'),
			"payment_term" =>$this->input->post('payment_term'),
			"sale_of_equipment" =>$this->input->post('sale_of_equipment'),
			//"status" =>$status_,
			//"last_modified" =>date('Y-m-d'),
			//"modified_by" =>$this->session->userdata('userid'),
			);
			$this->db->where('id', $id);
			return $this->db->update('contract', $data);
			
		}
	}
	
}
	
	
?>