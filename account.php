<?php
session_start();

if (empty($_SESSION['LoggedIn'])){
  $_SESSION["errorMessage"] = "We were not able to identify your account, please log in.";
  header("Location: ./login.php");
}

else{
require("includes/page.php");

Class MyAccountPage extends Page{

  private $db;

  function __construct()
  {
      $this->db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', 'glazpmck_ics325' );
  }

  public function Display($pageID){
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    $this -> SetPageInfo($pageID);
    echo $this->content;
    $this -> DisplayAccountInfo();
    $this -> DisplayExpeditions();
    $this -> DisplayWanderlust();
    $this -> DisplayFooter();
    $this -> UpdateUserForm($this->countries);
    $this -> AddReview();
    $this -> AddJourney();
  }

  public function DisplayAccountInfo(){
    ?>
      <!-- Account info secion -->
      <div class="account-panel">
        <h3><?php echo "Account Information"?></h3>
        <div class ="accountInfo">
            <p><?php echo "Member name: ".$_SESSION['MemberName'] ?></p>
            <p><?php echo "Wanderer since: ".$_SESSION['MemberSince']  ?></p>
            <p><?php echo "Email: ".$_SESSION['Email'] ?></p>
            <p><?php echo "Birthday: ".$_SESSION['DOB'] ?></p>
            <p><?php echo "Country: ".$_SESSION['Country'] ?></p>
        </div>
        <div class="container" id="submit">
            <button type="submit" onclick="updateUser();">Update Profile</button>
        </div>    
      </div>
    <?php
  }

  public function UpdateUserForm($countries){
    $cs_sql = "SELECT * FROM country";
    $cs_query = $this->db->query($cs_sql);
    $cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC);
    ?>
    <div class="update-user">
  <form id="update-user" action="./includes/userupdate.php" method="post">
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
      <select class="form-control" class id="origin" name="origin">
      <option>Select an option to change where you are from</option>
      <?php
          do {
            echo "<option value='".$cs_rs['Country_ID']."'>".$cs_rs['CountryName']."</option>";
          } while($cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC));
        ?>
      </select>
      </br>
    </div>
    <div class="container" id="submit">
      <button type="submit" value="update" name="update">Update Profile</button>
    </div>
    <div class="container" id="cancel">
      <div onclick="closeForm('update-user')">Cancel</div>
    </div>
  </form>
  </div>
  <?php
  }

  public function DisplayExpeditions(){
    $userID = $_SESSION['userID'];
    $reviews_sql = "SELECT reviewlist.User_ID, reviewlist.Rating, reviewlist.Review, reviewlist.ReviewHeadline, reviewlist.DateAdded, city.CityName, country.CountryName 
    FROM reviewlist
    LEFT JOIN (users, city, country)
    ON (users.User_ID=reviewlist.User_ID 
    AND city.City_ID=reviewlist.City 
    AND country.Country_ID = reviewlist.Country)
    WHERE reviewlist.User_ID = '$userID'";
    $reviews_rs = $this->db->query($reviews_sql);
    $row=$reviews_rs->fetch_array(MYSQLI_ASSOC);
    ?>
      <!--  My Expeditions section -->
      <div class="expedition-panel">
        <h3><?php echo "Reviews I've Written"?></h3>
        <?php
        if($reviews_rs->num_rows > 0){
          do{
            ?>
            <div class="myExpeditions">
              <h4><?=$row['CityName'].", ".$row['CountryName']?></h4>
              <h4><?=$row['ReviewHeadline']?></h4> 
              <p>Review added on <?=$row['DateAdded']?></p>
              <p>Review Text: <?=$row['Review']?></p>
              <p>Rating: <?=$row['rating']?>/5</p>
            </div>
            <?php
          } while($row = $reviews_rs->fetch_array(MYSQLI_ASSOC));
        }else{echo "<h4>You have not added any reviews</h4>";}
          ?>
        <div class="container" id="submit">
          <button type="submit" onclick="addReview();">Add Review</button>
        </div>    
      </div>
    <?php
  }

  public function AddReview(){
    ?>
    <div class="add-review">
      <form id="add-review" action="includes/addreview.php" method="post">
        <div class="form-group">
          <label for="expeditionCountry">Select a Country:</label>
          <select class="form-control" id="expeditionCountry" name="country" onchange="showExpeditions(this.value);">
            <option>Select an option</option>
            <?php
              $cs_sql = "SELECT DISTINCT city.Country, country.CountryName FROM city LEFT JOIN country ON country.Country_ID = city.Country";
              $cs_query = $this->db->query($cs_sql);
              $cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC);
              
              do{
                ?>
                  <option value="<?=$cs_rs['Country']?>"><?=$cs_rs['CountryName']?></option>
                <?php
              }while($cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC));
            ?>
          </select>
        </div>
        <div class="form-group expedition-selector">
          <label for="expedition">Select an Expedition:</label>
          <select name="expedition" class="form-control" id="expedition">
            <option>Select an option</option>
            <?php
              $cs_sql = "SELECT DISTINCT city.City_ID, city.CityName FROM city";
              $cs_query = $this->db->query($cs_sql);
              $cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC);
              
              do{
                ?>
                  <option value="<?=$cs_rs['City_ID']?>"><?=$cs_rs['CityName']?></option>
                <?php
              }while($cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC));
            ?>
          </select>
        </div>
        <label for="reviewHeadline">Review Headline: </label>
        <input class="form-control" type="text" name="reviewHeadline" id="reviewHeadline" />
        <br />
        <label for="reviewText">Write your review:</label>
        <textarea id="reviewText" name="reviewText" class="form-control"></textarea>
        <br />
        <div class="rating-label">How would you rate this trip?</div>
        <div class="rating">
          <input type="radio" name="rating" value="5" id="rating-5">
          <label for="rating-5"></label>
          <input type="radio" name="rating" value="4" id="rating-4">
          <label for="rating-4"></label>
          <input type="radio" name="rating" value="3" id="rating-3">
          <label for="rating-3"></label>
          <input type="radio" name="rating" value="2" id="rating-2">
          <label for="rating-2"></label>
          <input type="radio" name="rating" value="1" id="rating-1">
          <label for="rating-1"></label> 
        </div>
        <input type="date" id="date-reviewed" name="date-reviewed" value="<?=date("Y/m/d");?>" hidden />
        <br />
        <div class="container" id="submit" >
          <button type="submit" name="addreview" value="addreview">Add Review</button>
        </div>
        <div class="container" id="cancel">
          <div onclick="closeForm('add-review')">Cancel</div>
        </div>
      </form>
    </div>
  <?php
  }

  public function DisplayWanderlust(){
    $userID = $_SESSION['userID'];
    $saved_sql = "SELECT DISTINCT savedlist.User_ID, savedlist.DateAdded, location.LocationName, expedition.ExpeditionName, city.CityName, city.City_ID, country.CountryName
    FROM savedlist
    LEFT JOIN (expedition, location, city, country, users)
    ON (users.User_ID = savedlist.User_ID
    AND expedition.Expedition_ID = savedlist.Expedition_ID
    AND location.Location_ID = expedition.Location_ID
    AND city.City_ID = location.City_ID
    AND country.Country_ID = city.Country)
    WHERE savedlist.User_ID = '$userID'";
    $saved_rs = $this->db->query($saved_sql);
    $row=$saved_rs->fetch_array(MYSQLI_ASSOC);
    $num_rows = $saved_rs->num_rows;
    ?>
      <!-- WanderlustSection --> 
      <div class="wanderlust-panel">
        <h3><?php echo "Destinations to Visit"?></h3>
        <?php
        if($num_rows>0){
          do{
            ?>
            <div class="wanderlust">
              <h4><?=$row['CityName'].", ".$row['CountryName']?></h4>
              <h5><?=$row['ExpeditionName']." at ".$row['LocationName']?></h4> 
              <p>Added on <?=$row['DateAdded']?></p>
              <p><a href="./adventure?pid=<?=$row['City_ID']?>">More Information</a></p>
            </div>
            <?php
          } while($row = $saved_rs->fetch_array(MYSQLI_ASSOC));
        }else{echo "<h4>You have no places saved currently</h4>";}
          ?>
        <div class="container" id="submit">
          <button type="submit" onclick="addJourney()">Add Destination</button>
        </div>  
      </div>
    <?php
  }

  public function AddJourney(){
    ?>
    <div class="add-journey">
    <form id="add-journey" action="includes/addjourney.php" method="post">
      <div class="form-group">
        <label for="journeyCountry">Select a Country:</label>
        <select class="form-control" id="journeyCountry" name="expedition">
          <option>Select an option</option>
          <?php
              $es_sql = "SELECT DISTINCT ExpeditionName, Expedition_ID, Location_ID FROM expedition";
              $es_query = $this->db->query($es_sql);
              $es_rs=$es_query->fetch_array(MYSQLI_ASSOC);
              
              do{
                ?>
                  <option value="<?=$es_rs['Expedition_ID']?>"><?=$es_rs['ExpeditionName']?></option>
                <?php
              }while($es_rs=$es_query->fetch_array(MYSQLI_ASSOC));
            ?>
        </select>
      </div>
      <div class="container" id="submit">
        <button type="submit">Add Destination</button>
      </div>
      <div class="container" id="cancel">
        <div onclick="closeForm('add-journey')">Cancel</div>
      </div>
    </form>
  </div>
  <?php
  }
}

$account = new MyAccountPage();

$account->content ="";

$account -> Display(6);
}
