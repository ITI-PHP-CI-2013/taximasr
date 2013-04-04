<?php



class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view('template-top',
							array ('username'=>'')
						  );
						  
		$this->load->view('home-page');
		
		$this->load->view('template-bottom');
	}
	
	public function help()
	{
		$this->load->view('template-top',
							array ('username'=>'')
						  );
						  
		$this->load->view('help-page');
		
		$this->load->view('template-bottom');
	}


	public function welcome()
	{
		$this->load->view('template-top',array('username' => $this->input->session('username')));
		$this->load->view('welcomepage');
		$this->load->view('template-bottom');
	}
}

?>

