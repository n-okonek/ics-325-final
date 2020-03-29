<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Bad Kissingen, Germany (Europe)";
?>



<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>
<div class="exp-img">
  <img src="img/bad-kissingen.jpg" alt="Sleeping in Bad Kissingen" />
</div>
<section class="main-content">
 <?php echo "I know what you may be thinking… does the name of this 
 region really speak for the millions of kissers that live there? It’s 
 possible, but situations have not been reported. You would think that 
 the hot mineral springs would set a better tone for such a situation… 
 but let’s leave it to our reviewers to tell their tails! Though the 
 natural springs sound lovely, it is the perfect getaway if you want 
 peace and quiet and a whole lot of sleep. The residents and visitors 
 will be fitted with a wearable device that tracks human habits that 
 would eventually read people as having the same patterns. The towns 
 experiment simulates dusk and down. Talk about relaxing! Kiss the world 
 of waking goodnight!"; ?>
</section>


<section class="reviews">
  <h3>User Reviews</h3>
  <div class="top-review">
    <div class="review-content">
      <h4><?php echo "{Review Headline}"?></h3>
      <p><?php echo "{Review Content}"?></p>
    </div>
  </div>
  <div class="top-review">
    <div class="review-content">
      <h4><?php echo "{Review Headline}"?></h3>
      <p> <?php echo "{Review Content}"?></p>
    </div>
  </div>
  <div class="top-review">
    <div class="review-content">
      <h4><?php echo "{Review headline}"?></h3>
      <p> <?php echo "{Review Content}"?></p>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>