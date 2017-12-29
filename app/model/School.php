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


public function pagination(){

  $pagesNum = self::pageNum(); 


    $offset= $_POST['offset'];
    $page= $_POST['page'];
    $output='';
    $pagesLinks='';

    $prev="'prev'";
    $next="'next'";

    $data=[];


$schools= self::getAll('order by sch_year desc limit 5 offset ' .$offset );
 

 foreach ($schools as $key=>$school )  
 {  
  $i++;
      $output .= '  
           <tr>  
     
                <th scope="row">'. ($key + 1 + $offset).'</th>
                <td>'.$school->sch_name.'</td>  
               
                <td>'.$school->sch_city.'</td>  
                <td>'.$school->sch_year.'</td>  
                <td><button class="btn btn-primary btnDelete" onclick = remove('.$school->sch_id.') ><i class="fa fa-times-circle" aria-hidden="true"></i></button></td>  
           </tr>  
      ';  
 } 

 

      $pagesLinks.=' <li  onclick="requestPage('.$prev.')" class="page-item"  ><a  class="page-link" href="#">Previous</a></li>';

        for( $i= 1; $i<=$pagesNum; $i++){

             $pagesLinks.='<li  onclick="requestPage('.$i.')" class="page-item" > <a  class="page-link" href="#">'.$i.'</a></li>';
          }
    
          $pagesLinks.='<li onclick="requestPage( '.$next.' )" class="page-item"><a class="page-link" href="#">Next</a></li>';





            $data=['htmlTable'=>$output, 'pagesLinks'=>$pagesLinks, 'pagesNum'=> $pagesNum];

            return $data;

}



 }



 