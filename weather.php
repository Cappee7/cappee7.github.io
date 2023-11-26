<?php
    // PHP code for displaying weather information
    $apiKey = 'bd5e378503939ddaee76f12ad7a97608'; // Replace with your actual API key
    $city = 'Shrewsbury'; // Replace with the city name

    // Construct the API URL
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

    // Fetch weather data from the API
    $weatherData = file_get_contents($apiUrl);

    // Decode JSON data
    $weatherInfo = json_decode($weatherData);

    if ($weatherInfo) {
        $temperature = $weatherInfo->main->temp - 273.15; // Convert temperature from Kelvin to Celsius
        $description = $weatherInfo->weather[0]->description;
        $weatherOutput = "Current Weather: " . round($temperature, 0) . "°C, $description";
    } else {
        $weatherOutput = "Unable to fetch weather data.";
    }
    ?>

    <p class="weather"><?= $weatherOutput; ?>.</p>