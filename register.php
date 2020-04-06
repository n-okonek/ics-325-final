<?php
require("includes/page.php");

$PageTitle = "New User Registration"; //replace with SQL Query
$BgImg = "marley_resort.jpg"; //replace with SQL Query
$BgImgAlt = "Bob Marley Resort, Nasau, Bahamas"; //replace with SQL Query

Class RegistrationPage extends Page{
  public $countries = [["US", "United States"],
                       ["UM", "United States Minor Outlying Islands"]
                      ];

  public function Display(){
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader(); //includes display menu
    echo $this->content;
    $this->DisplayRegForm($this->countries);
    $this -> DisplayFooter();
  }

  public function DisplayRegForm($countries){
    ?>
  <form id="regform" action="newuser.php" method="post">
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
      <button type="submit">Register</button>
    </div>
  </form>
  </div>
  <?php    
  }
}

$register = new RegistrationPage();

$register->content ="
<section class='page-title'>
<h2>".$PageTitle."</h2>
</section>

<div class='content-panel'>
<div class='panel-img'>
  <!-- just pic for reference  -->
  <img src='img/".$BgImg."' alt='".$BgImgAlt."'>
</div>";

$register -> Display();

?>