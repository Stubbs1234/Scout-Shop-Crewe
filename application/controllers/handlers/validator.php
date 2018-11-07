<?php

class validator 
{

	public static function getsDateIntoMySql()
    {
        return date("Y/m/d");
    }

    public static function randomNumbers()
    {
        $length = 4;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function todaysDate()
    {
        $todayDate = date("d/m/Y");

        return $todayDate;
    }

    public static function addMonth()
    {

        $newdate = strtotime ( '+1 month') ;
        $newdate = date ( 'd/m/Y' , $newdate );

        return $newdate;
    }

    public static function sanitize($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}