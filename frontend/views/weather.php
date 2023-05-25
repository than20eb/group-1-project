<?php
require_once __DIR__ . "/../Template.php";
Template::header("Your Weather"); ?>


<form method="POST">
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

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $city = $_POST["city"];
            var_dump($city);
        }
        ?>