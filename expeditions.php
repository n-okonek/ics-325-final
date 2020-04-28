<?php
require("includes/page.php");

class MapPage extends Page{
  public $credits = "Original map image and Sass Code by <a href='https://codepen.io/mirichan/pen/jEBmyG' target='_blank'>Michael Mroz</a>. Refactored to Less and PHP by Nick Okonek.";

  public function Display($pageID){
    session_start();
    $this -> DisplayHead(); // includes all meta information including site title and page names
    $this -> DisplayBody();
    $this -> DisplayHeader($this->buttons); //includes display menu
    $this -> SetPageInfo($pageID);
    $this -> DisplayMap();
    echo $this->content;
    $this -> DisplayFooter();
  }

  public function DisplayMap(){
    $map = file_get_contents('img/map.php');

    ?>
    <section class='map'>
      <div class='distribution-map'><?=$map?>
      <? $this->displayMapPoints() ?>
      </div>
      </section>
    <?php
  }

  public function displayMapPoints(){
    $db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', "glazpmck_ics325");
    $query = "Select city.City_ID, city.CityName, city.Country, country.CountryName, city.CityDescription, city.map_x, city.map_y
    from city
    Inner join country ON city.Country=country.Country_ID;";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($City_ID, $City, $countryID, $Country, $description, $x, $y);
    
    if ($stmt->num_rows > 0){
      while ($stmt->fetch()){
          ?>
            <button class="map-point" style="top:<?=$x?>%;left:<?=$y?>%">
              <div class='content'>
                <div class='centered-y'>
                  <h3><a href="./adventure.php?pid=<?=$City_ID?>"><?=$City.", ".$Country?></a></h3>
                  <p><?=$description?></p>
                </div>
              </div>
            </button>
          <?php
      }
    }
  
    $stmt ->free_result();
    $db->close();
  }

}
$mappage = new MapPage();

$mappage->content ="";

$mappage->Display(3);
?>
