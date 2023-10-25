<?php
function connectToDatabase() {
    $host = "localhost";
    $username = "root";
    $password = "bohnnY06!";
    $dbName = "AccelerateNow";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}




// http://localhost:8000/assets/config/db.php