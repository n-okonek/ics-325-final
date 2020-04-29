<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if ( !empty($_POST["register"]) ){
  $fName = filter_var($_POST["Fname"], FILTER_SANITIZE_STRING);
  $lName = filter_var($_POST["Lname"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
  $pw = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
  $pw2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
  $dob = filter_var($_POST["dob"], FILTER_SANITIZE_STRING);
  $coo = filter_var($_POST["origin"], FILTER_SANITIZE_STRING);
  require_once ("../backend/member.php");

  $newuser = new Member();
  

  if ($fName && $lName && $email && $pw && $pw2 && $dob && $coo){
    //start script to check fields
    if ($pw == $pw2){
      $newuser -> createUser($fName, $lName, $email, $pw, $dob, $coo);
      header("Location: ../account.php");
    }else{
      $_SESSION["errorMessage"] = "Password fields do not match.";
      //header("Location: ../register.php");
    }
    exit();
  }else{
    $_SESSION["errorMessage"] = "One or more fields are missing.";
    //header("Location: ../register.php");
  }
}