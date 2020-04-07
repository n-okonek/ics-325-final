<?php
require("includes/page.php");
$BgImg = "marley_resort.jpg"; //replace with SQL Query
$BgImgAlt = "Bob Marley Resort, Nasau, Bahamas"; //replace with SQL Query

Class MyAccountPage extends Page{
  public $user = "UserName"; //replace with SQL query from user table
  public $countries = [["US", "United States"],
  ["UM", "United States Minor Outlying Islands"]
 ];

  public function Display(){
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    echo $this->content;
    $this -> DisplayAccountInfo();
    $this -> DisplayExpeditions();
    $this -> DisplayWanderlust();
    $this -> DisplayFooter();
    $this -> UpdateUserForm($this->countries);
    $this -> AddReview($this->user);
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
            <button type="submit" onclick="updateUser();">Update Profile</button>
        </div>    
      </div>
    <?php
  }

  public function UpdateUserForm($countries){
    ?>
    <div class="update-user">
  <form id="update-user" action="userupdate.php" method="post">
    <div class="container" id="register">
      <label for="Fname">First Name:</label>
      <input class="form-control" type="text" name="Fname" id="Fname" maxLength="24">
      </br>
      <label for="Lname">Last Name:</label>
      <input class="form-control" type="text" name="Lname" id="Lname" maxLength="24">
      </br>
      <label for="email">Email:</label>
      <input class="form-control" type="text" name="email" id="email" maxLength="36">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </br>
      <label for="birthday">Date of birth</label>
      <input class="form-control" type="date" name="dob" id="db">
      </br>
      <label for="origin">What country are you from?</label>
      <select class="form-control" class id="origin">
        <?php
          for ($c=0; $c < count($countries); $c++){
            echo "<option value='".$countries[$c][0]."'>".$countries[$c][1]."</option>";
          }
        ?>
      </select>
      </br>
    </div>
    <div class="container" id="submit">
      <button type="submit">Update Profile</button>
    </div>
    <div class="container" id="cancel">
      <div onclick="$('.update-user').fadeOut();">Cancel</div>
    </div>
  </form>
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
          <button type="submit" onclick="addReview();">Add Review</button>
        </div>    
      </div>
    <?php
  }

  public function AddReview($user){
    ?>
    <div class="add-review">
      <form id="add-review" action="addreview.php" method="post">
        <label for="reviewHeadline">Review Headline: </label>
        <input class="form-control" type="text" name="reviewHeadline" id="reviewHeadline" />
        </br>
        <label for="reviewText">Write your reivew:</label>
        <textarea id="reviewText" name="reviewText" class="form-control"></textarea>
        <div class="container" id="submit">
          <button type="submit">Update Profile</button>
        </div>
        <div class="container" id="cancel">
          <div onclick="$('.add-review').fadeOut();">Cancel</div>
        </div>
      </form>
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