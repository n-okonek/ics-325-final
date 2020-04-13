<?php

require("includes/page.php");
require("backend/getreviews.php");
use \Wander\GetReviews;

$PageTitle = "Your Expeditions Start Here"; //replace with SQL Query
$BgImg = "background.jpg"; //replace with SQL Query
$BgImgAlt = "Cliffs of Moor, Ireland"; //replace with SQL Query



class Homepage extends Page{

  public function Display(){
    session_start();
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    echo $this->content;
    $this ->DisplayReviews();
    $this -> DisplayFooter();
  }

  public function DisplayReviews(){
    $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");
    $query = "SELECT Location_ID, Rating, Review, Review_ID FROM reviewlist LIMIT 3";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($headline, $rating, $rContent, $review_ID);
        
    echo "<section class='top-reviews'>";

    while ($stmt->fetch()){
      ?>
      <div class='top-review'>
        <div class='review-content'>
        <!-- change variables to array pointers -->
        <h3><?=$headline?></h3> 
        <p><?=$rContent?></p>
      </div>
    </div>
    <?php
    }
    echo "</section>";
  }
}

$homepage = new Homepage();

$homepage->content ="
<div class='bg-img'>
<img src='img/".$BgImg."' alt='".$BgImgAlt."' />
</div>

<section class='page-title'>
<h2>".$PageTitle."</h2>
</section>";

$homepage->Display();
?>
