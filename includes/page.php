<?php

class Page{
    public $content;
    public $title = "Wanderlust Outpost";
    public $buttons = ["Home" => "index.php",
                       "Blog" => "blog.php",
                       "Expeditions" => "expeditions.php"
                      ];
    
    public function __set($name, $value){
      $this->$name = $value;
    }

    public function Display($pageID){
      $this -> DisplayHead(); // includes all meta information including site title and page names
      $this -> DisplayBody();
      $this -> DisplayHeader($this->buttons); //includes display menu
      $this -> SetPageInfo($pageID);
      echo $this->content;
      $this -> DisplayFooter();
    }

    public function DisplayHead(){
      ?>
        <!DOCTYPE html>
          <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
          <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
          <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
          <!--[if gt IE 8]><!--> <html> <!--<![endif]-->
      <?php
        echo "<head>";
        $this -> DisplayMeta();
        $this -> DisplayTitle();
        $this -> DisplayStyles();
        $this -> DisplayScripts();
        echo "</head>";
    }
    
    public function DisplayMeta(){
      ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php
    }

    public function DisplayTitle(){
      echo "<title>".$this->title."</title>";
    }

    public function DisplayStyles(){
      ?>
        <!-- import bootstrap CSS library -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- import local styles-->
        <link rel="stylesheet/less" type="text/css" href="less/styles.less" />
      <?php
    }

    public function DisplayScripts(){
      ?>
       <!--import popper js library -->
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <!-- import jquery library -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <!-- import bootstrap js library -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- import less js library -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" crossorigin="anonymous"></script>
        <!-- import site scripts -->
      <?php
    }

    public function DisplayBody(){
      ?>
        <body>
          <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
      <?php
    }

    public function DisplayHeader($buttons){
      $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");
      $nav_sql = "SELECT * FROM sitemap WHERE NavItem = 1";
      $nav_query = $db->query($nav_sql);
      $nav_rs=$nav_query->fetch_array(MYSQLI_ASSOC);
      ?>
      
      <header>
        <h1><?php echo $this->title; ?></h1>
        <!-- mobile menu -->
          <div class="open">
            <span class="cls"></span>
              <span>
                <ul class="sub-menu">
                  <?php
                    do{
                      $this->DisplayButton($nav_rs['PageName'], $nav_rs['pageID'], $nav_rs['url']);
                    } while($nav_rs=$nav_query->fetch_array(MYSQLI_ASSOC));
                    ?>
                </ul>
              </span>
            <span class="cls"></span>
          </div> 
        <!-- end mobile menu -->
      </header>
      <?php
    }

    public function DisplayButton($name, $pageID, $url){
      if (empty($_SESSION['LoggedIn'])){
        $loggedIn=false;
      }else {
        $loggedIn = $_SESSION['LoggedIn'];
      }

      if ( $pageID == 1 || $pageID == 2 || $pageID == 3 ){
        ?>
        <li>
          <a href="./<?=$url?>.php" title="<?=$name ?>"><?=$name?></a>
        </li>
      <?php
      }

      if ($pageID == 4){
        if ($loggedIn){
          return;
        }else{
          ?>
          <li>
            <a href="./<?=$url?>.php" title="<?=$name ?>"><?=$name?></a>
          </li>
        <?php
        }
      }

      if ( $pageID == 5){
        return;
      }

      if ( $pageID == 6 ){
        if ($loggedIn){
          ?>
            <li>
              <a href="./<?=$url?>.php" title="<?=$name ?>"><?=$name?></a>
            </li>
            <li>
              <a href="./logout.php" title="Log Out">Log Out</a>
            </li>
          <?php
        }else{return;}
      }
    }

    public function SetPageInfo($pageID){

      $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");
      $query = "SELECT PageTitle, BGImg, BGImgAlt FROM sitemap where pageID = ?";
      $stmt = $db->prepare($query);
      $stmt->bind_param('i', $pageID);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($PageTitle, $BGImg, $BGImgAlt);

      switch ($pageID){
        case 1:
          while($stmt->fetch()){
            ?><div class="bg-img">
                <img src="img/<?=$BGImg?>" alt="<?=$BGImgAlt?>" />
              </div>

              <section class='page-title'>
                <h2><?=$PageTitle?></h2>
              </section>
            <?php
          }
          break;
        
        case ($pageID == 2 || $pageID == 3 ):
          while($stmt->fetch()){
            ?>
              <div class="account-img">
                <img src="img/<?=$BGImg?>" alt="<?=$BGImgAlt?>" />
              </div>
          
              <section class="page-title">
                <h2><?=$PageTitle?></h2>
              </section>
            <?php
          }
        break;

        case ($pageID = 4 || $pageID = 5):
          while($stmt->fetch()){
            ?>
              <section class="page-title">
                <h2><?=$PageTitle?></h2>
              </section>

              <div class="content-panel">
                <div class="panel-img">
                <!-- just pic for reference  -->
                  <img src="img/<?=$BGImg?>" alt="<?=$BGImgAlt?>" />
                </div>
            <?php
          }
        break;
      }
    }

    public function DisplayFooter(){
      if (isset($credits)){
        echo "<footer>";
        echo $credits;
        echo "</footer>";
      }
      ?>
        <script src="scripts/mm.js" async defer></script>
        <script src="scripts/validate.js" async defer></script>
        <script src="scripts/display.js" async defer></script>
        </body>
      </html>
    <?php
    }
  }