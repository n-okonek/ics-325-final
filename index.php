<?php

require("includes/page.php");

class Homepage extends Page{

  public function Display($pageID){
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    $this -> SetPageInfo($pageID);
    echo $this->content;
    $this ->DisplayReviews();
    $this -> DisplayFooter();
  }

  public function DisplayReviews(){
    $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");
    $query = "SELECT User_ID, Rating, Review FROM reviewlist LIMIT 3";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($headline, $rating, $rContent);
        
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

    $stmt->free_result();
    $db->close();
  }
}

$homepage = new Homepage();



$homepage->content ="";

$homepage->Display(1);
?>
