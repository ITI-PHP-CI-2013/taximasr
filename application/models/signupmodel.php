<?php
	class Signupmodel extends CI_Model{
		public function get_usernames($name){
			$flag = 0;
			
			
			$query = $this->db->query("select username from users where username='{$name}'");
			foreach ($query->result() as $row){
                                
                            $flag=1;
			}
			
			return $flag;
		}
                
                
		
		public function insert_user($username,$password,$email,$time){
			//$this->db->query("insert into test set name='$name'");
			$this->db->insert('users', array('username' => $username,'password_sha2' => $password,'email' => $email,'signup_ts'=>$time));
			
			
		}
	}
