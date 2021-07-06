<?php

class App_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		//$this->load->database();
	}
	
	function registeri()
	{		
			$password1 = $this->input->post('password1');
			$encrypted_password = $this->encrypt->encode($password1);
			$data = array(
			"fname" => $this->input->post('fname'),
			"lname" => $this->input->post('lname'),
			"email" => $this->input->post('email'),
			"username" => $this->input->post('email'),
			"password" => $encrypted_password,
			"date_created" => date('Y-m-d'),
			"last_modified" => date('Y-m-d'),
			"modified_by" => $this->input->post('fname')." ".$this->input->post('lname'),
			"is_active" => "1"
			);
			return $this->db->insert("applicants",$data);
	}
	
	function insertQ1()
	{
		$applicant_id = $this->session->userdata('userid');
		$applicant_name = $this->session->userdata('name');
		$applicant_email = $this->session->userdata('email');
		$job_position_id = $this->session->userdata('job_position_id');
		
		$q1 = $this->input->post('q1');
		
		if(empty($q1))
		{
			$data = array(
			"applicant_id" => $applicant_id,
			"name" => $applicant_name,
			"position_applied_for_id" => $job_position_id,
			"email" => $applicant_email,
			"date_added" => date('Y-m-d'),
			"last_modified" => date('Y-m-d')
			//"q1" => $this->input->post('q1')
			);
			$this->db->insert("iq_scores",$data);
			$insertId = $this->db->insert_id();
			return $insertId ;
		}
		else
		{
			$data = array(
			"applicant_id" => $applicant_id,
			"name" => $applicant_name,
			"position_applied_for_id" => $job_position_id,
			"email" => $applicant_email,
			"q1" => $this->input->post('q1'),
			"date_added" => date('Y-m-d'),
			"last_modified" => date('Y-m-d')
			);
			$this->db->insert("iq_scores",$data);
			$insertId = $this->db->insert_id();
			return $insertId ;
		}
	}
	
	function updateQ1()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q1" => $this->input->post('q1')
		);
		////$insertId = $this->input->post('insertId2');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}
	
	function updateQ2()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q2" => $this->input->post('q2')
		);
		////$insertId = $this->input->post('insertId2');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}

	function updateQ3()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q3" => $this->input->post('q3')
		);
		////$insertId = $this->input->post('insertId3');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ4()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q4" => $this->input->post('q4')
		);
		////$insertId = $this->input->post('insertId4');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ5()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q5" => $this->input->post('q5')
		);
		////$insertId = $this->input->post('insertId5');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		return $insertId;
	}	

	function updateQ6()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q6" => $this->input->post('q6')
		);
		//$insertId = $this->input->post('insertId6');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ7()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q7" => $this->input->post('q7')
		);
		////$insertId = $this->input->post('insertId7');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ8()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q8" => $this->input->post('q8')
		);
		////$insertId = $this->input->post('insertId8');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ9()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q9" => $this->input->post('q9')
		);
		////$insertId = $this->input->post('insertId9');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ10()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q10" => $this->input->post('q10')
		);
		////$insertId = $this->input->post('insertId10');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ11()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q11" => $this->input->post('q11')
		);
		////$insertId = $this->input->post('insertId11');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ12()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q12" => $this->input->post('q12')
		);
		////$insertId = $this->input->post('insertId12');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ13()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q13" => $this->input->post('q13')
		);
		////$insertId = $this->input->post('insertId13');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		
	}	
	
	function updateQ14()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q14" => $this->input->post('q14')
		);
		////$insertId = $this->input->post('insertId14');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		return $insertId;
	}	
	
	function updateQ15()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q15" => $this->input->post('q15')
		);
		////$insertId = $this->input->post('insertId15');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		return $insertId;
	}	
	
	function updateQ16()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q16" => $this->input->post('q16')
		);
		//$insertId = $this->input->post('insertId16');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		return $insertId;
	}	
	
	function updateQ17()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q17" => $this->input->post('q17')
		);
		//$insertId = $this->input->post('insertId17');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		return $insertId;
	}	
	
	function updateQ18()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q18" => $this->input->post('q18')
		);
		//$insertId = $this->input->post('insertId18');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		return $insertId;
	}	
	
	function updateQ19()
	{
		$applicant_id = $this->session->userdata('userid');
		$data = array(
		"q19" => $this->input->post('q19')
		);
		//$insertId = $this->input->post('insertId19');
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		return $insertId;
	}

	function updateQ20()
	{
		$applicant_id = $this->session->userdata('userid');
		$q20 = $this->input->post('q20');
		if($q20 == NULL) //if user didn't select any option and just clicks next
		{
			$data = array(
			"submitted" => "yes",
			"last_modified" => date('Y-m-d')	
			);
		}
		else if($q20 == 0 || $q20 == 5)
		{
			$data = array(
			"q20" => $this->input->post('q20'),
			"submitted" => "yes",
			"last_modified" => date('Y-m-d')
			);
		}
		
		$this->db->where("applicant_id",$applicant_id);
		$this->db->update("iq_scores",$data);
		$this->update_on_odoo();
		
		return $insertId;
	}

	function update_on_odoo()
	{
		$applicant_email = $this->session->userdata('email');
		$job_position_id = $this->session->userdata('job_position_id');
		$score = $this->getIQScores();
		
		
		//live environment
		$url = "https://netcomafrica.odoo.com";
		$db = "mceesolutions-netcom-master-31269";
		$username = $this->encryption->decrypt($this->getUserName());
		$password = $this->encryption->decrypt($this->getPassword());
		
		

		//require_once('ripcord.php');
		require_once(APPPATH.'libraries/ripcord.php');
		
		//$this->load->library('PHPExcel/Classes/PHPExcel');

		$common = ripcord::client("$url/xmlrpc/2/common");
		$uid = $common->authenticate($db, $username, $password, array());


		$models = ripcord::client("$url/xmlrpc/2/object");

		$id = $models->execute_kw($db, $uid, $password,
    'hr.applicant', 'search',
    array(array(array('email_from', '=', $applicant_email),
                array('job_id', '=', intval($job_position_id)))),
    array('limit'=>1));
	
	//var_dump($id);
	
	$app_id = $id[0];
	//echo $app_id;

//To update the the appilcant table
$models->execute_kw($db, $uid, $password, 'hr.applicant', 'write',
    array(array($app_id), array('intelligence_quotient'=>intval($score))));

	}
	
	function getIQScores()
	{
		$applicant_id = $this->session->userdata('userid');
		$query = $this->db->query("select q1+q2+q3+q4+q5+q6+q7+q8+q9+q10+q11+q12+q13+q14+q15+q16+q17+q18+q19+q20 as tot_score from iq_scores where applicant_id = '$applicant_id' ");
		foreach($query->result() as $value)
		{
			$tot_score = $value->tot_score;
		}
		return $tot_score ;
	}
	
	function getUserName()
	{
		$query = $this->db->query("SELECT log_name FROM logs_ where id = '1' ");
		foreach($query->result() as $value)
		{
				$un = $value->log_name;
		}
		return $un;
	}
	
	function getPassword()
	{
		$query = $this->db->query("SELECT log_term FROM logs_ where id = '1' ");
		foreach($query->result() as $value)
		{
				$pw = $value->log_term;
		}
		return $pw;
	}
	
}
	
	
?>