<!DOCTYPE html>
<html>
<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';
?>
<!--  Do we need a "Log-in to your account" banner here, similiar to design mock-ups  -->


  <div class="logInBanner">
    <h2>LOGIN TO YOUR ACCOUNT</h2>
  </div>

<body>
<!-- div container for all content in log-in widows (not image) --> 
<div class="logInPanel">
  <div class="logInImg">
    <!-- just pic for reference  -->
    <img src="img/islandBackground.jpg" alt="Desert island">
  </div>
  <!-- discuss log-in processing for php --->
  <form action="/login_process.php" method="post">
    <div class="container" id="logInBoxes" >
      <label for="userName"><b>User Name:</b></label>
      <input type="text" placeholder="Enter Username" name="userName" required></br>

      <label for="pswd"><b>Password:</b></label>
      <input type="password" placeholder="Enter Password" name="pswd" required></br>
      <span class="pswd"><a href="#">Forget your password</a></span>
    </div>

    <div class="container" id="submit">
      <button type="submit">Log-in</button>
      <span class="createAccount"><a href="#">Create an account</a></span>
    </div>
  </form>
</div>



<?php require 'includes/footer.php'; ?>

</body>
</html>