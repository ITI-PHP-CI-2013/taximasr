<?php
class Reviews extends CI_Model{

		public function get_reviews($taxi_id){
		 $reviews = array();
			$query = $this->db->query("select sum(physical_status) as physical_status,sum(cleanliness) as cleanliness,sum(driver_behavior) as driver_behavior,sum(pricing) as pricing,sum(radio_volume) as radio_volume,sum(driving_style) as driving_style from reviews group by taxi_id having taxi_id=$taxi_id");
				foreach($query->result() as $row){
				$reviews['physical_status'] = $row->physical_status;
				$reviews['cleanliness'] = $row->cleanliness;
				$reviews['driver_behavior'] = $row->driver_behavior;
				$reviews['pricing'] = $row->pricing;
				$reviews['radio_volume'] = $row->radio_volume;
				$reviews['driving_style'] = $row->driving_style;


		}
		return $reviews;
		}
		
		public function get_count($taxi_id){
		$test2 = array();		  
		$query = $this->db->query("select count(id) as allrev from reviews group by taxi_id having taxi_id=$taxi_id");
				foreach($query->result() as $row){
				$test2['count'] = $row->allrev;	

		}
		return $test2['count'];
		
		}
	
		
}




?>
