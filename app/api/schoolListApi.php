<?php

require '../model/School.php';
require '../model/Database.php';


$obj= new School;
$data = $obj->pagination();

echo json_encode($data);


 
