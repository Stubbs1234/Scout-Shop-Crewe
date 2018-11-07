<?php


class invoiceExt extends database
{

    public function addInvoice($total, $sign)
    {
        $date = validator::getsDateIntoMySql();

        $receipt = $_SESSION['receiptnumber'];
        $name = $_SESSION['name'];
        $group = $_SESSION['group'];
        $staff = $_SESSION['firstname'];

        $sql = "INSERT INTO accounts (date,trans,debits,receiptnumber,scoutgroup,credit,paid,staff,signFileUrl) VALUES ('$date','$name','$total','$receipt','$group','0.00','0','$staff','$sign')";

        $temp = $this->runQuery($sql);

        return $temp;
    }
}