<?php

class userExt extends database
{

    public function login($username, $password)
    {


        $connect = $this->connect();
        $temppassword = sha1($password);

        $myusername = mysqli_real_escape_string($connect, $username);
        $mypassword = mysqli_real_escape_string($connect, $temppassword);

        $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";


        $result = $this->runQuery($sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $admin = $row['admin'];
        $firstname = $row['firstname'];
        $id = $row['id'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) {
            $_SESSION['firstname'] = $firstname;
            $_SESSION['admin'] = $admin;
            $_SESSION['id'] = $id;
            $_SESSION['adminLogin'] = "admin";
            if ($row['forcepassword'] == 1) {
                $_SESSION['forcepassword'] = 1;
                return 3;
            }  else {
                $sql = "UPDATE users SET online = '1' WHERE id='$id'";
                $results = $this->runQuery($sql);
                if ($results === TRUE) {
                    return 1;
                }
            }

        } else {
            return 2;
        }
    }

    public function logout($id)
    {
        $sql = "UPDATE users SET lastlogout = NOW(), online = '0' WHERE id ='$id'";
        $results = $this->runQuery($sql);

        return $results;
    }

    public function getUsers()
    {

        $sql = "SELECT 
                      users.id, 
                      users.username, 
                      users.firstname,  
                      adminLevels.description, 
                      users.created_at, 
                      users.updated_at, 
                      users.lastlogout, 
                      users.setupby, 
                      users.online 
                FROM users 
                LEFT JOIN adminLevels ON users.admin = adminLevels.id 
                ORDER BY firstname";
        $result = $this->runQuery($sql);

        $data = null;

        while ($row = $result->fetch_assoc()) {
           $data[] = array("id" => $row['id'], "username" => $row['username'],
                           "firstname" => $row['firstname'],
                           "description" => $row['description'], "created_at" => $row['created_at'],
                           "updated_at" => $row['updated_at'], "lastlogout" => $row['lastlogout'],
                           "setupby" => $row['setupby'], "online" => $row['online']);
        }

        return $data;
    }

    public function newUsers($firstname, $username, $password, $admin, $setupby)
    {
        $sql = "INSERT INTO users (firstname, username, password, forcepassword, admin, created_at, updated_at, setupby, online) VALUES ('$firstname', '$username', '$password', '1', '$admin', NOW(), NOW(), '$setupby', '0')";
        $results = $this->runQuery($sql);

        return $results;
    }

    public function getUserInfo($id)
    {
        $sql = "SELECT 
                      id, 
                      username, 
                      firstname,  
                      admin
                FROM users 
                WHERE id = '".$id."'";

        $result = $this->runQuery($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = array("id" => $row['id'], "username" => $row['username'],
                "firstname" => $row['firstname'],
                "account" => $row['admin']);
        }

        return $data;
    }

    public function updateUserInfo($id, $firstname, $username, $accounttype)
    {
        $sql = "UPDATE users
                        SET
                        firstname = '".$firstname."',
                        username = '".$username."',
                        admin = '".$accounttype."'
                        WHERE id = '".$id."'";

        $result = $this->runQuery($sql);

        if ($result == TRUE) {
            return TRUE;
        } else {
            return false;
        }

    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id='$id'";

        if ($this->runQuery($sql) === TRUE) {
            return true;
        }

    }

    public function getPersonalDetails($id)
    {

        $sql = "SELECT 
                      id, 
                      username, 
                      firstname  
                FROM users 
                WHERE id = '".$id."'";

        $result = $this->runQuery($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = array("id" => $row['id'], "username" => $row['username'],
                "firstname" => $row['firstname']);
        }

        return $data;


    }

    public function updatePersonalInfo($id, $firstname, $username)
    {
        $sql = "UPDATE users
                        SET
                        firstname = '".$firstname."',
                        username = '".$username."',
                        WHERE id = '".$id."'";

        $result = $this->runQuery($sql);

        if ($result == TRUE) {
            return TRUE;
        } else {
            return false;
        }

    }

    public function getFirstname($id)
    {
        $sql = "SELECT firstname FROM users WHERE id = '".$id."'";

        $results = $this->runQuery($sql);

        $row = $results->fetch_assoc();

        return $row['firstname'];
    }

    public function updateUserPassword($password, $id)
    {

        $temppassword = sha1($password);

        $sql = "UPDATE users SET password = '".$temppassword."', 
                                 forcepassword = '0'
                             WHERE id= '".$id."'";

        $result = $this->runQuery($sql);

        if ($result == TRUE) {
            return TRUE;
        } else {
            return false;
        }
    }

}