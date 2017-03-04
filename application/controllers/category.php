<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('category_model');
        $this->load->helper('url');
        $this->load->library('parser');
    }
    
    
    
    public function displayCategory()
    { 
	  
			$this->load->view('homejscss');
		    $this->load->view('sidebar');
            $this->load->view('category');
      
    }
	
	 public function loadCategory()
    { 
	  $query  = $this->category_model->getCategory();
            $data['Category'] = null;
            if ($query) {
                $data['Category'] = $query;
            }
			
            $this->load->view('categoryListing', $data);
      
    }
	
    public function deleteCategory()
    {
        $catid = $this->input->post('catid');
        if ($catid != "") {
            $result = $this->category_model->confirmDeleteCategory($catid);
            if ($result) {
                echo "200";
            } else {
                echo "400";
            }
        }
        
    }
	
	   public function addCategory(){
		   $data=array('categoryname'=>$this->input->post('categoryname'),
		   'active'=>1,'imagepath'=>$this->input->post('imageLink'));
		   $result = $this->category_model->createCategory($data);
            if ($result) {
                echo "200";
            } else {
                echo "400";
            }
        }
		
		 public function addsubCategory(){
		   $data=array('categoryname'=>$this->input->post('categoryname'),
		   'subcategoryname'=>$this->input->post('subcategoryname'),
		    'image'=>$this->input->post('imageLink'),
		    'active'=>1);
		   $result = $this->category_model->createsubCategory($data);
            if ($result) {
                echo "200";
            } else {
                echo "400";
            }
        }
		
		public function displaysubCategory()
         { 
		     // $catid = $this->input->post('category');
			$category = $this->input->post('category');
			if ($category != "") {
             
             }
		      $query  = $this->category_model->getsubCategory($category);
            $data['subCategory'] = null;
            if ($query) {
				
                $data['subCategory'] = $query;
            }
			$this->load->view('homejscss');
		    $this->load->view('sidebar');
            $this->load->view('subcategory');
      
         }
		 
		 
		 public function loadsubCategory()
         { 
		     // $catid = $this->input->post('category');
			$category = $this->input->post('category');
			if ($category != "") {
             
             }
		      $query  = $this->category_model->getsubCategory($category);
			  
            $data['subCategory'] = null;
            if ($query) {
				
                $data['subCategory'] = $query;
				$data['Category'] = $this->category_model->getCategory();
            }
			
			$this->load->view('subcategoryListing',$data);
      
         }
		
		

        //upload file
		function upload_file() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 MB

        if (isset($_FILES['qqfile']['name'])) {
            if (0 < $_FILES['qqfile']['error']) {
                echo 'Error during file upload' . $_FILES['qqfile']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['qqfile']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['qqfile']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('qqfile')) {
                        echo $this->upload->display_errors();
                    } else {
                       // echo 'uploads/' . $_FILES['qqfile']['name'];
						
						$data['imgepath']='uploads/' . $_FILES['qqfile']['name'];
						echo json_encode($data);
						
						
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }
		 
	}
 
?>

