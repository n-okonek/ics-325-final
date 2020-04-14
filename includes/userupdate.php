<?php

if (! empty($_POST["update"])) {
  $fName = filter_var($_POST["Fname"], FILTER_SANITIZE_STRING);
  $lName = filter_var($_POST["Lname"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
  $dob = filter_var($_POST["dob"], FILTER_SANITIZE_STRING);
  $coo = filter_var($_POST["origin"], FILTER_SANITIZE_STRING);
  require_once ("../backend/member.php");
  $updates = array($fname, $lname, $email, $pw, $dob, $coo);
    
  $member = new Member();
  
  foreach ($updates as $u){
    if (!isBlank($u)){
      $updated = $member -> updateUser($u);
    }
  }
  
  $updated = $member ->updateUser($fname, $lname, $email, $pw, $dob, $coo);
}

?>