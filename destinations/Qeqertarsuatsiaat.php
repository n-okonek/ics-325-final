<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Qeqertarsuatsiaat, Greenland (North America)";
?>

<div class="bg-img">
  <img src="img/Qeqertarsuatsiaat.jpg" alt="Small Town, Large Mountains" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="main-content">
 <?php echo "If you like a small-town getaway feel with treasure hunts and 
 whales, then this is the location for you! A town of about 200 people, they 
 sure do know how to make you feel welcome and introduce you to the community. 
 Qeqertarsuatsiaat thrive on their trade of salmon, cod, whale blubber, seal and 
 seal skins, and mining. Due to this way of life, hunting parties, fishing fun, and 
 treasure hunting is availably to all. Imagine you and your cohorts venture through 
 the mines digging for rubies and pink sapphires!  Or volunteering to help those in need 
 by organizing food packing parties as a way to give back to the world. If you simply 
 want to fish, that is another relaxing way to vay-cay. Hop on a boat, bring some food… 
 you will be sailing for a while."; ?>
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