<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Berlin, Germany (Europe)";
?>



<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<div class="exp-img">
  <img src="img/Berlin.jpg" alt="The Winds of Berlin" />
</div>

<section class="main-content">
 <?php echo "Love history? This place is loaded with it! Berlin allows 
 you to partake in rebuilding the wall and knocking it down so that 
 travelers from all over the world can experience the history first 
 hand! This attraction includes gun fire, bombing raids, and even being 
 a prisoner of war. If this attraction is not for you, don’t worry… Berlin 
 is very diverse and does not discriminate. Berlin has developed bicycle 
 lanes so you can explore the region in its entirety. It’s especially fun 
 to bicycle during the most coveted season of the year… tornado season! 
 People wear some sort of parachute or device that catches air to enact some 
 sort of flight to bypass the millions of people on the streets. People flying 
 kites? How about kite flying people? You can have endless fun and free travel 
 during this time of year. Most people ride trains or drive, again this is heavily 
 populated… so ensure your visitation is during the right time of year for expedited travel."; ?>
</section>


<section class="reviews">
  <h3>User Reviews</h3>
  <div class="top-review">
    <div class="review-content">
      <h4><?php echo "{Review Headline}"?></h4>
      <p><?php echo "{Review Content}"?></p>
    </div>
  </div>
  <div class="top-review">
    <div class="review-content">
      <h4><?php echo "{Review Headline}"?></h4>
      <p> <?php echo "{Review Content}"?></p>
    </div>
  </div>
  <div class="top-review">
    <div class="review-content">
      <h4><?php echo "{Review headline}"?></h4>
      <p> <?php echo "{Review Content}"?></p>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>