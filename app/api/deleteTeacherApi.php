<?php


require '../model/Teacher.php';
require '../model/Database.php';

$id= $_POST['id'];

$obj= new Teacher;
$obj->delete($id);


