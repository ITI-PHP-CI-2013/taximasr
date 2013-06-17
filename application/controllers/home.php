<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('log'));
        $this->load->database();
    }

    public function index() {
        $user_id = $this->session->userdata('id');
        if ($user_id) {
            $data['page'] = "welcome";
            $this->load->view('template', $data);
        } else {
            $data['page'] = "welcome_nonlogged";
            $this->load->view('template', $data);
        }
    }

}
?>

