<?php
<<<<<<< HEAD

class taxis extends CI_Model{
  public function search_taxi($taxinum)
  {
	$i = 0;
			$taxis = array();
			
			$query = $this->db->query('select * from taxis where `taxi_number` =$taxinum');
			
			foreach ($query->result() as $row){
				$taxis[$i]['id'] = $row->id;
				$taxis[$i]['taxi_number'] = $row->taxi_number;
				$taxis[$i]['make_id']=$row->make_id;
				$taxis[$i]['score']=$row->score;
				
				$i++;
			}
			
			return $taxis;  
  }
  public function search_taxi_id($id)
  {
	$i = 0;
			$taxis = array();
			
			$query = $this->db->query("select * from taxis where id=".$id);
			
			foreach ($query->result() as $row){
				$taxis[$i]['id'] = 1;$row->id;
				$taxis[$i]['taxi_number'] =$row->taxi_number;
				$taxis[$i]['make_id']=$row->make_id;
				$taxis[$i]['score']=$row->score;
				
				$i++;
			}
			
			return $taxis;  
 
}
public function get_reviews($field_name,$taxi_id)
  {
	$i = 0;
	$percent=0;
			$test = array();
			
			$query = $this->db->query("select sum($field_name) as `sum`,count($field_name) as `count` from reviews where id= $taxi_id ");
			
				foreach ($query->result() as $row){
					$test[$i]['sum']=$row->sum;
					$test[$i]['count']=$row->count;
					if($test[$i]['count']!=0){
 	                $percent=$test[$i]['sum']/$test[$i]['count'];			
				    }
				$i++;
			}
		
			return $percent;  
 
}

public function get_all_reviews($taxi_id)
  {
	$fields = array('physical_status','cleanliness','driver_behavior','pricing','radio_volume','driving_style');
	
	$reviews = array();
	foreach($fields as $field){
	// for($i=0;$i<6;$i++){
		$reviews[$field]=$this->get_reviews($field, $taxi_id);
	} 
	return $reviews; 
  }




}


?>
=======
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
>>>>>>> 661a7681025985e18d872e26d9a00615efba894f
