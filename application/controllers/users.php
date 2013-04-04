<?php
	class Users extends CI_Controller{
	
		public function __construct(){
			parent::__construct();
			$this->load->model('change');
			$this->load->helper('url');
		}
		
		
		public function change_password(){
		$oldPass=$this->input->post('oldpass');
		$newpass=$this->input->post('newpass');
		$connewpass=$this->input->post('connewpass');
		$username=$this->input->post('username');
		$oldpass=hash ('sha256',$oldPass);
			$flag= $this->change->old_pass($oldpass,$username);
			
			if($flag==0)
			{
			$this->load->view('change_password');
			}
			else 
			{
				if($newpass==$connewpass)
				{
					$newPass=hash ('sha256',$oldPass);

					$insert= $this->change->new_pass($newPass,$username);
					if ($insert=1)
					{
						$this->load->view('user_profile');
					}
				}
			
			}
		}
	}
		?>
		
	