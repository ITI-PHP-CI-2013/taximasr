<?php

class Sb extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function sbm($tno, $sb1, $sb2, $sb3, $sb4, $sb5, $sb6) {



        $statement = "SELECT `taxi_id` FROM `taxis` WHERE `taxi_number` = '$tno'";
        $tid = $this->db->query($statement);
         $row = $tid->row();
         $tid = $row->taxi_id;
        $data = array('taxi_id' => $tid,
            'physical_status' => $sb1,
            'cleanliness' => $sb2,
            'driver_behavior' => $sb3,
            'pricing' => $sb4,
            'radio_volume' => $sb5,
            'driving_style' => $sb6
        );

        $this->db->insert('reviews', $data);
    }

}

