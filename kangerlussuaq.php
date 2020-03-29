<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Kangerlussuaq, Greenland (North America)";
?>



<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>
<div class="exp-img">
  <img src="img/Kangerlussuaq.jpg" alt="Glaciers of Kangerlussuaq" />
</div>
<section class="main-content">
 <?php echo "Some people enjoy a destination where safety and history meet. 
 Want to hike to see one of the worlds most beautiful glaciers? Kangerlussuaq is 
 the place for you! The town is 31 miles north of the artic circle, which is perfect 
 for that warm getaway, they even have sand to sink your toes into… like, way down 
 deep… because its sinking sand. This town has more than sandy beaches and glacier hikes, 
 if you want to take a cruise and feel the brisk air of the sea, they have it! If you 
 want to watch Greenlands form of Nascar, you can watch car endurance experiments on 
 their gravel roads! If you want to educate yourself with some science, there is a research 
 facility called the Sondrestrom Upper Atmospheric Research Facility. I’m sure tours are 
 available if you ask them… after all, the town has a little over 500 people and I’m sure 
 they would be interested in having new faces around town."; ?>
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