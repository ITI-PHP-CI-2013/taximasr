<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('taxis','reviews'));

    }
	public function index(){
	$taxinum=$this->input->post('taxinum');
		//$_SESSION['username']="test";

	$taxinum=str_replace(' ','',$taxinum);
	
		$_SESSION['username']="test";
        if(isset($_SESSION['username']))
        {
			 $username = $_SESSION['username'];
            $taxi_id=$this->taxi_exist();
		//	echo $taxi_id;
            if($taxi_id){
            $this->rate_taxi($taxi_id);
            }else{
            $this->add_taxi($taxinum);
            }
		}
	}

    public function rate_taxi($taxi_id) {
	$taxinum=$this->input->post('taxinum');
	$taxinum=str_replace(' ','',$taxinum);
        $data['taxiscore'] = $this->taxis->get_score($taxi_id); //MVC model
        $data['taxireview'] = $this->reviews->get_reviews($taxi_id); //an associative array contains all 6 items
	$data['taxiname']=$taxinum;
	$data['taxiID']=$taxi_id;
	$data['count']=$this->reviews->get_count($taxi_id);
	$this->load->view('template-top');
        $this->load->view('search_logged', $data); //associative array with two values ,first is assoc and the other is score
		$this->load->view('template-bottom');
    }

    public function add_taxi($key){
            $keyword['searchKey'] = $key;
            $this->load->view("noMatch",$keyword);
    }

       
	     
    public function taxi_exist() {
        $taxinum=$this->input->post('taxinum');
		$taxinum=str_replace(' ','',$taxinum);
        $taxi_id = $this->taxis->found($taxinum);
       return $taxi_id;
    }

	
	
	public function not_found() {
        $this->load->view("template-top");
        $this->load->view("not_found");
        $this->load->view("template-bottom");
    }
   public function taxi($id=0)
   {
	
	if ($this->session->userdata('username')==null)
	 {
		
		if($id==0) {
			$data['taxis']=$this->taxis->search_taxi(str_replace(' ','',$this->input->post('taxinum'))); 
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
		      $_SESSION['taxi_id'] = $taxi_id;
     $_SESSION['username'] = $username;
		}
	 }
	else //there is session
	{
		
     $_SESSION['taxi_id'] = $taxi_id;
     $_SESSION['username'] = $username;
     $this->rate_taxi($data);
     //redirect to logged search results 
	} 
   
 	
   }
}
?>



