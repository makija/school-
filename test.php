<?php

$t = new Teacher;
$t->update(16);

 

?>


<form action="" method="post">
	


<input type="text" name="tchName">
<input type="text" name="tchLastname">
<br>
<input type="text" name="tchBirthday">

<input type="submit" name="editTch">






</form>


<!-- class Database {
	private static $conn;
	public static function getConnection(){
		if(!self::$conn){
			self::$conn = 
		}
		return self::$conn;
	} 
} -->