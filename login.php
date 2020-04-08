<?php
require("includes/page.php");


$PageTitle = "Login To Your Account"; //replace with SQL Query
$BgImg = "islandBackground.jpg"; //replace with SQL Query
$BgImgAlt = "Desert island"; //replace with SQL Query

class LoginPage extends Page{
  public function Display(){
    session_start();
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    echo $this->content;
    $this -> DisplayLogin();
    $this -> DisplayFooter();
  }

  public function DisplayLogin(){
    ?>  <!-- discuss log-in processing for php --->
    <form id='login' action='./includes/auth.php' method='post' onSubmit='return validate();'>
      <?php
        if (isset($_SESSION["errorMessage"])){
          ?>
          <div class="alert alert-warning" role="alert"><?= $_SESSION["errorMessage"];?></div>
          <?php unset($_SESSION["errorMessage"]);
        }
      ?>
      <div class='container' id='logInBoxes' >
        <label for='userName'><b>Email Address:</b></label><span id='user_info' class='error-info'></span>
        <input class='form-control' type='text' placeholder='Enter Email Address' name='userName' id='userName' required></br>
  
        <label for='pswd'><b>Password:</b></label><span id='password_info' class='error-info'></span>
        <input class='form-control' type='password' placeholder='Enter Password' name='pswd' id='pswd' required></br>
        
      </div>
  
      <div class='container' id='submit'>
        <button type='submit' name="login" value="Login">Log-in</button>
        <span class='pswd'><a href='#'>Forget your password?</a></span> | <span class='createAccount'><a href='./register.php'>Create an account</a></span>
      </div>
    </form>
  
  </div>
  <?php
  }
}

$login = new LoginPage();

$login->content ="
<section class='page-title'>
<h2>".$PageTitle."</h2>
</section>

<div class='content-panel'>
  <div class='panel-img'>
    <!-- just pic for reference  -->
    <img src='img/".$BgImg."' alt='".$BgImgAlt."'>
  </div>
";

$login->Display();
?>