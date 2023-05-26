<?php

// Get city from input field in weather.php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve the city value from the form
  $city = $_POST["city"];
  //var_dump($city);
  $base_url = "https://api.weatherbit.io/v2.0/current?&city=".$city."&key=70fa35412ab94bae9af9274a9c2e3baf&include=minutely";
} else {
  $user = $_SESSION["user"];
  $user_location = $user->location;
  $base_url = "https://api.weatherbit.io/v2.0/current?&city=".$user_location."&key=70fa35412ab94bae9af9274a9c2e3baf&include=minutely";
}

require_once __DIR__ . "/../Template.php";
Template::header("Your Weather"); ?>


<form action="weather" method="POST">
  <input type="text" name="city" placeholder="Enter a city">
  <button type="submit">Weather for here</button>
</form>

<div class="container">
  <h1>Weather Information</h1>
  <div class="weather-info">
  <p>📍User Location: <?= $this->model["weather"]["data"][0]["city_name"] ?></p>
    <p>❄️Temperature: <?= $this->model["weather"]["data"][0]["temp"] ?></p>
    <p>🌬️Wind Direction: <?= $this->model["weather"]["data"][0]["wind_cdir_full"] ?></p>
    <p>🌪️Weather Speed: <?= $this->model["weather"]["data"][0]["wind_spd"] ?></p>
    <p>🔭Weather Description: <?= $this->model["weather"]["data"][0]["weather"]["description"] ?></p>
    <?php

    ?>
  </div>
</div>
<?php Template::footer(); ?>