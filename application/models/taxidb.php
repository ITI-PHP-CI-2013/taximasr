<?php

class Taxidb extends CI_Model {

    public function notifyEmail($username) {
        $nEmail = "";
        $query = $this->db->query("select notify_email from users where username='$username'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $nEmail = $row->notify_email;
        }
        return $nEmail;
    }
    public function userEmail($username) {
        $useremail = "";
        $query = $this->db->query("select email from users where username='$username'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $useremail = $row->email;
        }
        return $useremail;
    }
}