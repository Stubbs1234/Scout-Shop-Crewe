<?php


class gui
{

    public function errorMessage($message)
    {
        return "<div class='bg-danger' id='error' style='padding: 20px;'><h4>".$message."</h4></div>";
    }

    public function successMessage($message)
    {
       return "<div class='bg-success' id='success' style='padding: 20px;'><h4>".$message."</h4></div>";
    }

    public function infoMessage($message)
    {
        return "<div class='bg-info' id='info' style='padding: 20px;'><h4>".$message."</h4></div>";
    }

}