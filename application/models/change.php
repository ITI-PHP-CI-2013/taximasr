<?php
	class Change extends CI_Model{
	
	
		public function old_pass($oldPass,$username){
			
			$flag=0;
			$query = $this->db->query("select * from users where username='{$username}' and password_sha2='{$oldPass}'");
			if($query->result()){
			$flag=1 ;
			}
			
			return $flag;
		}

				public function new_pass($newPass,$username){
				$insert = 1;
				$query = $this->db->query("UPDATE users SET password_sha2={$newPass} WHERE  username={$username} ");
				if($query->result()){
				
						return $insert;
				
				}
			
	
				
				}

	
		
	}