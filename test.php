<?php


require 'config.php';

$x= School::pagination();

print_r($x);




?>


<!-- class Database {
	private static $conn;
	public static function getConnection(){
		if(!self::$conn){
			self::$conn = 
		}
		return self::$conn;
	} 
} -->