<?php

class home extends controller {

    public $admin;

	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION['admin'])) {
		    echo $this->errorMessage("Sorry there as been an error, please try and login again to fix this");
        } else {
		    $this->admin = $_SESSION['admin'];
        }

		$this->renderPage('home');
	}
}
