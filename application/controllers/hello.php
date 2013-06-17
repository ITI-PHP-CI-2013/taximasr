<?php
class Hello extends CI_Controller{
    function index(){
        // to make it MVC
       $this ->load ->view('hello1');
    }
    
    function test($username , $username2){
        $data = array('name1' => $username ,'name2' => $username2);
        $this ->load ->view('hello2' , $data); //view does not has access to the database or any other data
    }
    
    
    
}





?>