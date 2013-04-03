<?php 

    header("Content-Type: text/html; charset=utf-8");


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	
	
	public function __construct()
	{
			parent::__construct();
			$this->load->model('signupmodel');
			$this->load->library('javascript');
		}
	
	
	public function signup(){
                
                        $this->load->view('template-top');
			$this->load->view('signupform');
                        $this->load->view('template-bottom');
		}
                
       	public function check_user(){
                        $check= $this->signupmodel->get_usernames($_GET['username']);
                        if ($check==1)
                             echo "هذا الأسم مستخدم سابقا";
			//$_GET['username']
		}
                
        public function insert_user(){
            
                $pass=hash ('sha256',$_POST['password']);
                
                $this->signupmodel->insert_user($_POST['name'],$pass,$_POST['email'],time());
                echo "Username registered successfully";
   
        }

}
?>





