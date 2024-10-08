<?php
session_start();
if (isset($_SESSION['active']) && $_SESSION['active'] == 1) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Converter</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Temperature Converter</h3>
                    <form id="converterForm">
                        <div class="form-group">
                            <label for="temperature">Enter Temperature</label>
                            <input type="text" class="form-control" id="temperature" name="temperature" placeholder="Enter temperature" required>
                        </div>
                        <div class="form-group">
                            <label for="conversionType">Select Conversion</label>
                            <select class="form-control" id="conversionType" name="conversionType" required>
                                <option value="">Select Conversion</option>
                                <option value="celsius_to_fahrenheit">Celsius to Fahrenheit</option>
                                <option value="fahrenheit_to_celsius">Fahrenheit to Celsius</option>
                                <option value="celsius_to_kelvin">Celsius to Kelvin</option>
                                <option value="kelvin_to_celsius">Kelvin to Celsius</option>
                                <option value="fahrenheit_to_kelvin">Fahrenheit to Kelvin</option>
                                <option value="kelvin_to_fahrenheit">Kelvin to Fahrenheit</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Convert</button>
                        <button type="button" onclick="window.location.href = 'logout.php';" class="btn btn-danger btn-block">Exit Convertor</button>
                    </form>

                    <div id="result" class="mt-4 text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#converterForm').on('submit', function(event){
        event.preventDefault();  // Prevent form from submitting traditionally

        var temperature = $('#temperature').val();
        var conversionType = $('#conversionType').val();

        // AJAX request to the PHP file
        $.ajax({
            url: 'convert.php',  // PHP file to handle conversion
            type: 'POST',
            data: {
                temperature: temperature,
                conversionType: conversionType
            },
            success: function(response) {
                $('#result').html('<div class="alert alert-success">Converted Temperature: ' + response + '</div>');
            },
            error: function() {
                $('#result').html('<div class="alert alert-danger">Error processing the request.</div>');
            }
        });
    });
});
</script>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}else{
    header(header: 'Location: login.php');
    exit;
}