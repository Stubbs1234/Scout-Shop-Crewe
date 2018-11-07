<?php

class logout extends controller {
		
	public function __construct() {

	    parent::__construct();

		$userExtObj = new userExt();

		$results = $userExtObj->logout($_SESSION['id']);

		if($results == true) {
            if(session_destroy()) {
                header("Location: index.php");
            }
        } else {
            echo $this->errorMessage("Sorry, there as been an error");
        }

	}
}
