<?php

class personal extends controller
{

    public $userExt;

    public $id;
    public $firstname;
    public $username;

    public function __construct()
    {
        parent::__construct();

        $this->userExt = new userExt();

        if (isset($_SESSION['id'])) {
            $results = $this->userExt->getPersonalDetails($_SESSION['id']);

            $this->firstname = $results['0']['firstname'];
            $this->username = $results['0']['username'];
            $this->id = $results['0']['id'];
        }

        if (isset($_POST['personal_form'])) {
            $this->updateById($_POST['id']);
        }

        parent::renderPage("users/personal");

    }

    public function updateById($id)
    {

        if ($this->vaildate()) {
            $temp = $this->userExt->updatePersonalInfo($id, $_POST['firstname'], $_POST['username']);

            if($temp == TRUE) {
                echo $this->successMessage("Your Profile has been updated");
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
        }

        return true;
    }

}