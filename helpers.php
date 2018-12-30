<?php

/**
 * Global helper functions
 */

//die and var_dump formatted expression
function dd ($expression) {

	echo "<pre>";
		die(var_dump($expression));
	echo "</pre>";

}

//includes the view template
function view ($view, $data = []) {

	extract($data);

	$viewFile = "resurces/views/" . $view . ".view.php";

	if (!is_file($viewFile)) {

		die("View: $view not found!");
		
	}

	include $viewFile;

}

//includes html partial file from partials directory in views
function includePartial ($partial) {

	$partialFile = "resurces/views/partials/" . $partial . ".view.php";

	if (!is_file($partialFile)) {

		die("View: $partial not found!");
		
	}

	include $partialFile;

}



