<?php

require("includes/page.php");

class Homepage extends Page{

  public function Display($pageID){
    session_start();
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
    $query = "SELECT reviewlist.ReviewHeadline, reviewlist.Review, reviewlist.User_ID, users.fname, reviewlist.country, country.countryname, reviewlist.city, city.cityname, reviewlist.rating 
    FROM reviewlist
    inner join country on reviewlist.country = country.country_ID
    inner join city on reviewlist.city = city.city_id
    inner join users on reviewlist.user_id = users.user_ID
    ORDER BY RAND () LIMIT 3;";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($headline, $review, $uid, $name, $cid1, $country, $cid2, $city, $rating);
        
    echo "<section class='top-reviews'>";

    while ($stmt->fetch()){
      ?>
      <div class='top-review'>
        <div class='review-content'>
        <!-- change variables to array pointers -->
        <h3><?=$headline?><br /><?
          //convert numeric rating to stars
          for ($x=1; $x<=5; $x++){
            if ($x < $rating){
              ?><span class="fa fa-star"></span>
              <?
            }else{?> <span class="fa fa-star-o"></span> <?}
          }
        ?></h3> 
        <p><?= $city.", ".$country?><br /><?=$review?></p><p>- <?=$name?></p>
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
