<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Mwanza, Democratic Republic of the Congo (Africa)";
?>

<div class="bg-img">
  <img src="img/Mwanza.jpg" alt="Calm before the Storm" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="main-content">
 <?php echo "Africa has so many things to offer. Mwanza is practically 
 off the grid, but be warned… this travel destination isn’t for the weak. 
 This is for the more experienced live off the land travelers. Believe it 
 or not, isolation and survival skills are a way from some people to relax. 
 Instead of playing war video games, you can participate in real life here. 
 While the town is populated and developing their region, there are those 
 surprise visits in which people must defend their lives. It’s almost like 
 grand theft auto, but a bit more inclusive. You travel through tribes, developed 
 land, or just nature itself on your own. Regardless, this is more of a thrill 
 seeker type area where you would journey as a minimalist."; ?>
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