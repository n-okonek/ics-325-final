<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Login To Your Account";
?>
    
  <div class="page-title">
    <h2><?php echo $PageTitle ?></h2>
  </div>

<!-- div container for all content in log-in widows (not image) --> 
<div class="content-panel">
  <div class="panel-img">
    <!-- just pic for reference  -->
    <img src="img/islandBackground.jpg" alt="Desert island">
  </div>
  <!-- discuss log-in processing for php --->
  <form id="login" action="./includes/auth.php" method="post">
    <div class="container" id="logInBoxes" >
      <label for="userName"><b>User Name:</b></label>
      <input class="form-control" type="text" placeholder="Enter Username" name="userName" id="userName" required></br>

      <label for="pswd"><b>Password:</b></label>
      <input class="form-control" type="password" placeholder="Enter Password" name="pswd" id="pswd" required></br>
      
    </div>

    <div class="container" id="submit">
      <button type="submit">Log-in</button>
      <span class="pswd"><a href="#">Forget your password?</a></span> | <span class="createAccount"><a href="./register.php">Create an account</a></span>
    </div>
  </form>

  
</div>



<?php require 'includes/footer.php'; ?>

