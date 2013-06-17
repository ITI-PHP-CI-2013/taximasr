<?php

class Taxis extends CI_Model {

    public function found($taxinum) {
        $query = $this->db->query("select taxi_id from taxis where taxi_number='$taxinum'");
        $row = $query->row();
        return $row->taxi_id;
    }

    public function addTaxi($taxinum) {
        $data = array(
            'taxi_number' => $taxinum
        );

        $this->db->insert('taxis', $data);
    }

    public function get_score($taxi_id) {

        $query = $this->db->query("select score from taxis where taxi_id=$taxi_id ");
        $test = array();
        $query = $this->db->query("select score from taxis where taxi_id=$taxi_id ");
        foreach ($query->result() as $row) {
            $test['score'] = $row->score;
        }
        return $test['score'];
    }

    public function searchtaxi($taxiNo) {
        $sql = "SELECT * FROM `taxis` WHERE `taxi_number` = '$taxiNo' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

   

}

?>