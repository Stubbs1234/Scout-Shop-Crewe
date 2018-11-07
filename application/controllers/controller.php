<?php 

class controller extends gui
{
		
	public function __construct() {
		
		session_start();		
		
	}
	
	public function renderPage($page) {
		
		$filename = $_SERVER['DOCUMENT_ROOT'].'/application/views/'.$page.'.php';
		
		if (file_exists($filename)) {
			include($_SERVER['DOCUMENT_ROOT'].'/application/views/' .$page. '.php');
		}

	}	

}

