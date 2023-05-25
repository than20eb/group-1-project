<?php
require_once __DIR__ . "/../Template.php";
Template::header("Your Weather"); ?>


<form action="weather.php" method="POST">
  <input type="text" name="city" placeholder="Enter a city">
  <button type="submit">Weather for here</button>
</form>

<div class="container">
  <h1>Weather Information</h1>
  <div class="weather-info">
    <p>📍User Location: <?= $this->model["weather"] ?></p>
    <?php

    ?>
  </div>
</div>
<?php Template::footer(); ?>