<?php

// Check for a defined constant or specific file inclusion
if (!defined('MY_APP') && basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('This file cannot be accessed directly.');
}

require_once __DIR__ . "/../ControllerBase.php";
require_once __DIR__ . "/../../business-logic/WeatherService.php";

class WeatherController extends ControllerBase
{

    public function handleRequest()
    {
        $this->model["weather"] = WeatherService::getWeather();
        $this->viewPage("Weather");
    }
}