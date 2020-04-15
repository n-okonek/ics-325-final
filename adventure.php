<?php
require("includes/page.php");

class AdventurePage extends Page{


  public $reviews = [["headline1", "Content", "user"],
              ["headline2", "Content", "user"],
              ["headline3", "Content", "user"]
            ]; //this array will be replaced with a sql query that creates a table of reviews for the location being viewed

  public function Display($pageID){
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    $this->  DisplayContent();
    $this->ReviewGen($this->reviews);
    $this -> DisplayFooter();
  }

  public function ReviewGen($reviews){
    ?><section class='reviews'>
    <h3>User Reviews</h3>
    
    <?php
    for ($a=0; $a < count($reviews); $a++ ) {
      echo "<div class='top-review'>
        <div class='review-content'>
          <h4>".$reviews[$a][0]."</h4>
          <p>".$reviews[$a][1]."</p>
        </div>
      </div>";
      }
      ?></section>
    <?php
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