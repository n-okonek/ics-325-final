<?php
session_start();

if (empty($_SESSION['LoggedIn'])){
  $_SESSION["errorMessage"] = "We were not able to identify your account, please log in.";
  header("Location: ./login.php");
}

else{
require("includes/page.php");

Class MyAccountPage extends Page{
  public $countries = [["US", "United States"],
                       ["UM", "United States Minor Outlying Islands"]
  ];
  public $CoE = ["AU",
                 "DE",
                 "GL",
                 "CF",
                 "US",
                 "RU"];
  public $expedition = ["ALICES",
                        "BADKIS",
                        "BERLIN",
                        "KANGER",
                        "KAZUMB",
                        "LOSANG",
                        "MWANZA",
                        "QEQERT",
                        "SAMBUR",
                        "SANDIE",
                        "SNEZHN",
                        "YULARA"];

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
    $this -> AddReview($this->CoE, $this->expedition);
    $this -> AddJourney($this->CoE, $this->expedition);
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
          do {
            echo "<option value='".$cs_rs['Country_ID']."'>".$cs_rs['CountryName']."</option>";
          } while($cs_rs=$cs_query->fetch_array(MYSQLI_ASSOC));
          $this->db->close();
        ?>
      </select>
      </br>
    </div>
    <div class="container" id="submit">
      <button type="submit" value="update" name="update">Update Profile</button>
    </div>
    <div class="container" id="cancel">
      <div onclick="$('.update-user').fadeOut();">Cancel</div>
    </div>
  </form>
  </div>
  <?php
  }

  public function DisplayExpeditions(){
    $userID = $_SESSION['userID'];
    $reviews_sql = "SELECT reviewlist.User_ID, reviewlist.rating, reviewlist.Review, reviewlist.ReviewHeadline, reviewlist.DateAdded, city.CityName, country.CountryName 
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
          ?>
        <div class="container" id="submit">
          <button type="submit" onclick="addReview();">Add Review</button>
        </div>    
      </div>
    <?php
  }

  public function AddReview($CoE, $expedition){
    ?>
    <div class="add-review">
      <form id="add-review" action="includes/addreview.php" method="post">
        <div class="form-group">
          <label for="expeditionCountry">Select a Country:</label>
          <select class="form-control" id="expeditionCountry" name="country" onchange="showExpeditions(this.value);">
            <option>Select an option</option>
            <? for($c=0; $c<count($CoE); $c++){
                echo "<option value='".$CoE[$c]."'>".$CoE[$c]."</option>";
            }?>
          </select>
        </div>
        <div class="form-group expedition-selector">
          <label for="expedition">Select an Expedition:</label>
          <select name="expedition" class="form-control" id="expedition">
            <option>Select an option</option>
            <? for($e=0; $e<count($expedition); $e++){
                echo "<option value='".$expedition[$e]."'>".$expedition[$e]."</option>";
            }?>
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
          <button type="submit" name="addreview" value="addreview">Update Profile</button>
        </div>
        <div class="container" id="cancel">
          <div onclick="$('.add-review').fadeOut();">Cancel</div>
        </div>
      </form>
    </div>
  <?php
  }

  public function DisplayWanderlust(){
    $userID = $_SESSION['userID'];
    $saved_sql = "SELECT DISTINCT savedlist.User_ID, savedlist.DateAdded, location.LocationName, expedition.ExpeditionName, city.CityName, country.CountryName
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
              <!--<a href="#">figure out how to link to city page</a> -->
            </div>
            <?php
          } while($row = $saved_rs->fetch_array(MYSQLI_ASSOC));
        }else{echo "<h4>You have no places saved currently</h4>";}
          ?>
        <div class="container" id="submit">
          <button type="submit" onclick="addJourney()">Add Journey</button>
        </div>  
      </div>
    <?php
  }

  public function AddJourney($CoE, $expedition){
    ?>
    <div class="add-journey">
    <form id="add-journey" action="addjourney.php" method="post">
      <div class="form-group">
        <label for="journeyCountry">Select a Country:</label>
        <select class="form-control" id="journeyCountry" onchange="showExpeditions(this.value);">
          <option>Select an option</option>
          <? for($c=0; $c<count($CoE); $c++){
              echo "<option value='".$CoE[$c]."'>".$CoE[$c]."</option>";
          }?>
        </select>
      </div>
      <div class="form-group expedition-selector">
        <label for="journeyExpedition">Select an Expedition:</label>
        <select class="form-control" id="journeyExpedition">
          <option>Select an option</option>
          <? for($e=0; $e<count($expedition); $e++){
              echo "<option value='".$expedition[$e]."'>".$expedition[$e]."</option>";
          }?>
        </select>
      </div>
      <input type="date" id="date-added" name="date-added" value="<?=date("Y/m/d");?>" hidden />
      <div class="container" id="submit">
        <button type="submit">Update Profile</button>
      </div>
      <div class="container" id="cancel">
        <div onclick="$('.add-journey').fadeOut();">Cancel</div>
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
