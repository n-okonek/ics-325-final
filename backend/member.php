<?php
namespace Wander;

use \Wander\DataSource;

class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "datasource.php";
        $this->ds = new DataSource();
    }

    function getMemberById($memberId)
    {
        $query = "select * FROM registered_users WHERE id = ?";
        $paramType = "i";
        $paramArray = array($memberId);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        
        return $memberResult;
    }
    
    public function processLogin($username, $password) {
        $passwordHash = md5($password);
        $query = "select * FROM registered_users WHERE user_name = ? AND password = ?";
        $paramType = "ss";
        $paramArray = array($username, $passwordHash);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if(!empty($memberResult)) {
            $_SESSION["userId"] = $memberResult[0]["id"];
            return true;
        }
    }

    public function createUser($fname, $lname, $email, $pw, $dob, $coo){
        $passwordHash = md5($pw);
        $query = "insert into users values (?, ?, ?, ?, ?, ?)";
        $paramType = "sssssi";
        $paramArray = array($fname, $lname, $email, $pw, $dob, $coo);
        $newUser = $this->ds->insert($query, $paramType,$paramArray);

        if(!empty($newUser)){
            $_SESSION["userId"] = $newUser[0]["id"];
            return true;
        }
    }
}
?>