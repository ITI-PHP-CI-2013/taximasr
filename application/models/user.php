<?php
	class User extends CI_Model
	{
		public function get_user_info($arr)
		{
			$query=$this->db->query("select email, notify_email, mobile from users where username='{$arr["username"]}'");
			foreach($query->result as $row)
			{
				$user_info['username']=$arr['username'];
				$user_info['email']=$row->email;
				$user_info['notify_email']=$row->notify_email;
				$user_info['mobile']=$row->mobile;
			}
			return $user_info;
		}
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
		public function update_info_profile($name, $e, $n, $b, $m, $g) {

        $data = array(
            'email' => $e,
            'notify_email' => $n,
            'mobile' => $m,
            'birth_date' => $b,
        );

        $this->db->where('username', $name);
        $result = $this->db->update('users', $data);

        return $result;
    }

	}
?>
