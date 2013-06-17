<?php

class Log extends CI_Model {

    //put your code here
    public function checkUser($data) {

        $username = $data['username'];
        $hashpass = $data['password'];

        $query = $this->db->query("select user_id from users where username='$username' and password_sha2='$hashpass'");
        $row = $query->row();
        return $row->user_id;
    }

    function get_friends($id) {

        $sql = "select u.username from users u join friends f where u.user_id=f.user_id and f.friend_id=$id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_channel($id,$name) {
       $query = $this->db->query("select user_id from users where username='$name'");
        $row = $query->row();
        $user1_id= $row->user_id; 
        $query2 = $this->db->query("select channel from friends where user_id='$id' and friend_id='$user1_id'");
        $row2 = $query2->row();
        return $row2->channel; 
        
    }
    

}

?>
