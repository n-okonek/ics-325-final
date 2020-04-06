<?php
require("includes/page.php");
$BgImg = "marley_resort.jpg"; //replace with SQL Query
$BgImgAlt = "Bob Marley Resort, Nasau, Bahamas"; //replace with SQL Query

Class MyAccountPage extends Page{
  public $user = "UserName"; //replace with SQL query from user table

  public function Display(){
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader(); //includes display menu
    echo $this->content;
    $this -> DisplayAccountInfo();
    $this -> DisplayExpeditions();
    $this -> DisplayWanderlust();
    $this -> DisplayFooter();
  }

  public function DisplayAccountInfo(){
    ?>
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
    <?php
  }

  public function DisplayExpeditions(){
    ?>
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
    <?php
  }

  public function DisplayWanderlust(){
    ?>
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
          <button type="submit">Add Journey</button>
        </div>  
      </div>
    <?php
  }

}

$account = new MyAccountPage();

$account->content ="
<div class='account-img'>
<img src='img/".$BgImg."' alt='".$BgImgAlt."' />
</div>

<section class='page-title'>
<h2> Welcome".$user."</h2>
</section>";

$account -> Display();

?>