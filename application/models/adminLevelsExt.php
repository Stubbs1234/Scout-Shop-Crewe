<?php


class adminLevelsExt extends database
{

    public function getAllAdminLevels()
    {
        $sql = "SELECT * FROM adminLevels";
        $result = $this->runQuery($sql);

        return $result;
    }

    public function getAllAdminLevelsArray()
    {
        $sql = "SELECT * FROM adminLevels";

        $html = null;

        $result = $this->runQuery($sql);

        while($row = $result->fetch_assoc()) {
            $html[] = array("id" => $row['id'], "description" => $row['description']);
        }

        return $html;
    }
}