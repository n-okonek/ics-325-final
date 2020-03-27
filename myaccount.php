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

<!-- Account info secion -->
<div class="accountSection">
    <h2><?php echo "Account Information"?></h2>
    <div class ="accountInfo">
        <p><?php echo "Member name:"."{account name}" ?></p>
        <p><?php echo "Wanderer since:"."{account creation date}"  ?></p>
        <p><?php echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Sagittis id consectetur purus ut faucibus. Sed augue lacus viverra vitae congue eu consequat. Diam phasellus vestibulum lorem sed risus ultricies tristique. Volutpat maecenas volutpat blandit aliquam etiam erat velit. Lorem donec massa sapien faucibus et molestie ac feugiat sed. Eu facilisis sed odio morbi quis. Scelerisque in dictum non consectetur a. Iaculis eu non diam phasellus vestibulum lorem. Morbi leo urna molestie at elementum eu facilisis sed odio. Felis donec et odio pellentesque diam volutpat commodo sed egestas. Neque vitae tempus quam pellentesque nec nam aliquam. Enim nunc faucibus a pellentesque. Auctor urna nunc id cursus metus. Libero nunc consequat interdum varius sit amet. Massa tincidunt dui ut ornare lectus sit amet est. Ultrices vitae auctor eu augue ut lectus arcu. Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. Vestibulum lectus mauris ultrices eros in." ?></p>
    </div>
    <div class="container" id="submit">
        <button type="submit">Update Profile</button>
    </div>    
</div>

<!--  My Expeditions section -->
<div class="expeditionSection">
    <h2><?php echo "My Expeditions"?></h2>
    <div class="myExpeditions">
        <h3><?php echo "{destination tag}"?></h3>
        <h3><?php echo "{excursion tag}"?></h3> 
        <p><?php echo "{date added}"?></p>
        <p><?php echo "{review or rating}"?>
    </div>
    <div class="container" id="submit">
        <button type="submit">Add Review</button>
    </div>    
</div>

<!-- WanderlustSection --> 

<div class="wanderlustSection">
    <h2><?php echo "Wanderlust"?></h2>
    <div class="wanderlust">
        <h3><?php echo "{destination tag}"?></h3>
        <h3><?php echo "{excursion tag}"?></h3> 
        <p><?php echo "{date added}"?></p>
        <a href="#">View info on this place</a>
    </div>
    <div class="container" id="submit">
        <button type="submit">Add Review</button>
    </div>  
</div>

<?php require 'includes/footer.php'; ?>
