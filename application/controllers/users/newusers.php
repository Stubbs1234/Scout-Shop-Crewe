<?php

class newusers extends controller
{

    public $userExt;
    public $adminExt;

    public $firstname;
    public $username;
    protected $password;
    protected $cpassword;
    public $accounttype;

    public function __construct()
    {
        parent::__construct();

        $this->userExt = new userExt();
        $this->adminExt = new adminLevelsExt();

        if (isset($_POST['add_new_users'])) {
            $userfirstname = $_SESSION['firstname'];
            $this->firstname = validator::sanitize($_POST['firstname']);
            $this->username = validator::sanitize($_POST['username']);
            $this->accounttype = validator::sanitize($_POST['accounttype']);
            $this->password = validator::sanitize($_POST['password']);
            $this->cpassword = validator::sanitize($_POST['cpassword']);

            $strpassword = sha1($this->password);

            if ($this->vaildate()) {
                if ($this->passwordCheck($this->password, $this->cpassword)) {
                    $results = $this->userExt->newUsers($this->firstname, $this->username, $strpassword, $this->accounttype, $userfirstname);
                }
            }

            if ($results === TRUE) {
                header("Location: users");
            }
        }


        parent::renderPage("users/newusers");

    }

    public function renderAdminLevel()
    {
        $result = $this->adminExt->getAllAdminLevels();

        $html = null;
        while($row = $result->fetch_assoc()) {
            $html .= '<option value="'.$row['id'].'">'.$row['description'].'</option>';
        }

        return $html;
    }

    public function vaildate()
    {
        if (empty($this->firstname)) {
            echo $this->errorMessage("Sorry, please enter a firstname");
            return false;
        } elseif (empty($this->username)) {
            echo $this->errorMessage("Sorry, please enter a username");
            return false;
        } elseif (empty($this->accounttype)) {
            echo $this->errorMessage("Sorry, please select a account type");
            return false;
        }

        return true;
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
}