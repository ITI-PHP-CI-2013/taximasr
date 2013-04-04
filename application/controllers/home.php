<?php

class Home extends CI_Controller {

public function welcome()
	{
		$this->load->view('template-top',array('username' => $this->input->session('username')));
		$this->load->view('welcomepage');
		$this->load->view('template-bottom');
	}
	
	

}
?>