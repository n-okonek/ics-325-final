<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "San Diego, California (North America)";
?>

<div class="bg-img">
  <img src="img/San Diego.jpg" alt="Broken Glass of San Diego" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="main-content">
 <?php echo "San Diego could be considered one of the most naturally artistic 
 cities in north America, and is especially interesting to the thrill seekers. 
 How does the city get its reputation? Simple… Earthquakes! Some earthquakes take 
 you on a ride for your life, and others show the textual art it forges in many 
 communities. Walking downtown would be glamorous due to the unique glass breaking 
 technique that would give stained glass a run for their money. Imagine standing next 
 to a sky-rise watching the art manifest before your eyes! Some other sites would be 
 light shows. Power-lines provide spark and glow for an electrifying experience. Some 
 other activities are similar to fun runs or obstacle courses. Earthquakes provide 
 different courses depending on the origin. People take the opportunity, as a city, 
 to partake in these types of fun runs simultaneously. You could compare it to the 
 running of the bulls in other countries."; ?>
</section>


<section class="top-reviews">
  <div class="top-review">
    <div class="review-content">
      <h3><?php echo "{Review Headline}"?></h3>
      <p><?php echo "{Review Content}"?></p>
    </div>
  </div>
  <div class="top-review">
    <div class="review-content">
      <h3><?php echo "{Review Headline}"?></h3>
      <p> <?php echo "{Review Content}"?></p>
    </div>
  </div>
  <div class="top-review">
    <div class="review-content">
      <h3><?php echo "{Review headline}"?></h3>
      <p> <?php echo "{Review Content}"?></p>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>