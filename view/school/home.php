


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
   
  </ul>
</nav>

<script>


  var offset = 0;
  var pagesNum = '';



  $(document).ready(function(){

  $.ajax({
    url:'app/api/schoolListApi.php',
    method:'post',
    data:{
      
      offset:offset
    },
    dataType:'json',
    success:function(result){
    
      
   console.log(result);

      $('#schList').html(result.htmlTable);
      $('#pagination').html(result.pagesLinks);

      pagesNum = result.pagesNum;


      

    }


  })
});

  function requestPage(p){

    var page=1;

    if(p==='next'){

      if(offset>=(5*(pagesNum - 1))){offset-=5}
      console.log(p);

      page++;
        
    offset+=5;

    console.log(offset);
    console.log(page);
       

    }

    else if(p==='prev'){
       if(offset<=0) {offset+=5}
      page--;
     
      offset-=5;

      console.log(offset);
      console.log(page);

    }

    else {
     
     
       offset = (p-1) * 5;
       page = p;

        console.log(offset);
        console.log(page);

    }



    $.ajax({
    url:'app/api/schoolListApi.php',
    method:'post',
    data:{
      
      offset:offset,
      page:page
    },
    dataType:'json',
    success:function(result){

   

      $('#schList').html(result.htmlTable);
      

    }



  })

   
     
  }
  
  function remove(id){

    var con = confirm("Are you sure you want to remove this school from database?")

    if(con==true){

       $.ajax({

      url:'app/api/deleteSchoolApi.php',
      method:'post',
      data:{
        id:id
      },
      success:function(){

        $(document).ready(function(){

       $.ajax({
       url:'app/api/schoolListApi.php',
       method:'post',
       data:{
      
      offset:offset
    },
    dataType:'json',
    success:function(result){
    
      
   console.log(result);

      $('#schList').html(result.htmlTable);
      $('#pagination').html(result.pagesLinks);

      pagesNum = result.pagesNum;


      

    }


  })
})


      }
    })



    }

   
  }
    




  

</script>