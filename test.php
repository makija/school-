<?php


require 'config.php';

$x= School::get(2);

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