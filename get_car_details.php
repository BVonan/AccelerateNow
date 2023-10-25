<?php
// Include your database connection function here
include 'db.php';


// Get the car ID from the request
$data = json_decode(file_get_contents('php://input'));
$carId = $data->carId;

// Get car details using the function
$carDetails = getCarDetails($carId);

// Return car details as JSON
header('Content-Type: application/json');
echo json_encode($carDetails);
