<?php

if (! empty($_POST["addreview"])) {

  $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");

  $country = filter_var($_POST["country"], FILTER_SANITIZE_STRING);
  $expedition = filter_var($_POST["expedition"], FILTER_SANITIZE_STRING);
  $headline = filter_var($_POST["reviewHeadline"], FILTER_SANITIZE_STRING);
  $reviewText = filter_var($_POST["reviewText"], FILTER_SANITIZE_STRING);
  $rating = filter_var($_POST["rating"], FILTER_SANITIZE_STRING);

  $query = "INSERT INTO reviewlist (User_ID, ReviewType, Rating, Review, ReviewHeadline, Country, City) VALUES (?,?,?,?,?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param("isissss", 200000, "Location", $rating, $reviewText, $headline, $country, $expedition);
  $stmt->execute();

  if ($stmt->affected_rows > 0){
    echo "review added";
  }
}
?>