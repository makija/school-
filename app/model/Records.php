<?php


abstract class Records{



	public static function getAll($filter=""){

		$db = Database::conn();

		

		$table= static::$table;
		$key = static::$key;

		$q = $db->query('select * from '.$table.' ' .$filter);

	

		$q->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$all = [];

		
		while($rw = $q->fetch()){
			$all[]= $rw;
		}

		return $all;


	}


	public static function get($id){

		$table= static::$table;
		$key = static::$key;

		$db = Database::conn();



		$q= $db->query('select * from '.$table.' where '.$key.' = '.$id);


		$q->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$res= $q->fetch();

		return $res;





	}

	function generateFields(){

		$fields='';
		$keyCol= static::$key;

		foreach($this as $key => $value){
			if($key==$keyCol) continue;
			$fields.= $key."= '".$value."', ";


		}
		
		$fields = rtrim($fields,", ");

		return $fields;
	}




	function save (){
		$table = static::$table;
		$db = Database::conn();
		$query = "insert into {$table} set ";
		$query.=$this->generateFields();
		$db->exec($query);
		// $keyCol = static::$key;
		// $this->$keyCol = $db->lastInsertId();

	}


	function update($id){
		$db = Database::conn();
		$table = static::$table;
		$idCol = static::$key;
		$query = "update {$table} set ";
		$query.= $this->generateFields();
		$query .= " where {$idCol} = {$id}";
		$db->exec($query);
		echo $query;
		
	}



	static function  delete($id){
		$db = Database::conn();
		$table = static::$table;
		$key = static::$key;
		$query = "delete from {$table} ";
		$query.="where {$key} = {$id}";
		echo $query;
		$db->exec($query);
		
	}
  


}

