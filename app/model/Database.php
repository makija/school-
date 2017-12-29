<?php


class Database{

	private static $conn = null;

	public static function conn(){
		if(!self::$conn){
			self::$conn = new PDO("mysql:host=localhost;dbname=schools","marija","123");
			
		}
		return self::$conn;


	}
}



