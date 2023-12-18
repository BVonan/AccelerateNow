<?php
// Your database connection configuration
$servername = "localhost";
$username = "root";
$password = "bohnnY06!";
$dbname = "AccelerateNow";

// Image file path
$imagePath = '/Users/bohnny/Herd/AccelerateNow/images/LAMBORGHINI_STO-54.jpeg';

// Read the image into a variable
$imageData = file_get_contents($imagePath);

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to update the image column for car_id = 9
$stmt = $conn->prepare("UPDATE cars SET image = ? WHERE car_id = ?");
$stmt->bind_param("si", $imageData, $carId); // Assuming 'image' column is of type longblob

// Car ID for which you want to update the image
$carId = 9;

// Execute the update
if ($stmt->execute()) {
    echo "Image inserted for car_id = 9 successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
