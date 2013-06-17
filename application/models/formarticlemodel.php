<?php
class FormArticleModel extends CI_Model{

		public function get_first_five(){
		 $test = array();
				  $i = 0;
			$query = $this->db->query("select * from articles limit 5");
				foreach($query->result() as $row){
				$test[$i]['id'] = $row->id;
				$test[$i]['title'] = $row->title;
				$test[$i]['content'] = $row->content;
				$i++;

		}
		return $test;
		}
		
		public function get_comments(){
		 $test2 = array();
				  $j = 0;
			$query = $this->db->query("select * from comments");
				foreach($query->result() as $row){
				$test2[$j]['id'] = $row->id;
				$test2[$j]['comment'] = $row->comment;
				$test2[$j]['articleID'] = $row->articleID;
				
				$j++;

		}
		return $test2;
		}
		
		
}




?>