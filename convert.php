<?php
if (isset($_POST['temperature']) && isset($_POST['conversionType'])) {
    $temperature = $_POST['temperature'];
    $conversionType = $_POST['conversionType'];

    // Validate if temperature is a number
    if (!is_numeric($temperature)) {
        echo "Invalid temperature value.";
        exit();
    }

    $temperature = floatval($temperature);

    // Perform the appropriate conversion
    switch ($conversionType) {
        case 'celsius_to_fahrenheit':
            $convertedTemperature = ($temperature * 9/5) + 32;
            break;

        case 'fahrenheit_to_celsius':
            $convertedTemperature = ($temperature - 32) * 5/9;
            break;

        case 'celsius_to_kelvin':
            $convertedTemperature = $temperature + 273.15;
            break;

        case 'kelvin_to_celsius':
            $convertedTemperature = $temperature - 273.15;
            break;

        case 'fahrenheit_to_kelvin':
            $convertedTemperature = ($temperature - 32) * 5/9 + 273.15;
            break;

        case 'kelvin_to_fahrenheit':
            $convertedTemperature = ($temperature - 273.15) * 9/5 + 32;
            break;

        default:
            echo "Invalid conversion type.";
            exit();
    }

    // Return the result back to the AJAX request
    echo round($convertedTemperature, 2);  // Round to 2 decimal places
} else {
    echo "Temperature and conversion type are required.";
}
?>
