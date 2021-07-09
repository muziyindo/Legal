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
		
		/*$ud = $this->session->userdata('userid');
        if ($ud < 1)
        {
              redirect('site','refresh');
        }*/
		
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
	
	function contracts()
	{
		$data['title'] = 'View Contracts';
		$data['page_title'] = 'View Contracts';
		$this->load_view($data,$content='view_contracts');
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
