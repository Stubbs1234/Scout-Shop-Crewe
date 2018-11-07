<?php

function __autoload($classname) {
	
	if(file_exists($_SERVER['DOCUMENT_ROOT']. '/application/models/' .$classname. '.php')) {
		require_once($_SERVER['DOCUMENT_ROOT']. '/application/models/' .$classname. '.php');
	}
	elseif(file_exists($_SERVER['DOCUMENT_ROOT']. '/application/models/entityclasses/' .$classname. '.php')) {
		require_once($_SERVER['DOCUMENT_ROOT']. '/application/models/entityclasses/' .$classname. '.php');
	}
	else if(file_exists($_SERVER['DOCUMENT_ROOT']. '/application/controllers/' .$classname. '.php')) {
		require_once($_SERVER['DOCUMENT_ROOT']. '/application/controllers/' . $classname. '.php');
	} 
	else if(file_exists($_SERVER['DOCUMENT_ROOT']. '/application/controllers/invoice/' .$classname. '.php')) {
		require_once($_SERVER['DOCUMENT_ROOT']. '/application/controllers/invoice/' . $classname. '.php');
	} 
	else if(file_exists($_SERVER['DOCUMENT_ROOT']. '/application/controllers/handlers/' .$classname. '.php')) {
		require_once($_SERVER['DOCUMENT_ROOT']. '/application/controllers/handlers/' . $classname. '.php');
	}
	else if(file_exists($_SERVER['DOCUMENT_ROOT']. '/application/controllers/users/' .$classname. '.php')) {
        require_once($_SERVER['DOCUMENT_ROOT']. '/application/controllers/users/' . $classname. '.php');
    }
    else if(file_exists($_SERVER['DOCUMENT_ROOT']. '/application/controllers/accounts/' .$classname. '.php')) {
        require_once($_SERVER['DOCUMENT_ROOT']. '/application/controllers/accounts/' . $classname. '.php');
    }
	else {
		 die('Cannot find ' .$classname. '.php');
				
	}
	
}
