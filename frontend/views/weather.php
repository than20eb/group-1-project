<?php
require_once __DIR__ . "/../Template.php";
// require_once __DIR__ . "/../../weather-data-access/WeatherFetcher.php";

Template::header("Your Weather"); 

    var_dump($this->model);

Template::footer(); ?>


<!DOCTYPE html>
<html>
<head>
  <title>Weather App</title>
</head>
<body>
  <div class="container">
    <h1>Weather Information</h1>
    <div class="weather-info">
        <p>LOCATION <?=$this->model["weather"]["data"][0]["city_name"]?></p>
        <p>Temperature <?=$this->model["weather"]["data"][0]["temp"]?></p>
        <p>Weather Description <?=$this->model["weather"]["data"][0]["weather"] ["description"]?></p>
    <?php 
            // <p> Location: " . $weather['data'][0]['city_name'] . "</p>";
            // $html .= "<p>Temperature: " . $weather['data'][0]['temp'] . " &#8451;</p>";
            // $html .= "<p>Weather Description: " . $weather['data'][0]['weather']['description'] . "</p>";
    ?>
    </div>
  </div>

</body>
</html>
