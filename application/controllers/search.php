<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('taxis', 'reviews'));
        $this->load->database();
    }

    public function index() {
        $user_id = $this->session->userdata('id');
        if ($user_id) {
            $taxinum = $this->input->get('taxinum');
            $taxinum = str_replace(' ', '', $taxinum);
            $taxi_id = $this->taxis->found($taxinum);
            //echo $taxi_id;
            if (isset($taxi_id)) {
                $this->rate_taxi($taxi_id);
            } else {
                $keyword['searchKey'] = $taxinum;
                $keyword['page'] = "noMatch";

                $this->load->view("template", $keyword);
            }
        } else {    // not logged
            $taxi = $this->input->get("search");
            $result = $this->taxis->searchtaxi($taxi);
            if ($result) {
                $data['results'] = $this->reviews->gettaxidetails($taxi);
                $data['page'] = "searchnonlogged";
                $data['taxi'] = $taxi;
                $this->load->view("template", $data);
            } else {
        
                $data['msg'] = 1;
                $data['page'] = "welcome_nonlogged";
                $this->load->view("template", $data);
            }
        }
    }

    public function taxi_exist() {
        $taxinum = $this->input->get('taxinum');
        $taxinum = str_replace(' ', '', $taxinum);
        $taxi_id = $this->taxis->found($taxinum);
        return $taxi_id;
    }

    public function add_taxi($key) {
        $taxinum = $this->input->post('hideKey');
        $taxinum = str_replace(' ', '', $taxinum);
        $this->taxis->addTaxi($taxinum);
        //then load view to rate this taxi
        $data['page'] = "rating";
        $data['taxinum'] = $taxinum;
        $this->load->view("template", $data);
    }

    public function rate_taxi($taxi_id) {
        $taxinum = $this->input->get('taxinum');
        $taxinum = str_replace(' ', '', $taxinum);
        $data['taxiscore'] = $this->taxis->get_score($taxi_id); //MVC model
        $data['taxireview'] = $this->reviews->get_reviews($taxi_id); //an associative array contains all 6 items
        $data['taxiname'] = $taxinum;
        $data['taxiID'] = $taxi_id;
        $data['count'] = $this->reviews->get_count($taxi_id);
        //$this->load->view('template-top');
        $data['page']='search_logged';
        $this->load->view('template', $data); //associative array with two values ,first is assoc and the other is score
        //$this->load->view('template-bottom');
    }

    public function not_found() {
        $data['page'] = "welcome";
        $this->load->view("template", $data);
    }

    public function signin() {
        $data['page'] = "signin";
        $this->load->view("template", $data);
    }

    public function signup() {
        $data['page'] = "signup";
        $this->load->view("template", $data);
    }

}
?>



