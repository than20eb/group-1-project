<?php

// Check for a defined constant or specific file inclusion
if (!defined('MY_APP') && basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('This file cannot be accessed directly.');
}

class WeatherFetcher
{

    // Fetches weather data and returns HTML output 
    function fetchWeather()
    {
        // Get city from input field in weather.php
        // Ideally this conditional rendering should not be here but in the presentation layer. This caused the problem to access the $base_url for file_get_contents which couldn't be resolved be requiring the source file.
        // The base_url APIkey should be located and hid in confiq.php, similar to the JWT secret for publish reasons (on  Github).
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

        // Construct the URL for the API request using the base URL
        // $url = $this->base_url;
        // var_dump($url);
        // Fetch the data from the API using the constructed URL
        $data = file_get_contents($base_url);

        // Decode the JSON data
        $weather = json_decode($data, true);

        // Return the HTML to the caller
        return $weather;
    }
}
