<?php

class Member
{
 private $db;

    function __construct()
    {
        $this->db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', 'glazpmck_ics325' );
    }

    public function processLogin($username, $password) {
        $passwordHash = md5($password);
        $query = "SELECT * FROM users WHERE Email = ? AND Psword = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $username, $passwordHash);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user);

        if(!empty($user)) {
            $_SESSION["userId"] = $user;
            return true;
        }
    }

    public function createUser($fname, $lname, $email, $pw, $dob, $coo){

        $passwordHash = md5($pw);
        $query = "INSERT INTO Users (Email, Fname,Lname,Psword,DOB,Origin) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssss", $email,$fname,$lname,$passwordHash,$dob,$coo);
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            $_SESSION["userId"] = $fname;
            $user = $_SESSION["userId"];
            return true;
        }
    }

    public function updateUser(){
        
    }

}
?>