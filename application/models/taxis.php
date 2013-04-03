<?php
class Taxis extends CI_Model{

		public function get_score($taxi_id){
		 
			$query = $this->db->query("select score from taxis where id=$taxi_id ");
		$test = array();
				  $query = $this->db->query("select score from taxis where id=$taxi_id ");
				foreach($query->result() as $row){
				$test['score'] = $row->score;	

		}
		return $test['score'];
		}
		
		public function found($taxinum){
		
	$test2 = array();
				  
			$query = $this->db->query("select id from taxis where taxi_number=$taxinum");
				foreach($query->result() as $row){
				$test2['id'] = $row->id;	

		}
		return $test2['id'];
		}
}




?>