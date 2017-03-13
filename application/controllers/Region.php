<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Region extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Region_model');
        $this->load->helper('url');
        $this->load->library('parser');
    }
	
	  function loadState(){
		  
		    $query  = $this->Region_model->loadState();
            $data['State'] = null;
            if ($query) {
                $data['State'] = $query;
            }
						
		    $this->load->view('homejscss');
		    $this->load->view('sidebar');
            $this->load->view('regionHome',$data);
		 }
		 
		 function loadRegion(){
		  
		    $state = $this->input->post('state');
			$city = $this->input->post('city');
		    $query  = $this->Region_model->loadRegion($state,$city);
            $data['Region'] = null;
            if ($query) {
                $data['Region'] = $query;
            }
						
		    $this->load->view('regionListing.php',$data);
		 }
		 
		  function loadCity(){
		   $state = $this->input->post('state');
		    $query  = $this->Region_model->load_City($state);
            $data['City'] = null;
            if ($query) {
                $data['City'] = $query;
            }
			echo json_encode($data);
		 }
    
   }
 
?>

