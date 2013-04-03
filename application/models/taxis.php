<?php
class Taxis extends CI_Model{

		public function get_score($taxi_id){
		 
			$score = $this->db->query("select score from taxis where taxi_id=$taxi_id ");
		return $score;
		}
		
		public function found($taxinum){
		$query = $this->db->query("select id from taxis where taxi_number=$taxinum ");
	
		}
}




?>