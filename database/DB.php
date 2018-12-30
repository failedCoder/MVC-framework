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

}