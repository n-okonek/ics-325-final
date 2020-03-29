<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Samburg, Russia (Asia)";
?>

<div class="bg-img">
  <img src="img/Samburg.jpg" alt="ICE-olation" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="main-content">
 <?php echo "This location is home of the gas production. 
 This travel spot is more for the volunteer / mission type folk. 
 This an underdeveloped land that strictly focuses on the 
 harvesting of gas and oil. Like the Feed My Starving Children 
 program, we can feed the world with just a little more help in 
 that region. The Russians might share at this point… maybe… possibly. 
 Or maybe you will love the volunteer / mission type work so much 
 that you simply would be unable to leave. It’s kind-of up to you… 
 kind-of. Safe travels!"; ?>
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