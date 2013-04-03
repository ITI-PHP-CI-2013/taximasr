<?php
class Reviews extends CI_Model{

		public function get_reviews($taxi_id){
		 $reviews = array();
			$query = $this->taximasr->query("select * from reviews where taxi_id=$taxi_id ");
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
	
		
}




?>