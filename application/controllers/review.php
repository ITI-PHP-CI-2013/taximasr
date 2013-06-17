<?php

class Review extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('sb');
        $this->load->database();
    }

    public function rate() {
        $data['page'] = "rating";
        $data['taxinum']=$this->input->post("taxi_num");
        $this->load->view("template", $data);
    }

    public function sb() {
        $tno = $this->input->post("hideKey");
        $sb1 = $this->input->post("sb1");
        $sb2 = $this->input->post("sb2");
        $sb3 = $this->input->post("sb3");
        $sb4 = $this->input->post("sb4");
        $sb5 = $this->input->post("sb5");
        $sb6 = $this->input->post("sb6");

        $this->sb->sbm($tno, $sb1, $sb2, $sb3, $sb4, $sb5, $sb6);
        $data['page']="welcome";
        $this->load->view("template",$data);
    }

}

