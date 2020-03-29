<?php 
  require 'includes/head.php';
  require 'includes/body.php';
  require 'includes/header.php';

  $PageTitle = "Choose Your Expedition";
?>

<section class="page-title">
  <h2><?php echo $PageTitle ?></h2>
</section>

<section class="map">
  <div class="distribution-map">
    <?php include "img/map.php"; ?>
    <!-- buttons will need to be dynamically generated with php -->
    <button class="map-point" style="top:15%;left:35%">
      <div class="content">
        <div class="centered-y">
        <h3><a href="./kangerlussuaq.php">Kangerlussuaq, Greenland</a></h3>
          <p>Some people enjoy a destination where safety and history meet.  Want to hike to see one of the worlds most beautiful glaciers? Kangerlussuaq is the place for you!</p>
          <hr />
          <h3><a href="./qeqertarsuatsiaat.php">Qeqertarsuatsiaat, Greenland</a></h3>
          <p>If you like a small-town getaway feel with treasure hunts and whales, then this is the location for you!</p>
        </div>
      </div>
    </button>
    <button class="map-point" style="top:35%;left:50%">
      <div class="content">
        <div class="centered-y">
          <h3><a href="./bad-kissingen.php">Bad Kissingen, Germany</a></h3>
          <p>I know what you may be thinking… does the name of this region really speak for the millions of kissers that live there?</p>
          <hr />
          <h3><a href="./berlin.php">Berlin, Germany</a></h3>
          <p>I know what you may be thinking… does the name of this region really speak for the millions of kissers that live there?</p>
        </div>
      </div>
    </button>
    <button class="map-point" style="top:76%;left:82.5%">
      <div class="content">
        <div class="centered-y">
          <h3>{Location}</h3>
          <p>{Short location description}</p>
          <!-- if more than one expedition
          <hr />
          -->
        </div>
      </div>
    </button>
    <button class="map-point" style="top:45%;left:16%">
      <div class="content">
        <div class="centered-y">
          <h3>{Location}</h3>
          <p>{Short location description}</p>
          <!-- if more than one expedition
          <hr />
          -->
        </div>
      </div>
    </button>
    <button class="map-point" style="top:60%;left:53%">
      <div class="content">
        <div class="centered-y">
          <h3>{Location}</h3>
          <p>{Short location description}</p>
          <!-- if more than one expedition
          <hr />
          -->
        </div>
      </div>
    </button>
    <button class="map-point" style="top:25%;left:70%">
      <div class="content">
        <div class="centered-y">
          <h3>{Location}</h3>
          <p>{Short location description}</p>
          <!-- if more than one expedition
          <hr />
          -->
        </div>
      </div>
    </button>
  </div>
</section>

<?php $credits = "Original map image and Sass Code by <a href='https://codepen.io/mirichan/pen/jEBmyG' target='_blank'>Michael Mroz</a>. Refactored to Less and PHP by Nick Okonek."; ?>

<?php require 'includes/footer.php'; ?>