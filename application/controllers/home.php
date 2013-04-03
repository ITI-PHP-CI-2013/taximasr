<?php
class Home extends CI_Controller
{
	public function index()
	{
		/*$this->load->view('template-top',
							array ('username'=>'')
						  );*/
						  
		$this->load->view('home-page');
		
		//$this->load->view('template-bottom');
	}
}
?>