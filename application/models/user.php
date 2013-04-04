 <?php

class user extends CI_Model {

    public function update_info_profile ($name,$e,$n,$b,$m,$g) {
        
        $data = array(
               'email' => $e,
               'notify_email' => $n,
               'mobile' => $m,
               'birth_date'=> $b,
               
            );

        $this->db->where('username', $name);
      $result= $this->db->update('users', $data); 
       
     return $result; 
        
    }

  

}
