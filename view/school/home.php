


<?php include 'navigation.php';?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">School </th>
      <th scope="col">City</th>
      <th scope="col">Year</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="schList">
   
  </tbody>
</table>


<nav aria-label="Page navigation example">
  <ul class="pagination" id="pagination">
    <li  onclick='requestPage("prev")' class="page-item"  ><a  class="page-link" href="#">Previous</a></li>
    
    <li onclick='requestPage("next")' class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

<script>

  var page = 0;
  var offset = 0;

  function requestPage(p){

    

    if(p==='next'){
      console.log(page);

      page++;
    offset+=5;
       

    }

    else if(p==='prev'){
      console.log(page);
      page--;
      offset-=5;

    }

    else {
      console.log(page);
       offset = (p-1) * 5;

    }



    $.ajax({
    url:'app/api/schoolListApi.php',
    method:'post',
    data:{
      page:page,
      offset:offset
    },
    dataType:'json',
    success:function(result){

   

      $('#schList').html(result.htmlTable);
      

    }



  })

   
     
  }

  
$(document).ready(function(){

  $.ajax({
    url:'app/api/schoolListApi.php',
    method:'post',
    data:{
      page:page,
      offset:offset
    },
    dataType:'json',
    success:function(result){
    
      
   

      $('#schList').html(result.htmlTable);

     for(var i = result.pagesNum; i>=1;i--){

      console.log(i);

      $('#pagination li:first-child').after('<li id='+ i +' class="page-item"><a class="page-link" href="#">'+ i +'</a></li>');
     }
      
      

    }


  })
});
</script>