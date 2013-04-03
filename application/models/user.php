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
	}

?>