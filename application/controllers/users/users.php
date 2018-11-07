<?php

class users extends controller
{

    public $userExt;

    public function __construct()
    {
        parent::__construct();
        $this->userExt = new userExt();

        if (isset($_GET['para'])) {
            if ($_GET['para'] == "deleted") {
                echo $this->successMessage("User Deleted");
            }
        }

        parent::renderPage("users/users");
    }

    public function renderUsers()
    {

        $result = $this->userExt->getUsers();

        $html = null;

        foreach ($result as $value) {
            $html .= '<tr><td>'.$value['firstname'].'</td>';
            $html .= '<td>'.$value['username'].'</td>';
            $html .= '<td>'.$value['description'].'</td>';
            $html .= '<td>'.$value['updated_at'].'</td>';
            $html .= '<td>'.$value['setupby'].'</td>';
            $html .= '<td>'.$value['lastlogout'].'</td>';
            if ($value['online'] == 1) {
                $html .= '<td><i class="fa fa-circle" style="font-size:30px;color:#5cb85c"></i></td>';
            } else {
                $html .= '<td><i class="fa fa-circle" style="font-size:30px;color:#d9534f"></i></td>';
            }
            if ($value['id'] === $_SESSION['id']) {
                $html .= '<td><a href="" class="btn btn-primary" disabled>Edit</a></td>';
            } else {
                $html .= '<td><a href="editusers?action=edit&id='.$value['id'].'" class="btn btn-primary">Edit</a></td>';
            } if ($value['online'] == 1) {
                $html .= '<td><a href="" class="btn btn-danger" disabled>Delete</a></td></tr>';
            } else {
                $html .= '<td><a href="editusers?action=delete&id='.$value['id'].'" class="btn btn-danger">Delete</a></td></tr>';
            }
        }

        return $html;
    }

}