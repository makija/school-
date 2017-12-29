

<?php 

require_once 'config.php';

include "navigation.php";

$s= new School;
$s->createSchool();




?>

<div class="row">
	<div class="col-md-8">

		<p class="h3">Create school</p>
<form action="" method="post">
  <div class="form-group">
    <label for="schName">School name</label>
    <input type="text" class="form-control" id="schName"  name="schName">
  </div>
  <div class="form-group">
    <label for="schYear">Year founded</label>
    <input type="text" class="form-control" id="schYear" name="schYear">
  </div>
  <div class="form-group">
    <label for="schCity">City</label>
    <input type="text" class="form-control" id="schCity" name="schCity">
  </div>


  <button type="submit" class="btn btn-primary" name="newSch">Insert</button>
</form>
</div>
</div>