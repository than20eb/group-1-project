<?php
require_once __DIR__ . "/../Template.php";

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
    <?php 
    // PHP code to fetch and display weather data
    $json_data = file_get_contents($weather_data);
    $weather_data = json_decode($json_data, true);

    echo "<p>Temperature: " . $weather_data['main']['temp'] . "°C</p>";
    echo "<p>Description: " . $weather_data['weather'][0]['description'] . "</p>";
    ?>
    </div>
  </div>

</body>
</html>
