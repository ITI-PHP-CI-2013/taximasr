<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('taxis','reviews');
        $this->load->helper('url');
    }

    public function rate_taxi($taxi_id) {

        $data['taxiscore'] = $this->taxis->get_score();  //MVC model
		$data['taxireview'] = $this->reviews->get_reviews(); //an associative array contains all 6 items
        $this->load->view('search_logged', $data); //associative array with two values ,first is assoc and the other is score 
    }

	 public function not_found() {
        $this->load->view("template-top");
        $this->load->view("not_found");
        $this->load->view("template-bottom");
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
	
	
}

?>