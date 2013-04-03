<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('taxis'));
        $this->load->helper('url');
        $this->load->library('session');
        
        
    }

    public function rate_taxi($taxi_id) {

        $data['taxiscore'] = $this->taxis->get_score();  //MVC model
		$data['taxireview'] = $this->reviews->get_reviews(); //an associative array contains all 6 items
        $this->load->view('search_logged', $data); //associative array with two values ,first is assoc and the other is score 
    }

	
	public function taxi_exist() {
		$taxinum=$this->input->post('taxinum');
        $taxi_id = $this->taxis->found($taxinum); 

       return $taxi_id;
    }
	
	isset($_SESSION['username']){
	$taxi_id=taxi_exist();
	if($taxi_id){
	rate_taxi($taxi_id);
	
	}else{
		header("Location: /add_taxi/$taxinum");
	
	}
	
	}
   public function taxi($id=0)
   {
	
	if ($this->session->userdata('username')==null)
	 {
		
		if($id==0) {
			$data['taxis']=$this->taxis->search_taxi($this->input->post('taxinum')); 
	    } else {
		   $data['taxis']=$this->taxis->search_taxi_id($id);
       }
	   
	   
	    if(count($data['taxis'])==1)
	    { 
		  $taxi_id=$data['taxis']['id'];
		  $data['reviews']=$this->taxis->get_all_reviews($taxi_id);
		  $this->load->view("template-top");
		  $this->load->view("taxi",$data);
		  $this->load->view("template-bottom");
		  
		}
		else
		{
		  //not_found($data);
		}
	 }
	else //there is session
	{
     
     $this->rate_taxi($data);
     //redirect to logged search results 
	} 
   
 	
}
}
?>
