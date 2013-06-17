<?php

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $id = 2;
        $newdata = array('id' => $id);
        $this->session->set_userdata($newdata);
        
        
        $data['session'] = $this->session->userdata('id');
        $this->load->view("hello1", $data);
    }

}
?>

