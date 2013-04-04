<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Eng-Heba
 */
class Login extends CI_Model{
    //put your code here
    public function checkUser($data){
        
        $i=0;
        $username=$data['username'];
        $hashpass=$data['password'];
			$user = array();
			
			$query = $this->db->query("select * from users where username='$username' and `password_sha2`='$hashpass'");
			foreach ($query->result() as $row){
				$user['username'] = $row->username;
				                            
			}
                     
			
			return $user;
    }
    
}

?>
