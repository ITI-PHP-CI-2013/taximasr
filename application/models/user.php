<?php
	class User extends CI_Model
	{
		public function forget_password_get_email($username)
		{
			$query=$this->db->query("SELECT email from users where username=\"$username\"");
			$row=$query->row_array();
			if(isset($row['email']))
				return $row['email'];
			else
				return 0;
		}

		public function forget_password_check_email($email)
		{
			$query=$this->db->query("SELECT * from users where email=\"$email\"");
			$row=$query->row_array();
			if(isset($row['email']))
				return 1;
			else
				return 0;
		}

		public function forget_password_set_reset_code($email,$reset_code)
		{
			$query=$this->db->query("UPDATE `users` set `reset_code`=\"$reset_code\" where `email`=\"$email\"  ");
		}

                public function getReset_code($reset_code){
		
		      $query = $this->db->query('select * from users where reset_code=$reset_code');
   
		      if($query->result()){
		
				$reset_code=$row->reset_code;
				$reset_code_timeStamp = substr($reset_code,15);
				$timeStamp = time();
				
				$check = $timeStamp - $reset_code_timeStamp;

                                if($check < 60*60*24){
				
					$flag=1;
				
				}else{
				
					$flag=0;
				
				}		
				
		
		
		      }else{
				$flag=0;	
		      }
		
		
		         return $flag;
   
                 }
	
	         public function change_new_password($password,$username){
	
		    $this->db->query("update users set password_sha2='$password',reset_code='' where username='$username'");		
	         }


	}

?>
