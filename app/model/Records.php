<?php


abstract class Records{



	public static function getAll($filter="", $from =' * ',$join =''){

		$db = Database::conn();

		

		$table= static::$table;
		$key = static::$key;

		$q = $db->query('select '.$from.' from '.$table.' '.$join.' '.$filter);

	

		$q->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$all = [];

		
		while($rw = $q->fetch()){
			$all[]= $rw;
		}

		return $all;


	}


	public static function get($id,$from='*',$join=''){

		$table= static::$table;
		$key = static::$key;

		$db = Database::conn();



		$q= $db->query('select '. $from .' from '.$table.' '. $join .' where '.$key.' = '.$id);


		$q->setFetchMode(PDO::FETCH_CLASS, get_called_class());

		$res= $q->fetch();

		return $res;





	}


	public static function pageNum(){

		$key = static::$key;
		$table = static::$table;

		$db=Database::conn();

		$p=$db->query('SELECT COUNT('.$key.') from '.$table);
        $p->setFetchMode(PDO::FETCH_NUM);
        $p->execute();
        $pages = $p->fetch();
        return $pagesNum = ceil($pages[0]/5);

	}

	public function generateFields(){

		$fields='';
		$keyCol= static::$key;

		foreach($this as $key => $value){
			if($key==$keyCol) continue;
			$fields.= $key."= '".$value."', ";


		}
		
		$fields = rtrim($fields,", ");

		return $fields;
	}




	public function save (){
		$table = static::$table;
		$db = Database::conn();
		$query = "insert into {$table} set ";
		$query.=$this->generateFields();
		$db->exec($query);
		
	}


	public function update($id){
		$db = Database::conn();

		$table = static::$table;
		$idCol = static::$key;
		
		$query = "update {$table} set ";
		$query.= $this->generateFields();

		$query .= " where {$idCol} = {$id}";

		echo $query;
		
		$db->exec($query);
	

		
	}



	 public function  delete($id){
		$db = Database::conn();
		$table = static::$table;
		$key = static::$key;
		$query = "delete from {$table} ";
		$query.="where {$key} = {$id}";
		echo $query;
		$db->exec($query);
		
	}


  


}


