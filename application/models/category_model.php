<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function getCategory(){
	  if ($this->session->userdata('user_email') != "") {	
	  $this->db->select("catid,categoryname,imagepath");
	  $this->db->from('t_category');
	  $this->db->where('active',true);
	  $query = $this->db->get();
	  return $query->result();
	  }else {
            redirect('http://localhost/bazaradmin');
        }
    }
	
	function confirmDeleteCategory($catid){
		
		$this->db->set('active', 0); //value that used to update column  
        $this->db->where('catid', $catid); //which row want to upgrade  
        $this->db->update('t_category');  //table name
		if ($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function createCategory($data)
	{
		$this->db->insert('t_category',$data);
		if ($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function createsubCategory($data)
	{
		$this->db->insert('t_subcategory',$data);
		if ($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function getsubCategory($category){
	  if ($this->session->userdata('user_email') != "") {	
	  $this->db->select("subcatid,subcategoryname");
	  $this->db->from('t_subcategory');
	  $this->db->where('active',true);
	  if($category!=""){
		   $this->db->where('categoryname',$category);
	  }
	 
	  $query = $this->db->get();
	  return $query->result();
	  }else {
            redirect('http://localhost/bazaradmin');
        }
    }
}
?>