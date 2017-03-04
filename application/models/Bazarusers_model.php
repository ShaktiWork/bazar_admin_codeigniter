<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bazarusers_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function getuserInfo($user){
	  if ($this->session->userdata('user_email') != "") {	
	  $this->db->select("userid,name,email,mobile,active");
	  $this->db->from('t_user');
	  $this->db->where('role',$user);
	  $query = $this->db->get();
	  return $query->result();
	  }else {
            redirect('http://localhost/bazaradmin');
        }
    }
	
	function confirmInactiveUsers($userId,$active){
		
		
		$this->db->set('active', $active); //value that used to update column  
        $this->db->where('userId', $userId); //which row want to upgrade  
        $this->db->update('t_user');  //table name
		
		//echo $this->db->last_query();
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

