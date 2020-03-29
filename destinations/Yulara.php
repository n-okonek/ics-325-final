<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Yulara, Northern Territory (Australia)";
?>

<div class="bg-img">
  <img src="img/Yulara.jpg" alt="Desert Observation" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="main-content">
 <?php echo "This small town in Australia is like a giant fancy hotel 
 with amenities available to house you while you explore outside the 
 town. Nearby you will see Lake Amadeus. Honestly this area is more for 
 touring. You can tour on camel back in some areas. You can tour the field 
 of lights during the sunrise in Uluru just outside of Yulara. Otherwise 
 hiking and helicopter rides are also a thing. Again, this is more of an 
 observation type destination. Take in the wonders of the land through several 
 means. Keep in mind this is a desert… so don’t focus on tumble weeds and cacti, 
 see the rest of the beauty and observe the wildlife."; ?>
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