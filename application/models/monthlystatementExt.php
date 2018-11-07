<?php


class monthlystatementExt extends database
{

    public function getMonthlystatements($group)
    {
         $sql = "SELECT accounts.debits, accounts.id, accounts.date, accounts.trans, accounts.receiptnumber, accounts.credit, accounts.scoutgroup
                 FROM accounts
                 LEFT JOIN scoutsgroups ON scoutsgroups.id = accounts.scoutgroup
                 WHERE accounts.scoutgroup = '".$group."' 
                 AND accounts.createdSummary != '1'
                 ORDER BY DATE(date)";

        $result = $this->runQuery($sql);

        $list = null;


        while($row = $result->fetch_assoc()){
            $list[] = array('id' => $row['id'], 'date' => $row['date'], 'trans' => $row['trans'], 'receiptnumber' => $row['receiptnumber'], 'credit' => $row['credit'], 'debits' => $row['debits']);

        }


        return $list;
    }

    public function getTotal($group)
    {
        $sql = "SELECT SUM(accounts.debits) AS Sumdebits, scoutgroup 
                FROM accounts 
                WHERE scoutgroup = '$group' 
                AND createdSummary != '1' LIMIT 1";

        $html = null;

        $result = $this->runQuery($sql);

        while($row = $result->fetch_assoc()){
            $html[] = array("sumdebits" => $row['Sumdebits']);
        }

        return $html;
    }

    public function getInfo($group)
    {
        $sql = "SELECT SUM(accounts.debits) AS Sumdebits, scoutgroup 
                FROM accounts 
                WHERE scoutgroup = '$group' 
                AND createdSummary != '1' LIMIT 1";

        $result = $this->runQuery($sql);

        $html = null;

        while($row = $result->fetch_assoc()){
            $html[] = array("sumdebits" => $row['Sumdebits'], "scoutgroup" => $row['scoutgroup']);
        }

        return $html;
    }

    public function setSummary($group, $total, $state)
    {
        $sql = "INSERT INTO summary (scoutgroup, total, statement, paid) 
                VALUES ('$group', '$total', '$state', '0')";
        $this->runQuery($sql);
    }

    public function getTableData($group)
    {
        $sql = "SELECT date, trans, receiptnumber, credit, debits 
                FROM accounts 
                LEFT JOIN scoutsgroups ON scoutsgroups.id = accounts.scoutgroup 
                WHERE scoutgroup ='".$group."' 
                AND accounts.createdSummary != '1' 
                ORDER BY DATE(date)";
        $result = $this->runQuery($sql);

        return $result;
    }

    public function updateGroupRow($group)
    {
        $sql = "UPDATE accounts 
                SET createdSummary = '1' 
                WHERE scoutgroup = '$group'";
        $this->runQuery($sql);
    }



}