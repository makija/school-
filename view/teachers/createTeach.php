
<div class="row">
	<div class="col-md-8">

		<p class="h3">New teacher</p>
  

  <form action="" method="post">


<div class="select">

  

  <select id="selSch"  class="custom-select" name="schId">
  <option selected disabled>Select school</option>


<?php foreach($this->schools as $sch){ ?>
  
  <option value="<?= $sch->sch_id ?>"><?= $sch->sch_name ?></option>
  
  <?php }?>


</select>

</div>

  <div class="col-md-5">
  <div class="form-group">
    <label for="schName">First name</label>
    <input type="text" class="form-control" id="frsName"  name="tchName">
  </div>
  <div class="form-group">
    <label for="schYear">Last Name</label>
    <input type="text" class="form-control" id="lstName" name="tchLastname">
  </div>
  <div class="form-group">
    <label for="schCity">Birthday <small>mm/dd/yyyy</small></label>
    <input type="date" class="form-control" id="brthDate" name="tchBirthday">
  </div>

</div>

<div class="col-md-3">
  
</div>


  <button type="submit" class="btn btn-primary" name="newTch">New Teacher</button>
</form>
</div>
</div>



<script type="text/javascript">
  

var x = $("#brthDate")
  .keyup(function() {
    var value = $( this ).val();
    $( "p" ).text( value );
  })

console.log(x);

</script>