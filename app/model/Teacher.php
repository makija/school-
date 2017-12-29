<?php


class Teacher extends Records{
  
  public $tch_id;
  public $tch_name;
  public $tch_lastname;
  public $tch_birthday;
  public $sch_id;



  public static $table = 'teachers';
  public static $key = 'tch_id';

  public function createTeacher(){

  	if (isset($_POST['newTch'])){

  		$this->tch_name = $_POST['tchName'];
  		$this->tch_lastname = $_POST['tchLastname'];
  		$this->tch_birthday = $_POST['tchBirthday'];
  		$this->sch_id = $_POST['schId'];

  		$this->save();
  	}
  }




}