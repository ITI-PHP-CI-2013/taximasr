<?php
class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->library('email');
	}
	function forget_password()
	{
		if(isset($_POST['username'])||isset($_POST['email']))
		{
			$exist;
			$email;
			if(isset($_POST['username'])&&$_POST['username']!="")
			{
				$username=$_POST['username'];
				$email=$this->user->forget_password_get_email($username);
			}
			else
			{
				$email=$_POST['email'];
			}

			$exist=$this->user->forget_password_check_email($email);
			if($exist==0)
			{
				$this->load->view('email_not_exist');
			}
			else
			{
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    			$randomString = '';
    			for ($i = 0; $i < 16; $i++) 
    			{
        			$randomString .= $characters[rand(0, strlen($characters) - 1)];
    			}
    			$randomString .= time();
    			$exist=$this->user->forget_password_set_reset_code($email,$randomString);
				$this->email->from('info@taxiMasr.com', 'Your Name');
				$this->email->to($email);
				$this->email->subject('reset your password');
				$emailBody="لتعديل كلمة السر الخاصة بك فى موقع تاكسي مصر اضغط على هذا الرابط ... اذا كنت لا تريد تغيير كلمة السر يمكنك تجاهل هذه الرسالة";
				$emailBody = $emailBody . "taximasr/user/reset_password/" . $randomString;
				$this->email->message($emailBody);	
				$this->email->send();
				$this->load->view('template-top');
				$this->load->view('reset_code_sent');
				$this->load->view('template-bottom');

			}
		}
		
		else
		{
			$this->load->view('template-top');
			$this->load->view('forget_password');
			$this->load->view('template-bottom');
		}

	}
}
?>