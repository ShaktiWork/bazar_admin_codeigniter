<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bazarusers extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		//$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('Bazarusers_model');
		$this->load->model('user_model');
		$this->load->model('category_model');
		
		$this->load->helper('url');
		$this->load->library('parser');
	}
	public function index()
	{
		if($this->session->userdata('user_email')!="")
		{
			
			$this->displayUsers();
		}
		else{
			$data['title']= 'Home';
			$this->load->view('jsandcss',$data);
			$this->load->view('login',$data);
			
		}
	}
	
	function displayUsers(){
		if($this->session->userdata('user_email')!=""){
			$user = $this->input->get('role');
			$data['Users'] = $this->Bazarusers_model->getuserInfo($user);
			
		$this->load->view('homejscss');
		$this->load->view('sidebar');
		$this->load->view('bazarusers',$data);
		}  else{
			 redirect('http://localhost/bazaradmin');
		}
	}
	
	 public function activeInactiveUsers()
    {
        $userId = $this->input->post('userId');
		$active = $this->input->post('active');
        if ($userId != "") {
            $result = $this->Bazarusers_model->confirmInactiveUsers($userId,$active);
            if ($result) {
                echo "200";
				//$data['status'] = "200";
				
				
            } else {
				echo "400";
              // $data['status'] = "400";
            }
        }
		//$data['Users'] = $this->Bazarusers_model->getuserInfo('retailer');
		//$this->load->view('bazarusers',$data);
        
    }
	
	
	
	
}
?>