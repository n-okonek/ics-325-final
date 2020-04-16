<?php
require("includes/page.php");

class AdventurePage extends Page{

  public function Display($pageID){
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
    $query = "SELECT reviewlist.ReviewHeadline, reviewlist.Review, reviewlist.User_ID, users.fname, reviewlist.city, reviewlist.rating 
    FROM reviewlist
    INNER JOIN users ON reviewlist.user_id = users.user_ID
    INNER JOIN sitemap ON reviewlist.City = sitemap.pageID
    WHERE reviewlist.city = '$id'";
    $result = $db->query($query);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    ?>
    
    <section class='reviews'>
    <h3>User Reviews</h3>
    
    <?php
    
    echo "<section class='top-reviews'>";

    while ($row){
      ?>
      <div class='top-review'>
        <div class='review-content'>
          <h3><?=$headline?> - <?=$rating?>/5</h3> 
          <p><?= $city.", ".$country?><br /><?=$review?></p><p>- <?=$name?></p>
        </div>
      </div>
      <?php
    }

    echo "</section>";

  $stmt->free_result();
  $db->close();
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