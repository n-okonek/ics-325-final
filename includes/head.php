<?php
  class PageHead  {
    public $content;
    public $siteName = "Wanderlust Outpost";
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

    public $nav2 = [ // will need to be reworked for 
      "Home" => "index.php", 
      "Blog" => "blog.php", 
      "Expeditions" => "expeditions.php", 
      "Login" => "login.php"
    ];

    public function __set($name, $value){
      $this->$name = $value;
    }

    public function Display(){
      echo "<!DOCTYPE html>";
      echo "<!--[if lt IE 7]>      <html class='no-js lt-ie9 lt-ie8 lt-ie7'> <![endif]-->";
      echo "<!--[if IE 7]>         <html class='no-js lt-ie9 lt-ie8'> <![endif]-->";
      echo "<!--[if IE 8]>         <html class='no-js lt-ie9'> <![endif]-->";
      echo "<!--[if gt IE 8]><!--> <html class='no-js'> <!--<![endif]-->";
      echo "<head>";
      DisplayTitle();
      DisplayKeywords();
      DisplayMeta();
      DisplayStyles();
      echo "</head>";
    }

    public function DisplayTitle(){
      echo "<title>".$this->siteName." | ".$this->pageName."</title>";
    }

    public function DisplayKeywords(){
      echo "<meta name='keywords' content='".$this->keywords."' />";
    }

    public function DisplayMeta(){
      echo "<meta charset='utf-8'>";
      echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
      echo "<meta name='description' content='".$this->description."' >";
      echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
    }

    public function DisplayStyles(){
      //something needs to be replaced with function for inserting multiple styles
      echo "<link href='".something."' rel='stylesheet' />";
    }
  }
?>