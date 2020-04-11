<?php
require("includes/page.php");

$blogpage = new Page();
$PageTitle = "The Wanderer's Blog"; //replace with SQL Query
$BgImg = "mountains.jpg"; //replace with SQL Query
$BgImgAlt = "Gone Wandering..."; //replace with SQL Query

$blogpage->content ="
<div class='account-img'>
<img src='img/".$BgImg."' alt='".$BgImgAlt."' />
</div>

<section class='page-title'>
<h2>".$PageTitle."</h2>
</section>

<div class='content-panel'>
    <h3>We've gone wandering... Check back soon for more updates</h3>
</div>
";

$blogpage->Display();
?>
