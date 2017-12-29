<?php

require '../model/School.php';
require '../model/Database.php';


$db=Database::conn();

$p= $db->query('SELECT COUNT(sch_id) from schools.schools');
$p->setFetchMode(PDO::FETCH_NUM);
$p->execute();
$pages = $p->fetch();

$pagesNum= ceil($pages[0]/5);


$page = $_POST['page'];

$offset= $_POST['offset'];


$schools= School::getAll('order by sch_year desc limit 5 offset '. $offset);
 // 

$output='';
$i=0;

 foreach ($schools as $key=>$school )  
 {  
 	$i++;
      $output .= '  
           <tr>  
     
                <th scope="row">'. ($key + 1 + $offset).'</th>
                <td>'.$school->sch_name.'</td>  
               
                <td>'.$school->sch_city.'</td>  
                <td>'.$school->sch_year.'</td>  
           </tr>  
      ';  
 }  

$data=[];

 $data=['htmlTable'=>$output, 'pagesNum'=>$pagesNum];


echo json_encode($data);


 
