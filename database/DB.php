<?php

namespace App\Database;

/**
 * Class responsible for database queries
 */
class DB 

{

	private static $connection;


	public static function setConnection ($connection) 

	{

		static::$connection = $connection;

	}


	public static function selectAll ($table, $class = '', $field = 'id', $order = 'asc', $limit = '') 

	{
	
		$query = "SELECT * FROM $table ORDER BY $field $order $limit";

		$statement = static::$connection->prepare($query);

		$statement->execute();

		//optional parametar for mapping the results into a specific class
		if ($class) {

			return $statement->fetchAll(\PDO::FETCH_CLASS, $class);

		}

		return $statement->fetchAll(\PDO::FETCH_CLASS);
	
	}


	public static function insert($table, $data = []) 

	{
		
		try {

			$columnsArray = array_keys($data);
			$columnsString = implode(',', $columnsArray);

			$valuesArray = array_values($data);
			$valuesCount = count($valuesArray);

			$valuesPlaceholder = '';
			for ($i=0; $i < $valuesCount; $i++) { 
				$valuesPlaceholder .= '?,';
			}
			$valuesPlaceholder = rtrim($valuesPlaceholder, ',');


			$query = "INSERT INTO $table ($columnsString) VALUES ($valuesPlaceholder)";

			$statement = static::$connection->prepare($query);

			$statement->execute($valuesArray);

		} catch (\PDOException $e) {
			
			die("Insert failed: " . $e->getMessage());
			
		}
		
	
	}

}