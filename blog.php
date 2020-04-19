<?php
session_start();
require("includes/page.php");

$blogpage = new Page();

$blogpage->content ="
<div class='content-panel'>
    <h3>We've gone wandering... Check back soon for more updates</h3>
</div>
";

$blogpage->Display(2);
?>
