<?php

// Check for a defined constant or specific file inclusion
if (!defined('MY_APP') && basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('This file cannot be accessed directly.');
}

    class WeatherFetcher {

        // Fetches weather data and returns HTML output 
        function fetchWeather() {
            return "he";
             // Get city from input field in weather.php
             if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve the city value from the form
            $city = $_POST["city"];
            var_dump($city);

            $base_url = "https://api.weatherbit.io/v2.0/current?&city=Berlin&key=c4480acb63424d30b57b0b1bac996f53&include=minutely";
         }
             else {
                $base_url = "https://api.weatherbit.io/v2.0/current?&city=Berlin&key=c4480acb63424d30b57b0b1bac996f53&include=minutely";
                
             }
             return $base_url;
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
