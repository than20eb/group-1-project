<?php
require_once __DIR__ . "/../Template.php";
Template::header("Your Weather"); ?>

  <div class="container">
    <h1>Weather Information</h1>
    <div class="weather-info">
        <p>LOCATION <?=$this->model["weather"]["data"][0]["city_name"]?></p>
        <p>Temperature <?=$this->model["weather"]["data"][0]["temp"]?></p>
        <p>Weather Description <?=$this->model["weather"]["data"][0]["weather"] ["description"]?></p>
    <?php 
           
    ?>
    </div>
  </div>
  <?php Template::footer(); ?>