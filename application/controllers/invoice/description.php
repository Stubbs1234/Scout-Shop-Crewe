<?php

class description extends controller
{

    public $productsExtObj;

    public function __construct()
    {
        parent::__construct();

        $this->productsExtObj = new productsExt();

        if (isset($_POST['urlForm'])) {
            $_SESSION['endTotal'] = validator::sanitize($_POST['endTotal']);
            header("Location:sign");
            exit();
        }

        parent::renderPage("invoice/description");
    }

}