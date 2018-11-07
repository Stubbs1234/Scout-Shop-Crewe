<?php

class paid extends controller
{

    public $paidextobj;

    public $id;

    public function __construct()
    {
        parent::__construct();

        $this->paidextobj = new paidExt();

        if (isset($_GET['action']) == "update") {
            if(isset($_GET['id'])) {
                $this->id = $_GET['id'];
                $this->paidextobj->updateById($this->id);
            }
        }

        if (isset($_GET['action']) == "word") {
            $this->createSummary();
        }

        parent::renderPage("accounts/paid");
    }

    public function renderPaidTable()
    {
        $html = null;

        $results = $this->paidextobj->getPaidData();

        foreach ($results as $value) {
            $html .= "<tr><td>".$value['groupname']."</td><td>".$value['total']."</td><td>".$value['statement']."</td>";
            if ($value['paid'] == '1') {
                $html .= '<td><i class="fa fa-check-circle" style="font-size:30px;color:#5cb85c"></i></td>';
            } else {
                $html .= '<td><i class="fa fa-times-circle" style="font-size:30px;color:#d9534f"></i></td>';
            }
            $html .= "<td><a href='paid?action=update&id=".$value['id']."' class='btn btn-success'>Statment Paid</a></tr>";
        }

        return $html;
    }

    public function createSummary()
    {

        $result = $this->paidextobj->getSummary();

        $total = $this->paidextobj->getSumTotal();

        require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $header = array('size' => 14);
        $footer = array('size' => 12);
        $month = date('F Y');

        $section->addText('Scout Shop Monthly Statements for '.$month, $header);
        $section->addTextBreak(2);
        $tableStyle = array(
            'cellMargin'  => 80,
            'width' => '100%'
        );

        $CellStyle = array('width' => 1984.251968504 );
        $GroupCellStyle = array('width' => 3497.952755905 );
        $phpWord->addTableStyle('summaryTable', $tableStyle);
        $table = $section->addTable('summaryTable');

        if ($result->num_rows > 0) {
            while($row_data = $result->fetch_assoc()) {
                $table->addRow(800);
                $table->addCell(1984.251968504, $CellStyle)->addText($row_data['statement']);
                $table->addCell(3497.952755905, $GroupCellStyle)->addText($row_data['groupname']);
                $table->addCell(1984.251968504, $CellStyle)->addText($row_data['total']);

            }
        }

        $section->addTextBreak(2);
        $section->addText('This Month Total '.$total, $footer);
        $filedate = date('FY');
        $file = 'summary'.$filedate.'.docx';

        $phpWord->getCompatibility()->setOoxmlVersion(15);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save("php://output");
    }

}