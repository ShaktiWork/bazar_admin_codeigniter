<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Region_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	
	
	
	function loadState(){
	  if ($this->session->userdata('user_email') != "") {	
	  $this->db->select("city_state");
	  $this->db->from('t_cities');
	  $this->db->group_by('city_state');
	  $query = $this->db->get();
	  return $query->result();
	  }else {
            redirect('http://localhost/bazaradmin');
        }
    }
	
	function loadRegion($state,$city){
	  if ($this->session->userdata('user_email') != "") {

	  
	  $this->db->select("regionid,region,city_name,city_state");
	  
	/* select  regionid,region,city_name,city_state From t_region where city_state="Karnataka" and city_name="Bangalore"*/
	  $this->db->from('t_region');
	   if ($state != "" && $city!="") {
		    $this->db->where('city_state',$state);
			$this->db->where('city_name',$city);
	   }
	  
	   $query = $this->db->get();
	  // echo $this->db->last_query();
	  return $query->result();
	  }else {
            redirect('http://localhost/bazaradmin');
        }
    }
	
	function load_City($state){
	  if ($this->session->userdata('user_email') != "") {	
	  $this->db->select("city_name");
	  $this->db->from('t_cities');
	  $this->db->where('city_state',$state);
	  $query = $this->db->get();
	  return $query->result();
	  }else {
            redirect('http://localhost/bazaradmin');
        }
    }
	
	/*select  city_state from t_cities  GROUP by city_state*/
}
?>

