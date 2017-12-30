<?php

require_once "Records.php";
class Teacher extends Records{
  
  public $tch_id;
  public $tch_name;
  public $tch_lastname;
  public $tch_birthday;
  public $sch_id;



  public static $table = 'teachers';
  public static $key = 'tch_id';



  public function createTeacher(){

    $pattern='^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))$^';


  	if (isset($_POST['newTch'])){

      if(!empty($_POST['tchName']) && !empty($_POST['tchLastname']) && !empty($_POST['tchBirthday'])  && !empty($_POST['schId'])){

        if(is_string($_POST['tchName']) && is_string($_POST['tchLastname']) && is_numeric($_POST['schId']) && preg_match($pattern, $_POST['tchBirthday'] )){

          $chTagsN = strip_tags($_POST['tchName']);
          $name = trim($chTagsN);
          $this->tch_name = $name;

          $chTagsL = strip_tags($_POST['tchLastname']);
          $lastname = trim($chTagsL);
          $this->tch_lastname = $lastname;

          $date= strip_tags($_POST['tchBirthday']);
          $this->tch_birthday = $date;

          $schId= strip_tags($_POST['schId']);
          $this->sch_id = $schId;

         $this->save();



          }
  
    }

    else {
      echo "Invalid data";
    }

  	
  	}
  }


   public function editTeacher(){

    $pattern='^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))$^';


    if (isset($_POST['editTch'])){

      if(!empty($_POST['tchName']) && !empty($_POST['tchLastname']) && !empty($_POST['tchBirthday'])  && !empty($_POST['schId'])){

        if(is_string($_POST['tchName']) && is_string($_POST['tchLastname']) && is_numeric($_POST['schId']) && preg_match($pattern, $_POST['tchBirthday'] )){

          $chTagsN = strip_tags($_POST['tchName']);
          $name = trim($chTagsN);
          $this->tch_name = $name;

          $chTagsL = strip_tags($_POST['tchLastname']);
          $lastname = trim($chTagsL);
          $this->tch_lastname = $lastname;

          $date= strip_tags($_POST['tchBirthday']);
          $this->tch_birthday = $date;

          $schId= strip_tags($_POST['schId']);
          $this->sch_id = $schId;

         $this->update();



          }
  
    }

    else {
      echo "Invalid data";
    }

    
    }
  }


  public static function pagination(){

    $pagesNum = self::pageNum(); 


    $offset= $_POST['offset'];
    $page= $_POST['page'];
    $output='';
    $pagesLinks='';

    $prev="'prev'";
    $next="'next'";

    $data=[];


    $from = 'teachers.*, schools.sch_name';
    $join = 'join schools using (sch_id)';
    $limit = ' limit 5 offset ' .$offset ;


$teachers= self::getAll($limit, $from, $join);
 

 foreach ($teachers as $key=>$teacher )  
 {  
  $i++;
      $output .= '  
           <tr>  
     
                <th scope="row">'. ($key + 1 + $offset).'</th>


                <td><a href="?ctrl=teacher&ctrlm=edit&id='.$teacher->tch_id.'"> '.$teacher->tch_name.'</a></td>    
                <td><a href="?ctrl=teacher&ctrlm=edit&id='.$teacher->tch_id.'"> '.$teacher->tch_lastname.'</a></td>  
                <td><a href="?ctrl=teacher&ctrlm=edit&id='.$teacher->tch_id.'">'.$teacher->tch_birthday.'</a></td> 
                <td><a href="?ctrl=teacher&ctrlm=edit&id='.$teacher->tch_id.'">'.$teacher->sch_name.'</a></td>  
                <td><button class="btn btn-primary btnDelete" onclick = remove('.$teacher->tch_id.') ><i class="fa fa-times-circle" aria-hidden="true"></i></button></td>  
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




