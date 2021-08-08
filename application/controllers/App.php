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
		$this->load->model('App_model');
		
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
	
	function contracts()
	{
		$data['title'] = 'View Contracts';
		$data['page_title'] = 'View Contracts';
		$this->load_view($data,$content='view_contracts');
	}
	
	function contractDetails()
	{
		$data['title'] = 'Contract Details';
		$data['page_title'] = 'Mr. Akeem Gbolagade Contract Details';
		$this->load_view($data,$content='contract_details');
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
