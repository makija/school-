<?php

$tch= $this->teacher;
$schools= $this->schools;
$selected='';

$t = new Teacher;
$t->editTeacher($_GET['id']);


?>

<div class="row">
	<div class="col-md-8">

		<p class="h3">Update teacher</p>
  

  <form action="" method="post">


<div class="select">

  

  <select id="selSch"  class="custom-select" name="schId">

    <option disabled>Select school</option>

    <?php foreach($schools as $school){ 

       ($school->sch_id == $tch->sch_id)? $selected='selected': $selected = ''; 

      echo "<option value=".$school->sch_id." ".$selected.">". $school->sch_name."</option>";
  
  } ?>
   
</select>

</div>

  <div class="col-md-5">
  <div class="form-group">
    <label for="schName">First name</label>
    <input type="text" class="form-control" id="frsName"  name="tchName" value="<?=$tch->tch_name?>">
  </div>
  <div class="form-group">
    <label for="schYear">Last Name</label>
    <input type="text" class="form-control" id="lstName" name="tchLastname" value="<?=$tch->tch_lastname?>">
  </div>
  <div class="form-group">
    <label for="schCity">Birthday <small>mm/dd/yyyy</small></label>
    <input type="date" class="form-control" id="brthDate" name="tchBirthday" value="<?=$tch->tch_birthday?>">
  </div>

</div>

<div class="col-md-3">
  
</div>


  <button type="submit" class="btn btn-primary" name="editTch">Save</button>
</form>
</div>
</div>