<?php

require '../model/School.php';
require '../model/Database.php';

$data = School::pagination();

echo json_encode($data);


 
