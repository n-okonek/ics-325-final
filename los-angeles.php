<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Los Angeles, California (North America)";
?>

<div class="bg-img">
  <img src="img/Los Angeles.jpg" alt="Tubing through Los Angeles" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="main-content">
 <?php echo "Los Angeles is a water-park of dreams! Every year floods provide entertainment
beyond your wildest dreams! Like locations that have snowmobiling when snow hits, Los Angeles 
has boats and tubing when the floods hit! It is very popular amongst the younger crowds and quite 
a site to see. Most businesses shut down to partake in the activities, but some stay open to 
provide food services. Some other activities closer to the evening include stargazing from the roof 
tops with your pets, it’s almost as if every person in Los Angeles stops to take a breath because 
there is no place they’d rather be than to sit atop a roof with family and friends… possibly strangers, 
but how else are you going to meet people! They are a friendly type in this area. Prepare yourself 
for tubing, water skiing, star gazing from rooftops, and the food… well you are just going to have 
to see for yourself!"; ?>
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