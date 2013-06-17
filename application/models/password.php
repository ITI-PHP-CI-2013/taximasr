<?php

class Password extends CI_Model {

   
    public function getpass($id) {
        $query = $this->db->query("select password_sha2 from users where user_id='$id'");
        $row = $query->row();
        return $row->password_sha2;
    }
    
    public function change($id,$new){
        $this->db->query("UPDATE users SET password_sha2='$new' WHERE user_id='$id'");
    }

}

?>
