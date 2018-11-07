<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

class monthlyStatement extends controller
{

    public $groupobj;

    public $statementobj;

    public function __construct()
    {
        parent::__construct();

        $this->groupobj = new groupsExt();

        $this->statementobj = new monthlystatementExt();

        if (isset($_POST['selectedGroup'])) {
            if (isset($_POST['groups'])) {
                if ($_POST['groups'] == "Please Select") {
                    echo $this->errorMessage("Please select a group");
                } else {
                    $_SESSION['group'] = $_POST['groups'];
                    $this->renderTable();
                }
            }
        }

        if (isset($_POST['infoForm'])) {
            if (isset($_POST['total'])) {
                $this->createSpreadsheet($_SESSION['group'],$_POST['total']);
            } else {
                echo $this->errorMessage("Sorry there as been an error with the total, please ask for help");
            }
        }

        parent::renderPage("accounts/monthlystatement");
    }

    public function renderTable()
    {

        if (isset($_SESSION['group'])) {
            $results = $this->statementobj->getMonthlystatements($_SESSION['group']);
        }


        $temp = null;

        if (empty($results)) {
            $temp = "<tr><td colspan='5'>Sorry not invoice submit this month</td></tr>";
        } else {
            foreach ($results as $value) {
                $temp .= "<tr><td>".$value['date']."</td><td>".$value['trans']."</td><td>".$value['receiptnumber']."</td><td>".$value['credit']."</td><td>".$value['debits']."</td></tr>";
            }
        }


        return $temp;
    }

    public function renderTotalInfo()
    {

        if (isset($_SESSION['group'])) {
            $results = $this->statementobj->getTotal($_SESSION['group']);
        }


        $html = null;

        if (empty($results)) {
            $html .= null;
        } else {
            foreach ($results as $value) {
                $html .= "<tr><td colspan='3'></td><td>Total</td><td>".$value['sumdebits']."</td></tr>";
            }
        }


        return $html;
    }

    public function renderInfo()
    {

        if (isset($_SESSION['group'])) {
            $result = $this->statementobj->getInfo($_SESSION['group']);
        }

        $html = null;

        if (empty($result)) {
            $html = null;
        } else {
            foreach ($result as $value) {
                $html .= "<input type='hidden' name='total' value='" . $value['sumdebits'] . "'/>";
            }
        }

        return $html;

    }

    public function createSpreadsheet($group, $total)
    {

        $state = validator::randomNumbers();

        $todayDate = validator::todaysDate();

        $date = validator::addMonth();

        $groupName = $this->groupobj->getGroupById($group);

        $this->statementobj->setSummary($group, $total, $state);

        $this->statementobj->getTableData($group);

        require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


        $inputFileName = 'statements.xls';

        /** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = IOFactory::load($inputFileName);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('E2', $state);
        $sheet->setCellValue('B8', $groupName);

        $result = $this->statementobj->getTableData($group);

        $row = 12; // 1-based index
        while($row_data = $result->fetch_assoc()) {
            $col = 1;
            foreach($row_data as $key=>$value) {
                $sheet->setCellValueByColumnAndRow($col, $row, $value);
                $col++;
            }
            $row++;
        }
        $sheet->setCellValue('E17', $total);
        $sheet->setCellValue('D19', $date);
        $sheet->setCellValue('D20', $todayDate);
        $spreadsheet->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$groupName.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

        unset($_SESSION['group']);

    }

}