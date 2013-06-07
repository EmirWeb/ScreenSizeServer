<?php

class MySQL {

	private static $URL = "localhost";
	private static $USER_NAME = "root";
	private static $PASSWORD = "";
	private static $DATABASE = "wedding";
	
	protected static $database = "";

	private function getDatabase(){
		if (self::$database == ""){
			self::$database = new mysqli(self::$URL, self::$USER_NAME, self::$PASSWORD, self::$DATABASE);
			if (self::$database->connect_errno)
				self::$database = "";
		}
		return self::$database;
	}
	
	public function rawQuery($rawQuery){
		$database = self::getDatabase();
		if ($database == "")
			return null;
		
		$result = $database->query($rawQuery);
		self::$database->close();
		self::$database = "";
		return $result;
	}
	
	public function insert($rawQuery){
		$database = self::getDatabase();
		if ($database == "")
			return null;
	
		$result = $database->query($rawQuery);
		$id = $database->insert_id;
		self::$database->close();
		self::$database = "";
		if (!$result)
			return null;
		
		return $id;
			
	}
	
	public function insertQueries($rawQueries){
		$database = self::getDatabase();
		if ($database == "")
			return null;
	
		$ids = array();
		$results = array();
		foreach ($rawQueries as $rawQuery){
			$results[] = $database->query($rawQuery);
			$id = $database->insert_id;
			$ids[] = $id;
		}
		
		
		self::$database->close();
		self::$database = "";
		if (empty($results))
			return null;
	
		return $ids;
			
	}
	
	public function rawQueries($rawQueries){
		$database = self::getDatabase();
		if ($database == "")
			return null;
		$results = array();
		foreach ($rawQueries as $rawQuery)
			$results[] = $database->query($rawQuery);
		self::$database->close();
		self::$database = "";
		return $results;
	}
	
	public function escapeString($string){
		$database = self::getDatabase();
		if ($database == "")
			return null;
		$result = $database->escape_string($string);
		self::$database->close();
		self::$database = "";
		return $result;
		
	}

	public function unescapeString($string){
		$string = stripslashes($string);
		$string = str_replace("<", "&lt;",$string);
		$string = str_replace(">", "&gt;",$string);
		$string = str_replace("\"", "\\\"",$string);
		return $string;
	}
	
}

?>