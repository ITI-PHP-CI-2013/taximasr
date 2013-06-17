<?php
class FormCommentModel extends CI_Model{

		public function get_comments(){
		 $test = array();
				  $i = 0;
			$query = $this->db->query("select * from comments");
				foreach($query->result() as $row){
				$test[$i]['id'] = $row->id;
				$test[$i]['comment'] = $row->comment;
				$test[$i]['articleID'] = $row->articleID;
				
				$i++;

		}
		return $test;
		}
		
		
		public function insert($name){
		   //$this->db->query("insert into test set name='$name'");
		   $this->db->insert('test', array('name' => $name));
		   
		   return $this->db->insert_id();
		
		}
		
}




?>