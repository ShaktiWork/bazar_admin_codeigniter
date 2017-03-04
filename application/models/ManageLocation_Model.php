<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Managelocation_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function getCity($city_id){
	  if ($this->session->userdata('user_email') != "") {	
	  $this->db->select("city_id,city_state,city_name");
	  if($city_id!=""){
		 $this->db->where('city_id',$city_id);
	  }
	  $this->db->from('t_cities');
	  $query = $this->db->get();
	  $this->db->last_query();
	  return $query->result();
	  }else {
            redirect('http://localhost/bazaradmin');
        }
    }
	
	//SELECT city_id,city_state from t_cities  GROUP by city_state
	function getState(){
	  if ($this->session->userdata('user_email') != "") {	
	  $this->db->select("city_id,city_state ");
	  $this->db->group_by('city_state'); 
	  $this->db->from('t_cities');
	  $query = $this->db->get();
	  return $query->result();
	  }else {
            redirect('http://localhost/bazaradmin');
        }
    }
	
	
	 public function editsaveCity($city_id,$city_name){
		   $this->db->set('city_name', $city_name); //value that used to update column  
        $this->db->where('city_id', $city_id); //which row want to upgrade  
        $this->db->update('t_cities');  //table name
		if ($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
      }
	  
	  public function createCity($data){
		$this->db->insert('t_cities',$data);
		if ($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		
	
	
}
?>

