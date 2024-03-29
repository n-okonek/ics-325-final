<?php
require("includes/page.php");

class AdventurePage extends Page{

  public function Display($pageID){
    session_start();
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    $this->  DisplayContent();
    $this->ReviewGen();
    $this -> DisplayFooter();
  }

  public function ReviewGen(){
    $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");
      
    if ($db -> connect_errno) {
      echo "Failed to connect to MySQL: " . $db -> connect_error;
      exit();
    }
    
    $id = $db->real_escape_string($_GET['pid']);
    $query = "SELECT reviewlist.ReviewID, reviewlist.ReviewHeadline, reviewlist.Review, reviewlist.User_ID, users.FName, reviewlist.City, reviewlist.Rating 
    FROM reviewlist
    INNER JOIN users ON reviewlist.User_ID = users.User_ID
    INNER JOIN sitemap ON reviewlist.City = sitemap.pageID
    WHERE reviewlist.city = '$id'";
    $result = $db->query($query);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $num_rows=$result->num_rows;
    ?>
    
    <section class='reviews'>
    <h3>User Reviews</h3>
    
    <?php
    
    if ($num_rows > 0){
      do{
        ?>
        <div class='top-review'>
          <div class='review-content'>
            <h4><?=$row['ReviewHeadline']?><br /><?
            //convert numeric rating to stars
              for ($x=1; $x<=5; $x++){
              if ($x < $row['Rating']){
                ?>
                <span class="fa fa-star"></span>
                <?
            }else{
              ?>
              <span class="fa fa-star-o"></span>
              <?}
          }
          ?>
          </h4> 
            <p><?=$row['Review']?></p><p>- <?=$row['FName']?></p>
          </div>
        </div>
        <?php
      }while($row=$result->fetch_array(MYSQLI_ASSOC));
    }else{
      ?>
        <div class='top-review'>
          <div class='review-content'>
            <h4>No reviews yet!</h4>
          </div>
        </div>
      <?php
    }

    echo "</section>";
  }

  public function DisplayContent(){
    if (isset($_GET['pid'])){
      $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");
      
      if ($db -> connect_errno) {
        echo "Failed to connect to MySQL: " . $db -> connect_error;
        exit();
      }
    
      $id = $db->real_escape_string($_GET['pid']);
      $query = "Select * From sitemap where pageID = '$id'";
      $result = $db->query($query);
      $row=$result->fetch_array(MYSQLI_ASSOC);
    
      ?>
      <section class="page-title">
        <h2><?= $row['PageTitle'] ?></h2>
      </section>
    
      <div class="exp-img">
        <img src="img/<?=$row['BGImg']?>" alt="<?=$row['BGImgAlt']?>" />
      </div>
    
      <section class="main-content">
        <?= $row['Content']?>
      </section>
      <?php
    }
  }
}

$adventure = new AdventurePage();

$adventure->Display($_GET['pid']);

?>