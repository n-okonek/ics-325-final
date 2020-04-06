<?php
require("includes/page.php");

$adventure = new Page();
$PageTitle = "Kangerlussuaq, Greenland (North America)"; //replace with SQL Query pull from page table
$Location = "Kangerlussuaq, Greenland"; //replace with SQL Query pull from expeditions table
$Description = "{ContentSummary}"; //replace with SQL Query pull from expeditions table
$expImg = "Kangerlussuaq.jpg"; //replace with SQL Query pull from page table
$expImgAlt = "Glaciers of Kangerlussuaq"; //replace with SQL Query
$map = file_get_contents('img/map.php');
$reviews = [["headline1", "Content", "user"],
            ["headline2", "Content", "user"],
            ["headline3", "Content", "user"]
          ]; //this array will be replaced with a sql query that creates a table of reviews for the location being viewed

$adventure->content ="
<section class='page-title'>
  <h2>".$PageTitle."</h2>
</section>

<div class='exp-img'>
  <img src='img/".$expImg."' alt='".$expImgAlt."' />
</div>

<section class='main-content'>".$Description."
</section>

<section class='reviews'>
<h3>User Reviews</h3>".ReviewGen($reviews)."
</section>";

$adventure->Display();

function ReviewGen($reviews){
  for ($a=0; $a < count($reviews); $a++ ) {
    echo "<div class='top-review'>
      <div class='review-content'>
        <h4>".$reviews[$a][0]."</h4>
        <p>".$reviews[$a][1]."</p>
      </div>
    </div>";
    }
  }
?>