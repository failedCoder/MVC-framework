<?php

//Bootstrap file for loading all of the necessary components 

use App\Request\Request;
use App\Database\DB;
use App\Database\Connection;
use App\Request\Router;

require_once "vendor/autoload.php";

require_once "helpers.php";

$config = require_once "config.php";

$dbConnection = Connection::make($config['database']);

DB::setConnection($dbConnection);

$router = new Router();

require_once "routes.php";

$router->directTo(Request::getUri(), Request::getMethod());