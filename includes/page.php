<?php

  class Page{
    public $content;
    public $title = "Wanderlust Outpost";
    public $buttons = ["Home" => "index.php",
                       "Blog" => "blog.php",
                       "Expeditions" => "expeditions.php",
                       "Login" => "login.php",
                       "My Account" => "myaccount.php"];
    
    public function __set($name, $value){
      $this->$name = $value;
    }

    public function Display(){
      $this -> DisplayHead(); // includes all meta information including site title and page names
      $this -> DisplayBody();
      $this -> DisplayHeader(); //includes display menu
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

    public function DisplayHeader(){
      ?>
      <header>
        <h1><?php echo $this->title; ?></h1>
        <!-- mobile menu -->
          <div class="open">
            <span class="cls"></span>
              <span>
                <ul class="sub-menu">
                  <li>
                    <a href="./index.php" title="Home">Home</a>
                  </li>
                  <li>
                    <a href="./blog.php" title="Blog">Blog</a>
                  </li>
                  <li>
                    <a href="./expeditions.php" title="Expeditions">Expeditions</a>
                  </li>
                  <li>
                    <a href="./login.php" title="Log In">Log In</a>
                  </li>
                </ul>
              </span>
            <span class="cls"></span>
          </div> 
        <!-- end mobile menu -->
      </header>
      <?php
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
        </body>
      </html>
    <?php
    }
  }