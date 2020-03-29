<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Snezhnogorsk, Russia (Asia)";
?>

<div class="bg-img">
  <img src="img/Snezhnogorsk.jpg" alt="Closed City of Snezhnogorsk" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="main-content">
 <?php echo "This location is a closed city. You know what this means! 
 It means that like spy movies, and other video games… the main goal is 
 to infiltrate and become one with this city. Once you do that the rest 
 of your vacation will flourish. One option is touring the Naval Nerpa 
 Shipyard. Since there are only 12,000 for the population, this shipyard is 
 the main employer. The shipyard services and repairs nuclear submarines, 
 wouldn’t that be a sight to behold? Different character you could play would 
 be an asylum seeker, double agent, or deserter. Think of this opportunity as 
 a live action role play (larp). This destination is definitely a larper’s dream."; ?>
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