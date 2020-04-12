<?php
namespace Wander;

use \Wander\Member;
if (! empty($_POST["login"])) {
    session_start();
    $username = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["pswd"], FILTER_SANITIZE_STRING);
    require_once (__DIR__ . "../backend/member.php");
    
    $member = new Member();
    $isLoggedIn = $member->processLogin($username, $password);
    if (! $isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
        header("Location: ../login.php");
    }
    header("Location: ../account.php");
    exit();
} else{
    header("Location: ../login.php");
}
?>