<?php
  class Body {
    //This class builds everything in the body tag

    public $content;
    public $nav = [
      "Home" => [
        "url" =>"index.php",
        "title" => "Buy the ticket, take the ride",
        "keywords" => ""
      ],
      "Blog" => [
        "url" => "blog.php",
        "title" => "Buy the ticket, take the ride",
        "keywords" => ""
      ],
      "Expeditions" => [
        "url" => "expeditions.php", 
        "title" => "Buy the ticket, take the ride",
        "keywords" => ""
      ],
      "Login" => [
        "url" => "login.php",
        "title" => "Buy the ticket, take the ride",
        "keywords" => ""
      ],
    ];

    public $nav2 = [ // will need to be reworked for users once logged in
      "Home" => "index.php", 
      "Blog" => "blog.php", 
      "Expeditions" => "expeditions.php", 
      "Login" => "login.php"
    ];

    public function bodyBuilder(){
      echo "<body>";
      // next 3 lines just ask users to upgrade their browser... we do not support less than IE7
      echo "<!--[if lt IE 7]>";
      echo "<p class='browsehappy'>You are using an <strong>outdated</strong> browser. Please <a href='#'>upgrade your browser</a> to improve your experience.</p>";
      echo "<![endif]-->";
      $this -> displayHeader();
      $this -> displayNav($nav, $nav2);
      echo $this->content;
      $this -> displayFooter();
      addAsyncScripts();
      echo "</body>\n</html>";
    }

    public function displayHeader(){
      ?>
      <!-- page header -->
      <header>
        <h1><?php echo $siteName ?></h1>
      <?php
        displayNav();
      ?>
      </header>
      <?php
    }

    public function displayNav($nav, $nav2){
      // build nav function
      //if not logged in use $nav
      //if logged in use $nav2
    }

    public function displayFooter(){
      ?>
      <footer>
        <p>&copy; 2020 Wanderlust Outpost</p>
      </footer>
      <?php
    }
  }
?>