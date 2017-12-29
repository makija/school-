

<?php

class BaseController{

	public function index(){
    require 'view/index.php';
        }
	 

	 public function getSchools($view){
     require "view/school/{$view}.php";
     }

    public function getTeachers($view){
    require "view/teachers/{$view}.php";


}



}