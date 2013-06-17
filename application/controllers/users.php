<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->model(array('taxis', 'reviews', 'log', 'password'));
        $this->load->database();
    }

    public function validate() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('home');
//$this->load->view("login");
        } else {
            //  $data = array('username' => $this->input->post('username'), 'password' => hash('sha256', $this->input->post('password')));
            $data = array('username' => $this->input->post('username'), 'password' => $this->input->post('password'));
            $data['password'] = sha1($data['password']);
            $user_id = $this->log->checkUser($data);
//$this->load->view('welcome_message',$data);
//$id = $this->log->checkUser($data);
            //$newdata = array('id' => $id);
            //$this->session->set_userdata($newdata);
            if ($user_id) {
                $newdata = array('id' => $user_id, 'name' => $data['username']);
                $this->session->set_userdata($newdata);
                $data['page'] = "welcome";
                $this->load->view('template', $data);
            } else {
                $err['errormsg'] = "<br>محاوله دخول خاطئه";
                $this->load->view('login1', $err);
            }
        }
        /*   $name = $this->input->post("Name");
          // $email = $this->input->post("email");
          $passwd = $this->input->post("passwd");
          //  $city = $this->input->post("city");
          $this->form_validation->set_rules('Name', 'Username', 'required');
          $this->form_validation->set_rules('passwd', 'Password', 'required');
          //   $this->form_validation->set_rules('confpasswd', 'Password Confirmation', 'required');
          //   $this->form_validation->set_rules('email', 'Email', 'required');
          if ($this->form_validation->run() == FALSE) {
          //$data['page'] = "signup";
          //$this->load->view("template", $data);
          $this->load->view('hello1');
          } else {
          /* $this->reviews->insertuser($name, $email, $passwd, $city);
          $data['page'] = "signin";
          $data['name'] = $name;
          $data['passwd'] = $passwd;
          $this->load->view("template", $data);
          $this->load->view('hello2'); */
    }

    public function change_pass_form() {
        $data['page'] = "change_password";
        $this->load->view("template", $data);
    }

    public function change_password() {

        $id = $this->session->userdata('id');
        $old = $this->input->post('oldpass');
        $new = $this->input->post('newpass');
        $new2 = $this->input->post('newpass2');

        $old_password = $this->password->getpass($id);
        if ((sha1($old) == $old_password) && ($new == $new2)) {
            $this->password->change($id, sha1($new));

            //  $data['page'] = "welcome";
            //$this->load->view("template", $data);
            redirect('home');
        } else {
            $data['page'] = "change_password";
            $this->load->view("template", $data);
        }
    }

    public function signin() {
        $this->load->view("login1");
    }

    public function sign_out() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('taxi_num');
        $this->session->unset_userdata('taxi_id');

        redirect('home');
    }

    public function signup() {
        $this->load->view("signup");
    }

    public function adduser() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Name', 'Username', 'required');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('email_u', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('users/signup');
//$this->load->view("login");
        } else {
            $name = $this->input->post("Name");
            $email = $this->input->post("email");
            $passwd = sha1($this->input->post("passwd"));
            $email_u = $this->input->post("email_u");
            $this->reviews->insertuser($name, $email, $passwd, $email_u);

            redirect('users/signin');
        }
    }

    public function notify() {
        $tno = $this->input->post("tno");
        $id = $this->session->userdata('id');
        $newdata = array('taxi_num' => $tno);
        $this->session->set_userdata($newdata);
//$this->reviews->ride($tno,&id);
        $taxi_id = $this->reviews->ride($tno, $id);
        $newdata = array('taxi_id' => $taxi_id);
        $this->session->set_userdata($newdata);
        $this->reviews->msgd($tno, $id);
    }

    public function email_page() {
        $data['page'] = "email_page";
        $this->load->view("template", $data);
    }

    public function sent() {
        $data['page'] = "sent";
        $this->load->view("template", $data);
    }

    public function view_profile() {
        $id = $this->session->userdata('id');

        //$this->reviews->vpm($id);


        $received_data = $this->reviews->vpm($id);

        $data['name'] = $received_data->username;
        $data['email'] = $received_data->email;
        $data['nemail'] = $received_data->notify_email;
        $data['tel'] = $received_data->mobile;
        $data['bd'] = $received_data->birth_date;
        $data['page'] = "view_profile";
        $this->load->view("template", $data);
    }

    public function edit_profile() {
//echo "ahmed" ;
//$this->load->view('hello1');
        //isset($this->input->post)
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('e_mail', 'Email', 'required');
        $this->form_validation->set_rules('n_mail', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('users/edit_profile_v');
//$this->load->view("login");
        } else {
            $check = $this->input->post("hideKey");
            if ($check) {
                $data['uname'] = $this->input->post("uname");
                $data['e_mail'] = $this->input->post("e_mail");
                $data['n_mail'] = $this->input->post("n_mail");

                $id = $this->session->userdata('id');
                $data['user_id'] = $this->session->userdata('id');
//echo $newname ;
//$newname="hi";
                $this->reviews->edit($data);
            }
            $received_data = $this->reviews->vpm($id);
            $data['name'] = $received_data->username;
            $data['email'] = $received_data->email;
            $data['nemail'] = $received_data->notify_email;
            $data['page'] = "view_profile";
            $this->load->view("template", $data);
//$this->taxis->edit(array($newname));
        }
    }

    public function edit_profile_v() {
        $this->load->view("edit_profile");
    }

    public function addfriend_v() {
        $data['page'] = "add_friend";
        $this->load->view("template", $data);
    }

    public function add_friend() {

        $uid = $this->session->userdata('id');
        //  $uid = 1;
        $femail = $this->input->post("femail");
        $this->reviews->addfm($femail, $uid);
    }

    public function addfriend() {

        $uid = $this->input->get('id');
        $femail = $this->input->get('mail');
        $this->reviews->insertfm($uid, $femail);
        $data['page'] = 'done';
        $this->load->view("template", $data);
    }

    public function forgot_password() {
        $data['page'] = "forgot_password";
        $this->load->view("template", $data);
    }

    public function forgot_password_m() {
        $email = $this->input->post("email");
        $pass_sent = rand();
        $p = md5($pass_sent);
        $this->reviews->reset_pass($email, $p, $pass_sent);
    }

    public function failed() {
        $data['page'] = "reset_failed";
        $this->load->view("template", $data);
    }

    public function chat_v() {
        $id = $this->session->userdata('id');
        $data['friends'] = $this->log->get_friends($id);
        $this->load->view("chat", $data);
    }

    public function chat_v2() {
        $data['name'] = $this->input->post("username");
        $name = $data['name'];
        $id = $this->session->userdata('id');
        $data['channel'] = $this->log->get_channel($id, $name);
        $this->load->view("chat2", $data);
    }

    public function start_track() {
        $user_id = $this->session->userdata('id');
        $taxi_id = $this->session->userdata('taxi_id');
        $this->reviews->start($user_id, $taxi_id);
        $data['page'] = 'tracking';
        $this->load->view("template", $data);
    }

    public function test_track3() {
//8$uid = $this->input->get('id');
        $x = $this->input->post("x");
        $y = $this->input->post("y");
        $id = $this->session->userdata('id');
        $this->reviews->insertloc($id, $x, $y);
    }

    public function stop_track() {
        $user_id = $this->session->userdata('id');
        $taxi_id = $this->session->userdata('taxi_id');
        $this->reviews->stop($user_id, $taxi_id);
        redirect(home);
//$data['page']='welcome';
//$this->load->view("template", $data);
    }

    public function track_fr() {
        $user_id = $this->session->userdata('id');
        $data['friend_list'] = $this->reviews->find_friends($user_id);
        $data['page'] = 'friend_list';
        $this->load->view("template", $data);
    }

    public function track_friend() {
        $user_id = $this->session->userdata('id');
        $data['friend_list'] = $this->reviews->find_friends($user_id);
        $friend = $this->input->post("friend");
        $friend = $data['friend_list'][$friend - 1];
        $data['friend_name'] = $friend;
//$data['track_route']=$this->reviews->get_track($friend);

        $friend = $this->reviews->get_track($friend);
        $data['test'] = $friend;

        $data['page'] = 'tracking_friend';
        /* $user_id=$this->session->userdata('id');
          $data['friend_list']=$this->reviews->find_friends($user_id);
          $data['page']='friend_list'; */
        $this->load->view("template", $data);
    }

}
?>

