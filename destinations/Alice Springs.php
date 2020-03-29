<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Alice Springs, Northern Territory (Australia)";
?>

<div class="bg-img">
  <img src="img/Alice Springs.jpg" alt="Bonfires with the Locals" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="main-content">
 <?php echo "This location is geared more towards spring breakers. 
 Australia is known for hot and hip culture. Types of events include 
 bonfires, camp fires, fire performers, and it’s really thanks to nature. 
 The beautiful embers of red, and the mythical smoke produced by the 
 natural fires each year produce somewhat of a giant fire festival. 
 Fire enables new to be born, so everyone celebrates by extinguishing 
 the flames so the new form of life can begin. Nations have helped partake 
 in this event in recent years. If you like a warm destination with majestic 
 flames… this hot spot is for you!"; ?>
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