<?php
session_start();

class Member
{
 private $db;

    function __construct()
    {
        $this->db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', 'glazpmck_ics325' );
    }

    public function processLogin($username, $password) {
        $passwordHash = md5($password);
        $query = "SELECT * FROM users WHERE Email = '$username' AND Psword = '$passwordHash'";
        $result = $this->db->query($query);
        //$result->bind_param("ss", $username, $passwordHash);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        
        if($result->num_rows){
            $_SESSION['userID'] = $row['User_ID'];
            $_SESSION['user'] = $row['FName'];
            $_SESSION['MemberName'] = $row['FName']." ".$row['LName'];
            $_SESSION['MemberSince'] = $row['AccountCreated'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['DOB'] = $row['DOB'];
            $_SESSION['Country'] = $row['Origin'];
            return true;
        }
        $this->db->close();

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