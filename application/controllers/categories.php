<?php
class Categories extends CI_Controller{

public function __construct(){
parent::__construct();
$this->load->helper('url');

}

function index(){
$data['products'] = array(
		12=> 'Apples',
		15=> 'oranges',
		10=> 'grapes'

);
$this -> load -> view('products' , $data);


}

public function products($id){
$this -> load -> view('products-details');



}


}



?>

