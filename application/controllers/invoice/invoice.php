<?php


class invoice extends controller
{

    public $groupExtObj;

    public function __construct()
    {
        parent::__construct();

        $this->groupExtObj = new groupsExt();

        if (isset($_POST['invoiceForm'])) {
            if ($this->vaildateForm()) {
                $_SESSION['receiptnumber'] = validator::sanitize($_POST['receipt']);
                $_SESSION['name'] = validator::sanitize($_POST['name']);
                $_SESSION['group'] = validator::sanitize($_POST['groups']);
                if(isset($_SESSION['receiptnumber']) && isset($_SESSION['name']) && isset($_SESSION['group'])) {
                    header("Location:description");
                }
            }
        }

        parent::renderPage("invoice/invoice");
    }

    public function vaildateForm()
    {
        if (empty($_POST['receipt'])) {
            echo $this->errorMessage("Sorry you need to enter a receipt number");
            return false;
        } elseif (empty($_POST['name'])) {
            echo $this->errorMessage("Sorry you need to enter a customer name");
            return false;
        } elseif (empty($_POST['groups']) || $_POST['groups'] == "Please Select") {
            echo $this->errorMessage("Sorry you need to select a group");
            return false;
        }

        return true;
    }
}