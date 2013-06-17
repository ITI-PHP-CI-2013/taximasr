<?php 
class Formdb extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('formarticlemodel');
$this->load->helper('url');
	}

public function show_articles(){
                 
				$data['test'] = $this->formarticlemodel->get_first_five() ;  //MVC model
				$this->load->view('formhome',$data);

		}
		
		
		
		public function add(){
			$data['testID'] = $this->test->insert($this->input->post('name'));  //not recommended to use post here it might be an attack
		
			$this->load->view("show-test", $data);
		}



}



?>