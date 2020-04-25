<?php
session_start();
if ( isset($_POST["expedition"]) || $_POST["expedition"]!="" ) {

  $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");

  $userID = $_SESSION['userID'];
  $expedition = filter_var($_POST["expedition"], FILTER_SANITIZE_STRING);
  
  $query = "INSERT INTO savedlist (User_ID, Expedition_ID, Location_ID) VALUES (?,?,(SELECT Location_ID from expedition WHERE Expedition_ID = '$expedition' ))";
  $stmt = $db->prepare($query);
  $stmt->bind_param("is", $userID, $expedition);
  $stmt->execute();

  if ($stmt->affected_rows > 0){
    $_SESSION["successMessage"] = "You have successfully added an expedition!";
    header("Location: ../account.php");
  }
}
?>