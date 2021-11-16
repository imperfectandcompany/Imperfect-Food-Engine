<?php
class DatabaseConnector {

	private static function connect() {
		
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=igfastdl_foodengine;charset=utf8mb4', 'igfastdl', 'UR5WnRgRgUcT9mh5');
//then we tell pdo which password
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	}
	
	public static function query($query, $params = array()) {
		$statement = self::connect()->prepare($query);
		$statement->execute($params);
		
		
		//if the first keyword in the query is select, then run this.
		if (explode(' ', $query)[0] == 'SELECT' && explode(' ', $query)[1] != 'count(*)'){
			
		$data = $statement->fetchAll();
		return $data;			
		}	
		
		//if the second keyword in the query is select, then run this.
		if (explode(' ', $query)[0] == 'SELECT' && explode(' ', $query)[1] == 'count(*)'){
		$data = $statement->fetch();
		$data = $data['total'];
		return $data;			
		}			
		
	}

	

}