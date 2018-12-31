<?php

//config file with database access params

return [

	'database' => [

		'host' => 'localhost',

		'name' => '',

		'username' => 'root',

		'password' => '',

		'options' => [

			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

		]
	]
];