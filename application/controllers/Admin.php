<?php

error_reporting(E_ERROR|E_WARNING);
ob_start();
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('admin_model');
		
		
		$ud = $this->session->userdata('userid');
		$role = $this->session->userdata('role');
        if ($ud < 1)
        {
              redirect('user_login','refresh');
        }
		else
        {
        	if($role != "admin")
        	{
        		redirect('user_login','refresh');
        	}
        }
	}
	
	function addPartner()
	{
		$data['title'] = 'Add Partner';
		$data['page_title'] = 'New Partner';
		$this->load->view('header/header',$data);
		$this->load->view('content/add_partner');
		$this->load->view('footer/footer');
	}
	
	function storePartner()
	{
		$this->form_validation->set_rules('partnerName', 'Partner Name', 'trim|required|is_unique[mf_banks.bank]');
		if ($this->form_validation->run() == FALSE)
		{
			//$this->addPartner();
			echo validation_errors();
		}
		else
		{
			$this->admin_model->storePartner();
            $num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				echo "success";
				/*$this->session->set_flashdata('message', 'partner_added');
                redirect('admin/addPartner');*/
			}
			else
			{
				echo "There is an issue";
			}
		}
	}
	
	function viewPartners()
	{
		$data['data'] = $this->admin_model->getPartners();
		$data['title'] = 'Partners';
		$data['page_title'] = 'Partners';
		$this->load->view('header/header',$data);
		$this->load->view('content/view_partners',$data);
		$this->load->view('footer/footer');
	}
	
	function changePartnerStatus($userID_,$state)
	{
		$date = date('Y-m-d');
		$userid = $this->session->userdata('userid');
		if($state=="1")
		{
			$this->db->query("update mf_banks set isActive='1',dateModified='$date',modifiedBy='$userid' where id='$userID_'");
			$num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				$this->session->set_flashdata('message', 'status_changed');
                redirect('admin/viewPartners');
			}
			else
			{
				$this->session->set_flashdata('message', 'no_change');
                redirect('admin/viewPartners');
			}
		}
		else
		{
			$this->db->query("update mf_banks set isActive='0',dateModified='$date',modifiedBy='$userid' where id='$userID_'");
			$num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				$this->session->set_flashdata('message', 'status_changed');
                redirect('admin/viewPartners');
			}
			else
			{
				$this->session->set_flashdata('message', 'no_change');
                redirect('admin/viewPartners');
			}
		}
		
	}
	
	function changeMemberStatus($userID_,$state)
	{
		$date = date('Y-m-d');
		$userid = $this->session->userdata('userid');
		if($state=="1")
		{
			$this->db->query("update members set isActive='1',dateModified='$date',modifiedBy='$userid' where id='$userID_'");
			$num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				$this->session->set_flashdata('message', 'status_changed');
                redirect('admin/viewMembers');
			}
			else
			{
				$this->session->set_flashdata('message', 'no_change');
                redirect('admin/viewMembers');
			}
		}
		else
		{
			$this->db->query("update members set isActive='0',dateModified='$date',modifiedBy='$userid' where id='$userID_'");
			$num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				$this->session->set_flashdata('message', 'status_changed');
                redirect('admin/viewMembers');
			}
			else
			{
				$this->session->set_flashdata('message', 'no_change');
                redirect('admin/viewMembers');
			}
		}
		
	}
	
	
	function changeUserStatus($userID_,$state)
	{
		$date = date('Y-m-d');
		$userid = $this->session->userdata('userid');
		if($state=="1")
		{
			$this->db->query("update users set isActive='1',last_modified='$date',action_user='$userid' where id='$userID_'");
			$num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				$this->session->set_flashdata('message', 'status_changed');
                redirect('admin/viewUsers');
			}
			else
			{
				$this->session->set_flashdata('message', 'no_change');
                redirect('admin/viewUsers');
			}
		}
		else
		{
			$this->db->query("update users set isActive='0',last_modified='$date',action_user='$userid' where id='$userID_'");
			$num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				$this->session->set_flashdata('message', 'status_changed');
                redirect('admin/viewUsers');
			}
			else
			{
				$this->session->set_flashdata('message', 'no_change');
                redirect('admin/viewUsers');
			}
		}
		
	}
	
	function addMember()
	{
		$data['title'] = 'Add Member';
		$data['page_title'] = 'New Member';
		$this->load->view('header/header',$data);
		$this->load->view('content/add_member');
		$this->load->view('footer/footer');
	}
	
	function storeMember()
	{
		$this->form_validation->set_rules('memberName', 'Member Name', 'trim|required');
		$this->form_validation->set_rules('oracleNumber', 'Oracle Number', 'trim|required|numeric|is_unique[members.oracleNumber]');
		$this->form_validation->set_rules('loanBalance', 'Loan Balance', 'trim|required|numeric');
		$this->form_validation->set_rules('savingsBalance', 'Savings Balance', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE)
		{
			//$this->addPartner();
			echo validation_errors();
		}
		else
		{
			$this->admin_model->storeMember();
            $num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				echo "success";
				/*$this->session->set_flashdata('message', 'partner_added');
                redirect('admin/addPartner');*/
			}
			else
			{
				echo "There is an issue";
			}
		}
	}
	
	function viewMembers()
	{
		$data['data'] = $this->admin_model->getMembers();
		$data['title'] = 'Partners';
		$data['page_title'] = 'Partners';
		$this->load->view('header/header',$data);
		$this->load->view('content/view_members',$data);
		$this->load->view('footer/footer');
	}
	
	function addUser()
	{
		$data['title'] = 'New user';
		$data['page_title'] = 'Add user';
		$this->load->view('header/header',$data);
		$this->load->view('content/create_user');
		$this->load->view('footer/footer');
	}
	
	function insert_user()
	{
		//$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_message('matches', 'Passwords do not match');
		$this->form_validation->set_message('is_unique', 'User with %s already exists');
		$this->form_validation->set_message('required', 'The %s field must be filled');
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		//$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		//$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		/*$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');*/
		
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->addUser();
		}
		else
		{
				$this->load->model('admin_model');
				$this->admin_model->insert_user();
				$num_inserts = $this->db->affected_rows();
				if($num_inserts=="1")
				{
					$email = $this->input->post("email");
					$name = $this->input->post("fullname");
					$password = $this->input->post("password1");
					$message = "Hi ".$name.", <p>Your account has been successfully created, kindly find your login credentials below:</p>"."<p>Address: www.wtcooperative.com</p> <p>Username: ".$email."</p><p>Password: ".$password."<br><br>Regards,<br> WTCooperative";
					
					$this->mail_staff($email,$message);
					$this->session->set_flashdata('message', 'success');
					redirect('admin/addUser');
				}
				else
				{
					echo "There is an issue with the user creation";
				}
		}
	}
	
	function viewUsers()
	{
		$data['all_users'] = $this->admin_model->get_all_users();
		$data['title'] = 'users';
		$data['page_title'] = 'View Users';
		$this->load->view('header/header',$data);
		$this->load->view('content/view_users',$data);
		$this->load->view('footer/footer');
	}
	
	function mail_staff($email,$message)
	{
			//require_once(APPPATH."third_party/mailer/PHPMailerAutoload.php");
			
			//for godaddy
			$config = Array(
			'mailpath' => '/usr/sbin/sendmail',
			'protocol' => 'sendmail',
			'smtp_host' => 'relay-hosting.secureserver.net',
			'smtp_port' => 25,
			'smtp_user' => 'notification@wtcooperative.com',
			'smtp_pass' => 'Default@123',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap'	=> TRUE
			);

			/*$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.wtcooperative.com',
			'smtp_port' => 25,
			'smtp_user' => 'notification@wtcooperative.com',
			'smtp_pass' => 'Default@123',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap'	=> TRUE
			);*/
			
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('notification@wtcooperative.com', 'WTCooperative Notification');
			$this->email->set_newline("\r\n");
			$this->email->to($email); //();
			
			//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
			$this->email->subject('Your Login credentials');
			$this->email->message($message);
			$this->email->send();
	}
	
}

ob_clean();
?>