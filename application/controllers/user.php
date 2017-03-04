<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		//$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('category_model');
		
		$this->load->helper('url');
		$this->load->library('parser');
	}
	public function index()
	{
		if($this->session->userdata('user_email')!="")
		{
			//echo "shalti";
			$this->dashboard();
		}
		else{
			$data['title']= 'Home';
			$this->load->view('jsandcss',$data);
			$this->load->view('login',$data);
			
		}
	}
	function dashboard()
	{
		if($this->session->userdata('user_email')!=""){
		$this->load->view('homejscss');
		$this->load->view('sidebar');
		$this->load->view('home');
		}  else{
			 redirect('http://localhost/bazaradmin');
		}
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('pass');
		
		if($email==""){
			redirect('http://localhost/bazaradmin');
		}
		
		$result=$this->user_model->login($email,$password);
		if($result){
			$this->dashboard();
		} 
		else  {
			
			 $data["error"]="Invalid User Id and Password combination";
             $this->load->view('jsandcss',$data);
			// redirect('http://localhost/bazaradmin',$data);  
			$this->load->view('login',$data);
		}   
	
		 
	}
	
	public function displayCategory()
	{
	$query = $this->user_model->getCategory();
     $data['Category'] = null;
     if($query){
      $data['Category'] =  $query;
     }
     $this->load->view('category',$data);
	}
	
	function thank()
	{
		$data['title']= 'Thank';
		$this->load->view('header_view',$data);
		$this->load->view('thank_view.php', $data);
		$this->load->view('footer_view',$data);
	}
	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		
		$this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->user_model->add_user();
			$this->thank();
		}
	}
	public function logout()
	{
		$newdata = array(
		'user_id'   =>'',
		'user_name'  =>'',
		'user_email'     => '',
		'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->index();
	}
	public function check_user_ci()
	{
		$usr=$this->input->post('user_name');
        $result=$this->user_model->check_user_exist($usr);
        if($result)
		{
			$this->form_validation->set_message('check_user', 'User Name already exit.');
			return false;
		}
		else
		{
			return true;
		}
	}
	public function check_user()
	{
		$usr=$this->input->post('name');
        $result=$this->user_model->check_user_exist($usr);
        if($result)
        {
			echo "false";
			
        }
        else{
			
			echo "true";
        }
	}
}
?>