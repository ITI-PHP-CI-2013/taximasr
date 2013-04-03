<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('taxis','reviews');
        $this->load->helper('url');
    }

    public function rate_taxi($taxi_id) {
	$taxinum=$this->input->post('taxinum');
        $data['taxiscore'] = $this->taxis->get_score(); //MVC model
        $data['taxireview'] = $this->reviews->get_reviews(); //an associative array contains all 6 items
		$data['taxiname']=$taxinum;
        $this->load->view('search_logged', $data); //associative array with two values ,first is assoc and the other is score
    }

    public function add_taxi($key){
            $keyword['searchKey'] = $key;
            $this->load->view("noMatch",$keyword);
        }

    public function toRate(){
            $keyword = $this->input->post("hideKey");
            header("Location: http://localhost/taximasr/index.php/review/rate/$keyword");
        }

    public function taxi_exist() {
        $taxinum=$this->input->post('taxinum');
        $taxi_id = $this->taxis->found($taxinum);

       return $taxi_id;
    }
	}
	$taxi = new Search();
        if(isset($_SESSION['username']))
        {
            $taxi_id=$taxi->taxi_exist();
            if($taxi_id){
            $taxi->rate_taxi($taxi_id);
            }else{
            $taxi->add_taxi($taxinum);
            }
    }


?>