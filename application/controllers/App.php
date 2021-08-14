<?php

error_reporting(E_ERROR|E_WARNING);
ob_start();
class App extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library('form_validation');
		//$this->load->library('encryption');
		$this->load->library('session');
		$this->load->model('app_model');
		
		$ud = $this->session->userdata('userid');
        if ($ud < 1)
        {
              redirect('Account','refresh');
        }
		
	}
	
	function index()
	{
		$data['title'] = 'Dashboard';
		$data['page_title'] = 'Dashboard';
		$data['pendingReviewCount'] = $this->app_model->getPendingReviewCount();
		$data['pendingValidationCount'] = $this->app_model->getPendingValidationCount();
		$data['pendingSignoffCount'] = $this->app_model->getPendingSignoffCount();
		
		$data['failReviewCount'] = $this->app_model->getFailReviewCount();
		$data['failValidationCount'] = $this->app_model->getFailValidationCount();
		$data['failSignoffCount'] = $this->app_model->getFailSignoffCount();
		
		$data['signedoffCount'] = $this->app_model->getSignedoffCount();
		$data['expiredCount'] = $this->app_model->getExpiredCount();
		$data['totalCount'] = $this->app_model->getTotalCount();
		
		$this->load_view($data,$content='dashboard');
		
		
	}
	
	function add()
	{
		$data['title'] = 'New Contract';
		$data['page_title'] = 'New Contract';
		$this->load_view($data,$content='add_contract');	
	}
	
	function insertContract()
	{
		//$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		
		
		$this->form_validation->set_message('required', 'The %s field must be filled');
		$this->form_validation->set_rules('requester_title', 'Requester Title', 'trim|required');
		$this->form_validation->set_rules('requester_name', 'Requester Name', 'trim|required');
		$this->form_validation->set_rules('requester_dept', 'Department', 'trim|required');
		
		$this->form_validation->set_rules('other_party_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('other_party_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('service_location', 'Service Location', 'trim|required');
		
		$this->form_validation->set_rules('authorized_signatory', 'Authorized Signatory', 'trim|required');
		$this->form_validation->set_rules('phone_no', 'Phone Number', 'trim|required|is_unique[contract.phone_no]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[contract.email]');
		
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('contract_duration', 'Contract Duration', 'trim|required');
		$this->form_validation->set_rules('proposed_start_date', 'Proposed Start Date', 'trim|required');
		
		$this->form_validation->set_rules('proposed_end_date', 'Proposed End Date', 'trim|required');
		 if (empty($_FILES['doc_']['name']))
		{
			$this->form_validation->set_rules('doc_', 'Proposal Agreed Upon Document', 'required');
		}
		$this->form_validation->set_rules('termination_notice', 'Termination Notice', 'trim|required');
		$this->form_validation->set_rules('payment_term', 'Payment Term', 'trim|required');
		$this->form_validation->set_rules('sale_of_equipment', 'Lease or sale of equipment', 'trim|required');
		

		if ($this->form_validation->run() == FALSE)
		{
			//$this->addUser();
			echo validation_errors();
		}
		else
		{
				
				$insertId = $this->app_model->insertContract();
				$num_inserts = $this->db->affected_rows();
				if($num_inserts=="1")
				{
					/*$email = $this->input->post("email");
					$name = $this->input->post("fullname");
					$password = $this->input->post("password1");
					$message = "Hi ".$name.", <p>Your account has been successfully created, kindly find your login credentials below:</p>"."<p>Address: www.wtcooperative.com</p> <p>Username: ".$email."</p><p>Password: ".$password."<br><br>Regards,<br> WTCooperative";
					
					$this->mail_staff($email,$message);*/
					$storeFolder = './uploads/contracts/';
					if ($_FILES["doc_"]["error"]!=4)
					{
						$max_filesize=50000000 ; //50mb
						$base_uploadSize = $_FILES['doc_']['size'];
						if($base_uploadSize < $max_filesize)
						{
							$base_tempFile = $_FILES['doc_']['tmp_name'];
							
							//moving the base image
							$targetPath =$storeFolder;
							$temp = explode(".", $_FILES["doc_"]["name"]);
							$base_filename = time().$_FILES["doc_"]["name"];
							$targetFile =  $targetPath. $base_filename;
		
							//move file to directory
							move_uploaded_file($base_tempFile,$targetFile); 
							$base_path=$file_name='uploads/contracts/'.$base_filename;
							$this->db->query("update contract set proposal_agreed_upon='$base_path' where id='$insertId'");
						}
					}
					echo $insertId;
					/*$this->session->set_flashdata('message', 'success');
					redirect('admin/addUser');*/
				}
				else
				{
					echo "There is an issue with the user creation";
				}
		}
	}
	
	
	
	function contracts($status)
	{
		if(!empty($status))
		{
			$data['contracts'] = $this->app_model->getContracts($status);
			$data['title'] = 'View Contracts';
			$data['page_title'] = 'View Contracts';
			$this->load_view($data,$content='view_contracts');
		}
	}
	
	function contractDetails($id)
	{
		if(!empty($id)){
		$data['contract_details'] = $this->app_model->getContractDetails($id);
		$data['role'] = $this->session->userdata('role');
		$data['title'] = 'Contract Details';
		$data['page_title'] = $data['contract_details']['other_party_name']." Contract Details";
		$this->load_view($data,$content='contract_details');
		}
	}
	
	function updateContract()
	{
		$role = $this->session->userdata('role');
		$id = $this->uri->segment(3);
		
		if($role=="Legal Officer")
		{	
			$returnedId = $this->app_model->updateContract($id);
			echo $returnedId ;
		}
		else if($role=="Contract Requester")
		{
			$status = $this->input->post('status');
			
			$this->form_validation->set_message('required', 'The %s field must be filled');
			$this->form_validation->set_rules('requester_title', 'Requester Title', 'trim|required');
			$this->form_validation->set_rules('requester_name', 'Requester Name', 'trim|required');
			$this->form_validation->set_rules('requester_dept', 'Department', 'trim|required');
			
			$this->form_validation->set_rules('other_party_title', 'Title', 'trim|required');
			$this->form_validation->set_rules('other_party_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('service_location', 'Service Location', 'trim|required');
			
			$this->form_validation->set_rules('authorized_signatory', 'Authorized Signatory', 'trim|required');
			$this->form_validation->set_rules('phone_no', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('contract_duration', 'Contract Duration', 'trim|required');
			$this->form_validation->set_rules('proposed_start_date', 'Proposed Start Date', 'trim|required');
			
			$this->form_validation->set_rules('proposed_end_date', 'Proposed End Date', 'trim|required');
			/*if (empty($_FILES['doc_']['name']))
			{
				$this->form_validation->set_rules('doc_', 'Proposal Agreed Upon Document', 'required');
			}*/
			$this->form_validation->set_rules('termination_notice', 'Termination Notice', 'trim|required');
			$this->form_validation->set_rules('payment_term', 'Payment Term', 'trim|required');
			$this->form_validation->set_rules('sale_of_equipment', 'Lease or sale of equipment', 'trim|required');
		

			if ($this->form_validation->run() == FALSE)
			{
				//$this->addUser();
				echo validation_errors();
			}
			else
			{
				$id = $this->uri->segment(3);
				$this->app_model->updateContract($id);
				$num_inserts = $this->db->affected_rows();
				
				if($num_inserts=="1" || $_FILES["doc_"]["error"]!=4)
				{
					/*$email = $this->input->post("email");
					$name = $this->input->post("fullname");
					$password = $this->input->post("password1");
					$message = "Hi ".$name.", <p>Your account has been successfully created, kindly find your login credentials below:</p>"."<p>Address: www.wtcooperative.com</p> <p>Username: ".$email."</p><p>Password: ".$password."<br><br>Regards,<br> WTCooperative";
					
					$this->mail_staff($email,$message);*/
					$storeFolder = './uploads/contracts/';
					if ($_FILES["doc_"]["error"]!=4)
					{
						$max_filesize=50000000 ; //50mb
						$base_uploadSize = $_FILES['doc_']['size'];
						if($base_uploadSize < $max_filesize)
						{
							$base_tempFile = $_FILES['doc_']['tmp_name'];
							
							//moving the base image
							$targetPath =$storeFolder;
							$temp = explode(".", $_FILES["doc_"]["name"]);
							$base_filename = time().$_FILES["doc_"]["name"];
							$targetFile =  $targetPath. $base_filename;
		
							//move file to directory
							move_uploaded_file($base_tempFile,$targetFile); 
							$base_path=$file_name='uploads/contracts/'.$base_filename;
							$this->db->query("update contract set proposal_agreed_upon='$base_path' where id='$id'");
						}
					}
					
					
					
					
					if($status=="Fail_Review")
						$status_ = "Pending_Review" ;
					else if($status=="Fail_Validation")
						$status_ = "Pending_Validation" ;
					else if($status=="Fail_Signoff")
					$status_ = "Pending_Signoff" ;
					
					$date = date('Y-m-d');
					
					$this->db->query("update contract set status='$status_',last_modified='$date' where id='$id'");
					echo 1 ;
					/*$this->session->set_flashdata('message', 'success');
					redirect('admin/addUser');*/
				}
				else
				{
					echo 10;
				}
			}
		
		}
		
	}
	
	function downloadDoc()
	{
		$p1=$this->uri->segment(3);
		$p2=$this->uri->segment(4);
		$p3=$this->uri->segment(5);
		$full_path = $p1."/".$p2."/".$p3;
		echo $full_path." ".base_url().$full_path;
		
		$this->load->helper('file');
		$this->load->helper('download');
		
		ob_clean();
		$data = file_get_contents(base_url().$full_path);
		$name = $p3 ;
		force_download($name,$data);
	}
	
	
	function load_view($data,$content)
	{
		#$data['title'] = 'Dashboard';
		$this->load->view('template/header',$data);
		$this->load->view('template/top_nav',$data);
		$this->load->view('template/side_nav',$data);
		$this->load->view('content/'.$content,$data);
		$this->load->view('template/footer');
	}
	
	

}
	ob_clean();
?>
