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
              redirect('Account','refresh');
        }
		else
        {
        	if($role != "Admin")
        	{
        		redirect('Account','refresh');
        	}
        }
	}
	
	
	
	
	function addUser()
	{
		$data['title'] = 'New User';
		$data['page_title'] = 'New User Account';
		$this->load_view($data,$content='add_user');
	}
	
	function insert_user()
	{
		//$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_message('matches', 'Passwords do not match');
		$this->form_validation->set_message('is_unique', 'User with %s already exists');
		$this->form_validation->set_message('required', 'The %s field must be filled');
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			//$this->addUser();
			echo validation_errors();
		}
		else
		{
				$this->load->model('admin_model');
				$insertId = $this->admin_model->insert_user();
				$num_inserts = $this->db->affected_rows();
				if($num_inserts=="1")
				{
					/*$email = $this->input->post("email");
					$name = $this->input->post("fullname");
					$password = $this->input->post("password1");
					$message = "Hi ".$name.", <p>Your account has been successfully created, kindly find your login credentials below:</p>"."<p>Address: www.wtcooperative.com</p> <p>Username: ".$email."</p><p>Password: ".$password."<br><br>Regards,<br> WTCooperative";
					
					$this->mail_staff($email,$message);*/
					$storeFolder = './uploads/pimages/';
					if ($_FILES["doc_"]["error"]!=4)
					{
						$max_filesize=10000000 ; //10mb
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
							$base_path=$file_name='uploads/pimages/'.$base_filename;
							$this->db->query("update users set profile_image='$base_path' where id='$insertId'");
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
	
	function viewUsers()
	{
		$data['users'] = $this->admin_model->getUsers();
		$data['title'] = 'View Users';
		$data['page_title'] = 'View Users';
		$this->load_view($data,$content='view_users');
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