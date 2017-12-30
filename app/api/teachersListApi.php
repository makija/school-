<?php

require '../model/Teacher.php';
require '../model/Database.php';


$data= Teacher::pagination();


echo json_encode($data);


 
