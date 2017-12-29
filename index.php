<?php
require "config.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="/view/css/style.css">
	<script type="text/javascript" src="view/js/jquery-3.2.1.min.js"></script>

	<style type="text/css">
		

.home a:link{

	display: block;
	margin: 30px auto;
	width:50%;
	border: solid 2px blue;
	border-radius: 10px;
	height: 120px;
	background: blue;
	color: white;
	padding: 30px;
}

.home a:hover{
	border: solid 4px blue;
	border-radius: 10px;
	color: blue;
	text-decoration: none;
	background: white;
	
}

.btnDelete{

	padding:  0 5px !important;
}


.h3{
	padding: 10px !important;
}

.select{
	margin: 30px 10px;
}

.btnBor{
	border: 2px solid white;
}

.btnBor:hover{
	background: white;
	border: solid 2px #007bff;
	color: #007bff !important;

}

	</style>

	<script src="https://use.fontawesome.com/800f047ad5.js"></script>

</head>
<body>
    
 


<div class="container">
	<?php


$controller = isset($_GET['ctrl'])?($_GET['ctrl']."Controller"):"baseController";
$metod = isset($_GET['ctrlm'])?($_GET['ctrlm']):"index";


$controller = new $controller;
$controller->$metod();
	
?>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>



</body>
</html>

