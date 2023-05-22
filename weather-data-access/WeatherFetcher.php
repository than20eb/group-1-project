<?php

// Check for a defined constant or specific file inclusion
if (!defined('MY_APP') && basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('This file cannot be accessed directly.');
}

// class WeatherFetcher {
//     private $base_url = "https://api.weatherbit.io/v2.0/current?lat=35.7796&lon=-78.6382&key=c4480acb63424d30b57b0b1bac996f53&include=minutely";
    
//     // Fetches all available currencies from the API
//     function fetchWeather(){
//         // Construct the URL for the API request using the base URL
//         $url = $this->base_url . "weather.json";
      
//         // Fetch the data from the API using the constructed URL
//         $data = file_get_contents($url);

      
//         // Decode the JSON data
//         $weather = json_decode($data, true);
      
//         // Return the weather to the caller
//         return $weather;
//     }}


    class WeatherFetcher {
        private $base_url = "https://api.weatherbit.io/v2.0/current?lat=35.7796&lon=-78.6382&key=c4480acb63424d30b57b0b1bac996f53&include=minutely";
        
        // Fetches weather data and returns HTML output
        function fetchWeather() {
            // Construct the URL for the API request using the base URL
            $url = $this->base_url;
          
            // Fetch the data from the API using the constructed URL
            $data = file_get_contents($url);
    
            // Decode the JSON data
            $weather = json_decode($data, true);
    
            // // Generate HTML output
            // $html = "<h1>Weather Information</h1>";
            // $html .= "<p>Location: " . $weather['data'][0]['city_name'] . "</p>";
            // $html .= "<p>Temperature: " . $weather['data'][0]['temp'] . " &#8451;</p>";
            // $html .= "<p>Weather Description: " . $weather['data'][0]['weather']['description'] . "</p>";
    
            // Return the HTML to the caller
            return $weather;
        }
    }