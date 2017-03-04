<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ManageLocation extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		/*test*/
	    $this->load->library('session');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('ManageLocation_model');
		$this->load->model('user_model');
		
		$this->load->helper('url');
		$this->load->library('parser');
	}
	
	
	function displayCity(){
		if($this->session->userdata('user_email')!=""){
		    $city_id = $this->input->get('city_id');
			$data['CityState'] = $this->ManageLocation_model->getCity($city_id);
			$data['State'] = $this->ManageLocation_model->getState();
			
		$this->load->view('homejscss');
		$this->load->view('sidebar');
		$this->load->view('managecity',$data);
		}  else{
			 redirect('http://localhost/bazaradmin');
		}
	}
	
	function displayState(){
		if($this->session->userdata('user_email')!=""){
			//$user = $this->input->get('role');
			$data['CityState'] = $this->ManageLocation_model->getState();
			
		$this->load->view('homejscss');
		$this->load->view('sidebar');
		$this->load->view('managecity',$data);
		}  else{
			 redirect('http://localhost/bazaradmin');
		}
	}
	
	
	function editCity(){
		if($this->session->userdata('user_email')!=""){
			$city_id = $this->input->post('city_id');
			$city_name = $this->input->post('city_name');
			$result = $this->ManageLocation_model->editsaveCity($city_id,$city_name);
			if ($result) {
                echo "200";
            } else {
                echo "400";
            }
			
		}else{
			redirect('http://localhost/bazaradmin');
		}
		
	}
	
	
	public function addCity(){ 
		   $data=array('city_name'=>$this->input->post('city_name'),
		   'city_state'=>$this->input->post('city_state'));
		   $result = $this->ManageLocation_model->createCity($data);
            if ($result) {
                echo "200";
            } else {
                echo "400";
            }
        }
	
	
	
	
}
?>