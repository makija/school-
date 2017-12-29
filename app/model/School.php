<?php 
 
require_once "Records.php";
 class School extends Records{
   
  public $sch_id;
  public $sch_name;
  public $sch_year;
  public $sch_city;
  

public static $key= 'sch_id';
public static $table= ' schools';





public function createSchool(){

  if(isset($_POST['newSch'])){

  	$this->sch_name = $_POST['schName'];
  	$this->sch_year = $_POST['schYear'];
  	$this->sch_city = isset($_POST['schCity'])?$_POST['schCity'] : '';


  	$this->save();
  }


}


public function deleteSch($id){

	if(isset($_POST['delSch'])){

		$this->delete($id);
	}
     
}



 }



 