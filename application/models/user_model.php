<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function login($email,$password)
    {
		$this -> db -> select('id, emailid');
		$this -> db -> from('t_admin_login');
		$this -> db -> where('emailid', $email);
        $this -> db -> where('password',$password);
		$query = $this -> db -> get();
		//echo $this->db->last_query();
		 if($query->num_rows()>0)
        {
			
			foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $rows->id,
                    	'user_email'    => $rows->emailid,
	                    'logged_in' 	=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
				
				redirect(base_url().'user/dashboard');
			exit;
                //return true;            
		}
		
		return false;
    }
	public function add_user()
	{
		$data=array(
			'emailid'=>$this->input->post('email_address'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('t_admin_login',$data);
	}
	public function check_user_exist($usr)
    {
		
        $this->db->where("username",$usr);
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	function getCategory(){
	  $this->db->select("categoryname");
	  $this->db->from('t_category');
	  $this->db->where('active',true);
	  $query = $this->db->get();
	  return $query->result();
    }
}
?>