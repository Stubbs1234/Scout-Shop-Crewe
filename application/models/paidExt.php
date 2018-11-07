<?php


class paidExt extends database
{

    public function getPaidData()
    {
        $sql = "SELECT summary.id,
                       summary.total,
                       summary.statement,
                       scoutsgroups.groupname,
                       summary.paid
                FROM summary 
                LEFT JOIN scoutsgroups ON scoutsgroups.id = summary.scoutgroup";

        $html = null;

        $result = $this->runQuery($sql);

        while($row = $result->fetch_assoc()){
            $html[] = array("id" => $row['id'], "total" => $row['total'], "statement" => $row['statement'], "groupname" => $row['groupname'], "paid" => $row['paid']);
        }

        return $html;
    }

    public function updateById($id)
    {

        $sql = "UPDATE summary SET paid = '1' WHERE id = '".$id."'";

        if ($this->runQuery($sql) === TRUE) {
            return TRUE;
        }
    }

    public function getSummary()
    {
        $sql = "SELECT 
                      summary.statement, 
                      summary.total, 
                      scoutsgroups.groupname 
                FROM summary 
                LEFT JOIN scoutsgroups ON scoutsgroups.id = summary.scoutgroup 
                ORDER BY scoutsgroups.groupname";

        $result = $this->runQuery($sql);

        return $result;
    }

    public function getSumTotal()
    {
        $sql = "SELECT SUM(summary.total) AS Sumdebits FROM summary";

        $results = $this->runQuery($sql);


        $sumrow = $results->fetch_assoc();

        return $sumrow['Sumdebits'];
    }
}