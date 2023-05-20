<?php

// Check for a defined constant or specific file inclusion
if (!defined('MY_APP') && basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('This file cannot be accessed directly.');
}

class WeatherFetcher {
    private $base_url = "https://api.weatherbit.io/v2.0/current?lat=35.7796&lon=-78.6382&key=c4480acb63424d30b57b0b1bac996f53&include=minutely";
    
    // Fetches all available currencies from the API
    function fetchWeather(){
        // Construct the URL for the API request using the base URL
        $url = $this->base_url . "weather.json";
        // var_dump($url);
      
        // Fetch the data from the API using the constructed URL
        $data = file_get_contents($url);
        // var_dump($data);

      
        // Decode the JSON data
        // The "true" argument to json_decode returns an associative array instead of an object
        $weather = json_decode($data, true);
      
        // Return the weather to the caller
        return $weather;
    }}