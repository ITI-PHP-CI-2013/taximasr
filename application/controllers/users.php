<?php

//if (!defined('BASEPATH'))exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->helper('url');
    }

  

    public function go_edit() {
        echo '47645';
        $this->load->view('template-top');
        $this->load->view('edit_profile');
        $this->load->view('template-bottom');
    }

    public function edit_profile() {

        if (isset($this->input->post("save"))) {
           
            $name = $this->input->session("username");
            $email = $this->input->post("email");
            $notify = $this->input->post("notift");
            $birth = $this->input->post("birth");
            $mobile = $this->input->post("mobile");
            $gender = $this->input->post("gender");


            $this->user->update_info_profile($name, $email, $notify, $birth, $mobile, $gender);

           $z = 1;
            $this->load->view('user_profile',$z);
        } else {
          
            $this->load->view('user_profile',$z);
        }
    }

}

