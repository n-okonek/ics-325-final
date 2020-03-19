<?php
  class Head  {
    //this class builds everything from <html> to </head> tags, also includes styles and scripts that need to be loaded in head.
    public $siteName = "Wanderlust Outpost";

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
      $this -> displayTitle();
      $this -> displayKeywords();
      $this -> displayMeta();
      $this -> displayStyles();
      $this -> addScripts();
      echo "</head>";
    }

    public function displayTitle(){
      echo "<title>".$this->siteName." | ".$this->pageName."</title>";
    }

    public function displayKeywords(){
      echo "<meta name='keywords' content='".$this->keywords."' />";
    }

    public function displayMeta(){
      echo "<meta charset='utf-8'>";
      echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
      echo "<meta name='description' content='".$this->description."' >";
      echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
    }

    public function displayStyles(){
      //something needs to be replaced with function for inserting multiple styles
      echo "<link href='".something."' rel='stylesheet' />";
    }

    public function addScripts(){
      //build script generator;
    }
  }
?>