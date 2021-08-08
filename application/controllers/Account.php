<?php

error_reporting(E_ERROR|E_WARNING);

class Account extends CI_Controller 
{

   public function __construct()
   {
       parent::__construct();

		$this->load->database();
       //$this->load->library('encrypt');
	   $this->load->library('encryption');
	   
       $this->load->library('session');
       $this->load->library('form_validation');
	   
   }
   
	function index()
	{
		$data['title'] = 'Login Page';
		//$this->load->view('header/login_header',$data);
		$this->load->view('content/login',$data);
		//$this->load->view('footer/footer');
		
	}
   
   function authenticate()
   {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check = $this->db->query("SELECT * FROM users WHERE username='$username' and is_active='1'");
		
		if($check->num_rows()>0)
		{  
			
			$pword = $this->db->query("SELECT password FROM users WHERE username='$username' and is_active='1'");
			$pword = $pword->result();
			
			//$decrypted_password = $this->encrypt->decode($pword[0]->password);
			
			$verify = password_verify($password,$pword[0]->password);
			
			if($verify==1)
			{
			//if($decrypted_password==$password)
			//{
				
				//get user details
				foreach($check->result() as $value)
				{
					$uid = $value->id ;
					$username = $value->username ;
					$name = $value->fullname ;
					$role = $value->role ;
					$email = $value->email ;
					$pimage = $value->profile_image ;
					//$lname = $value->lname ;
					
			
				}
				
				//store user details in session
				$this->session->set_userdata('userid', $uid);
				$this->session->set_userdata('uname', $username);
				$this->session->set_userdata('name', $name);
				$this->session->set_userdata('role', $role);
				$this->session->set_userdata('email', $email);
				$this->session->set_userdata('pimage', $pimage);
				
				//echo "success-2";
				
				redirect('App','refresh');
			}
			else
			{
				$this->session->set_flashdata('message', 'invalid_password');
				redirect('Account');
				//echo "success-3";
				
				
			}
			
		}
		else
		{
			$this->session->set_flashdata('message', 'invalid_user');
			redirect('Account');
			//echo "success-4";
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		redirect(site_url('Account'));
	}
   
   
  

}//end controller class



?>