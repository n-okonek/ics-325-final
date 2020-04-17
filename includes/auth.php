<?php
session_start();
if (!(empty($_POST["userName"]) && empty($_POST["pswd"]))) {
    
    $username = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["pswd"], FILTER_SANITIZE_STRING);
    
    require_once ("../backend/member.php");
    
    $member = new Member();

    $isLoggedIn = $member->processLogin($username, $password);

    if ($isLoggedIn) {
        header("Location: ../account.php");
    }else{
        $_SESSION["errorMessage"] = "Invalid Credentials";
    }
}else{
    $_SESSION["errorMessage"] = "Credentials Missing";
} 

?>