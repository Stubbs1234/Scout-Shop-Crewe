<?php

class resetpassword extends controller
{

    public $userExt;

    public $firstname;

    protected $password;
    protected $cpassword;


    public function __construct()
    {
        parent::__construct();

        $this->userExt = new userExt();

        if (isset($_SESSION['forcepassword']) == 1) {
            $this->firstname = $this->userExt->getFirstname($_SESSION['id']);
        } else {
            header("Location:index");
            exit();
        }

        if (isset($_POST['password_update'])) {

            $this->password = validator::sanitize($_POST['newpassword']);
            $this->cpassword = validator::sanitize($_POST['cpassword']);

            if ($this->validate($this->password, $this->cpassword)) {
                if ($this->passwordCheck($this->password, $this->cpassword)) {
                    $results = $this->userExt->updateUserPassword($this->password, $_SESSION['id']);
                    if ($results) {
                        header("Location:login?action=update");
                        exit();
                    } else {
                        echo $this->errorMessage("Sorry, There has been an error");
                    }
                }
            }

        }
        parent::renderPage("users/resetpassword");
    }

    private function passwordCheck($password, $cpassword)
    {
        if ($password != $cpassword) {
            echo $this->errorMessage("Sorry, password does not match");
            return false;
        } elseif (strlen($password) < 8) {
            echo $this->errorMessage("Password too short!");
            return false;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $this->errorMessage("Password must include at least one number!");
            return false;
        } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
            $this->errorMessage("Password must include at least one letter!");
            return false;
        }

        return true;
    }

    private function validate($password, $cpassword) {

        if (empty($password)) {
            echo $this->errorMessage("Sorry, You need to enter in a password");
            return false;
        } elseif (empty($cpassword)) {
            echo $this->errorMessage("Sorry, You need to re-enter the password to confirm");
            return false;
        }

        return true;
    }


}