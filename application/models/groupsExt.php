<?php


class groupsExt extends database
{

    public function getAllGroups()
    {
        $sqlGroup = "SELECT * FROM scoutsgroups";

        $result = $this->runQuery($sqlGroup);

        if ($result->num_rows > 0) {
            while($group = $result->fetch_assoc()){
                $list[] = array('id' => $group['id'], 'name' => $group['groupname']);

            }
        }

        return $list;
    }


    public function renderGroups()
    {

        $data = $this->getAllGroups();

        $html = null;

        $html .= "<select name='groups' class='form-control'>";
        $html .= "<option value='Please Select'>Please Select</option>";

        foreach ($data as $value) {
            $html .= "<option value='".$value['id']."'>".$value['name']."</option>";
        }

        $html .= "</select>";

        return $html;
    }

    public function getGroupById($groupid)
    {
        $sql = "SELECT groupname 
                FROM scoutsgroups 
                WHERE id = '".$groupid."' LIMIT 1";
        $results = $this->runQuery($sql);
        while($row = $results->fetch_assoc()) {
            $groupName = $row['groupname'];
        }

        return $groupName;
    }

}