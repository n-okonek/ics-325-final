<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Welcome {username}";
?>

<div class="account-img">
  <img src="img/badlands-overlook-at-sunset.jpg" alt="Badlands overlook at sunset" />
</div>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>


<!-- Account info secion -->
    <div class="account-panel">
        <h3><?php echo "Account Information"?></h3>
        <div class ="accountInfo">
            <p><?php echo "Member name:"."{account name}" ?></p>
            <p><?php echo "Wanderer since:"."{account creation date}"  ?></p>
            <p><?php echo "Email:"."{email}" ?></p>
            <p><?php echo "Birthday:"."{dob}" ?></p>
            <p><?php echo "Country:"."{country}" ?></p>
        </div>
        <div class="container" id="submit">
            <button type="submit">Update Profile</button>
        </div>    
    </div>

    <!--  My Expeditions section -->
    <div class="expedition-panel">
        <h3><?php echo "My Expeditions"?></h3>
        <div class="myExpeditions">
            <h4><?php echo "{destination tag}"?></h4>
            <h4><?php echo "{excursion tag}"?></h4> 
            <p><?php echo "{date added}"?></p>
            <p><?php echo "{review or rating}"?>
        </div>
        <div class="container" id="submit">
            <button type="submit">Add Review</button>
        </div>    
    </div>

    <!-- WanderlustSection --> 

    <div class="wanderlust-panel">
        <h3><?php echo "Wanderlust"?></h3>
        <div class="wanderlust">
            <h4><?php echo "{destination tag}"?></h4>
            <h4><?php echo "{excursion tag}"?></h4> 
            <p><?php echo "{date added}"?></p>
            <a href="#">View info on this place</a>
        </div>
        <div class="container" id="submit">
            <button type="submit">Add Review</button>
        </div>  
    </div>

<?php require 'includes/footer.php'; ?>
