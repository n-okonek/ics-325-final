<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Your Expeditions Start Here";
?>

<div class="bg-img">
  <img src="img/background.jpg" alt="Cliffs of Moor, Ireland" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<!-- <section class="main-content">
 <?php //echo "{some information about this site because this area feels really empty on tablet portrait view... }"; ?>
</section>
-->

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
