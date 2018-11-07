<?php


class sign extends controller
{

    private $total;

    public function __construct()
    {
        parent::__construct();

        $invoiceExt = new invoiceExt();

        if (isset($_SESSION['endTotal'])) {
            $this->total = $_SESSION['endTotal'];
        }

        if (isset($_POST['urlForm'])) {

            $sign = $_POST['url'];

            $results = $invoiceExt->addInvoice($this->total, $sign);

            if ($results === true) {
                header("Location:home");
                exit();
            }
        }

        parent::renderPage("invoice/sign");

    }

}