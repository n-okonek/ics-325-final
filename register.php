<?php
require("includes/page.php");

Class RegistrationPage extends Page{

  public function Display($pageID){
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    $this -> SetPageInfo($pageID);
    echo $this->content;
    $this->DisplayRegForm();
    $this -> DisplayFooter();
  }

  public function DisplayRegForm(){
    $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");
    $cs_sql = "SELECT * FROM country";
    $cs_query = $db->query($cs_sql);
    $cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC);
    
    ?>
  <form id="regform" action="./includes/newuser.php" method="post">
  <?php
        if (isset($_SESSION["errorMessage"])){
          ?>
          <div class="alert alert-warning" role="alert"><?= $_SESSION["errorMessage"];?></div>
          <?php unset($_SESSION["errorMessage"]);
        }
      ?>
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
      <label for="password">Choose a Password:</label>
      <input class="form-control" type="password" name="password" id="password" onchange="" />
      <label for="password2">Confirm Password:</label>
      <input class="form-control" type="password" name="password2" id="password2" onchange="" /><br />
      <div class="alert" id="passmatch" style="display: none;"></div>
      <label for="birthday">Date of birth</label>
      <input class="form-control" type="date" name="dob" id="dob">
      </br>
      <label for="origin">What country are you from?</label>
      <select class="form-control" id="origin" name='origin'>
        <?php
          do {
            echo "<option value='".$cs_rs['Country_ID']."'>".$cs_rs['CountryName']."</option>";
          } while($cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC));
        ?>
      </select>
      </br>
    </div>
    <div class="container" id="submit">
      <button id="register" type="submit" name="register" value="register" >Register</button>
    </div>
  </form>
  </div>
  <?php    
  }
}

$register = new RegistrationPage();

$register->content ="";

$register -> Display(5);

?>
