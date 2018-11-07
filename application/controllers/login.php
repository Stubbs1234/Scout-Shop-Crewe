<?php

class login extends controller
{
		
	public $display;

    public function __construct()
    {
		parent::__construct();

        $userobj = new userExt();

        if(isset($_POST['loginForm'])) {
            $results = $userobj->login($_POST['username1'], $_POST['password1']);


            if($results == 1) {
                header("Location:home");
                exit();
            } elseif ($results == 2) {
                echo $this->errorMessage("Sorry username or password is wrong, Please try again");
            } elseif ($results == 3) {
                header("Location:resetpassword");
                exit();
            }

        }

        if (isset($_GET['action']) == "update") {
            echo $this->infoMessage("You need to login again");
        }
				
		$this->renderPage('login');
	}
}
