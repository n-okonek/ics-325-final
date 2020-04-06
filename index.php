<?php
require("includes/page.php");

$homepage = new Page();
$PageTitle = "Your Expeditions Start Here"; //replace with SQL Query
$ReviewHeadline = "{Review Headline}"; //replace with SQL Query
$ReviewContent = "{Review Content}"; //replace with SQL Query
$BgImg = "background.jpg"; //replace with SQL Query
$BgImgAlt = "Cliffs of Moor, Ireland"; //replace with SQL Query

$homepage->content ="
<div class='bg-img'>
<img src='img/".$BgImg."' alt='".$BgImgAlt."' />
</div>

<section class='page-title'>
<h2>".$PageTitle."</h2>
</section>

<section class='top-reviews'>
  <div class='top-review'>
    <div class='review-content'>
      <!-- change variables to array pointers -->
      <h3>".$ReviewHeadline."</h3> 
      <p>".$ReviewContent."</p>
    </div>
  </div>
  <div class='top-review'>
    <div class='review-content'>
    <h3>".$ReviewHeadline."</h3> 
    <p>".$ReviewContent."</p>
    </div>
  </div>
  <div class='top-review'>
    <div class='review-content'>
    <h3>".$ReviewHeadline."</h3> 
    <p>".$ReviewContent."</p>
    </div>
  </div>
</section>
";

$homepage->Display();
?>