<?php

require '../model/School.php';
require '../model/Database.php';

$id= $_POST['id'];

$obj= new School;
$obj->delete($id);


