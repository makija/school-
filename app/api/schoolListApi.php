<?php

require '../model/School.php';
require '../model/Database.php';


$db=Database::conn();

$p= $db->query('SELECT COUNT(sch_id) from schools.schools');
$p->setFetchMode(PDO::FETCH_NUM);
$p->execute();
$pages = $p->fetch();

$pagesNum= ceil($pages[0]/5);


$offset= $_POST['offset'];
$page= $_POST['page'];


$prev="'prev'";
$next="'next'";


$schools= School::getAll('order by sch_year desc limit 5 offset '.$offset  );
 

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

 $pagesLinks=''; 

 $pagesLinks.=' <li  onclick="requestPage('.$prev.')" class="page-item"  ><a  class="page-link" href="#">Previous</a></li>';

 for( $i= 1; $i<=$pagesNum; $i++){

 	$pagesLinks.='<li  onclick="requestPage('.$i.')" class="page-item" > <a  class="page-link" href="#">'.$i.'</a></li>';
 }
    
    $pagesLinks.='<li onclick="requestPage( '.$next.' )" class="page-item"><a class="page-link" href="#">Next</a></li>';

$data=[];



 $data=['htmlTable'=>$output, 'pagesLinks'=>$pagesLinks];


echo json_encode($data);


 
