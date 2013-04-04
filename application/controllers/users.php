<?php
class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->library('email');

		$this->load->helper('url');	

		$this->load->model('Login');
		$this->load->model('signupmodel');
		$this->load->library('javascript');

	}
	public function show_user_profile()
	{
		$data['user_info']=$this->user->get_user_info($this->input->session("username"));
		$this->load->view("template-top");
		$this->load->view("user_profile", $data);
		$this->load->view("template-buttom");
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


    public function reset_password($reset_code){
		
		if($this->input->post('newPassword')){
			
			$newPassword=$this->input->post('newPassword');
			$confimPassword=$this->input->post('confirmPassword');
			$username = $this->input->session('username');
			
		    if( $newPassword == $confimPassword ){	
					$this-user->change_new_password($newPassword,$username);
					$this->load->view('home');
			}
		
		}else{
				
		     $flag=$this->user->getReset_code($reset_code);
			
			 if($flag == 1){
				
					$this->load->view('change_password');
			 }else{
			 
					$this->load->view('valid_link');
			 }
		
		
		}
		
    }

 public function login()
	{
	$this->load->view('template-top');	
     $this->load->view('Signin');
     $this->load->view('template-bottom');
	}
 public function chklogin()
	{
$data = array('username' => $this->input->post('username'),'password'=>  hash('sha256',$this->input->post('password'))); 
$info['data'] = $this->Login->checkUser($data);	
//$this->load->view('welcome_message',$data);
foreach($info as $key){
    if(count($key)>0){
      session_start();
      $_SESSION['username']=$key['username'];
      redirect(base_url('/home/welcome'),'location');   //9elmafrod yt3ml redirect 3la el welcome page
     // $this->load->view('template-top',$_SESSION);
    }
    else{
        $err['errormsg']="<br>محاوله دخول خاطئه";        
        $this->load->view('template-top');	
     $this->load->view('Signin',$err);
     $this->load->view('template-bottom');
    }
}
	} 
public function go_edit() {

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

            $data['z'] = 1;
            $this->load->view('user_profile', $data);
        } else {
            $data['z'] = 0;

            $this->load->view('user_profile', $data);
        }
    }


}
?>
