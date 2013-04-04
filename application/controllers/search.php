<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
<<<<<<< HEAD

        $this->load->model(array('taxis'));
        $this->load->helper('url');
        $this->load->library('session');
        
        
=======
        $this->load->helper('url');
        $this->load->library('session');
>>>>>>> 3dd46d416acc8902f743e8e89f445eb690f033c7
        $this->load->model(array('taxis','reviews'));

    }
	public function index(){
	$taxinum=$this->input->post('taxinum');
		//$_SESSION['username']="test";
        if(isset($_SESSION['username']))
        {
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
<<<<<<< HEAD

$taxinum=$this->input->post('taxinum');
=======
	$taxinum=$this->input->post('taxinum');
>>>>>>> 3dd46d416acc8902f743e8e89f445eb690f033c7
        $data['taxiscore'] = $this->taxis->get_score($taxi_id); //MVC model
        $data['taxireview'] = $this->reviews->get_reviews($taxi_id); //an associative array contains all 6 items
	$data['taxiname']=$taxinum;
	$data['taxiID']=$taxi_id;
	$data['count']=$this->reviews->get_count($taxi_id);;
        $this->load->view('search_logged', $data); //associative array with two values ,first is assoc and the other is score
    }

    public function add_taxi($key){
            $keyword['searchKey'] = $key;
            $this->load->view("noMatch",$keyword);
<<<<<<< HEAD
        }


        $data['taxiscore'] = $this->taxis->get_score();  //MVC model
		$data['taxireview'] = $this->reviews->get_reviews(); //an associative array contains all 6 items
        $this->load->view('search_logged', $data); //associative array with two values ,first is assoc and the other is score 
    }


	
	public function taxi_exist() {
		$taxinum=$this->input->post('taxinum');
        $taxi_id = $this->taxis->found($taxinum); 


=======
    }

       
	     
>>>>>>> 3dd46d416acc8902f743e8e89f445eb690f033c7
    public function taxi_exist() {
        $taxinum=$this->input->post('taxinum');
        $taxi_id = $this->taxis->found($taxinum);
		//echo $taxi_id; 
<<<<<<< HEAD

=======
>>>>>>> 3dd46d416acc8902f743e8e89f445eb690f033c7
       return $taxi_id;
    }

<<<<<<< HEAD
	
	isset($_SESSION['username']){
	$taxi_id=taxi_exist();
	if($taxi_id){
	rate_taxi($taxi_id);
	
	}else{
		header("Location: /add_taxi/$taxinum");
=======
>>>>>>> 3dd46d416acc8902f743e8e89f445eb690f033c7
	
	
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
   
<<<<<<< HEAD
}








public function index(){
        if(isset($_SESSION['username']))
        {
            $taxi_id=$taxi->taxi_exist();
            if($taxi_id){
            $taxi->rate_taxi($taxi_id);
            }else{
            $taxi->add_taxi($taxinum);
            }
    }
}
}

	
	

?>
=======
 	
   }
}
?>



>>>>>>> 3dd46d416acc8902f743e8e89f445eb690f033c7
