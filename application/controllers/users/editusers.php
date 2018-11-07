<?php

class editusers extends controller
{

    public $userExt;
    public $adminExt;

    public $id;

    public $firstname;
    public $username;
    public $accounttype;
    public $noaccess;

    public function __construct()
    {
        parent::__construct();

        $this->userExt = new userExt();
        $this->adminExt = new adminLevelsExt();

        if (isset($_GET['action'])) {

            if ($_GET['action'] == "edit") {
                if (isset($_GET['id'])) {
                    $this->id = $_GET['id'];
                    $results = $this->userExt->getUserInfo($this->id);

                    $this->firstname = $results['0']['firstname'];
                    $this->username = $results['0']['username'];
                    $this->accounttype = $results['0']['account'];
                }
            } elseif($_GET['action'] == "delete") {
                if (isset($_GET['id'])) {
                    $this->id = $_GET['id'];
                    $temp = $this->userExt->deleteUser($this->id);
                    if ($temp == TRUE) {
                        header("Location: users?para=deleted");
                    }
                }
            }
        }

        if (isset($_POST['edit_users'])) {
            $id = validator::sanitize($_POST['id']);
            $this->updateById($id);
        }

        parent::renderPage("users/editusers");

    }

    public function updateById($id)
    {

        if ($this->vaildate()) {
            if (isset($_POST['accounttype'])) {
                $accounttype = validator::sanitize($_POST['accounttype']);
            } else {
                $accounttype = $this->accounttype;
            }
            $tempfirstname = validator::sanitize($_POST['firstname']);
            $tempusername = validator::sanitize($_POST['username']);
            $temp = $this->userExt->updateUserInfo($id, $tempfirstname, $tempusername, $accounttype);

            if($temp == TRUE) {
                echo $this->successMessage("User Info Updated");
            }
        }
    }

    public function vaildate()
    {
        if (empty($_POST['firstname'])) {
            echo $this->errorMessage("Sorry, please enter a firstname");
            return false;
        } elseif (empty($_POST['username'])) {
           echo $this->errorMessage("Sorry, please enter a username");
           return false;
        } elseif (isset($_POST['accounttype']) &&  $_POST['accounttype'] == "Please Select") {
          echo $this->errorMessage("Sorry, you need to select an admin level");
          return false;
        }

        return true;
    }

    public function renderAdminLevel()
    {
        $result = $this->adminExt->getAllAdminLevelsArray();

        $html = null;

        $html .= '<option value="Please Select">Please Select</option>';

        foreach ($result as $value) {
            if ($this->accounttype === $value['id']) {
                $selected = "selected";
            } else {
                $selected = null;
            }

            $html .= '<option value="'.$value['id'].'" '.$selected.'>'.$value['description'].'</option>';
        }
        return $html;
    }
}