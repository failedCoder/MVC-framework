<?php

namespace App\Controller;


class IndexController 

{

	public function index() 

	{
		
		$message = "It works!";

		return view("index", compact('message'));
	
	}
	

}








