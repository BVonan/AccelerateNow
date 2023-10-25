<?php
include 'assets/config/db.php';

if (isset($_POST['car_id'])) {
    $carId = $_POST['car_id'];
    
    $conn = connectToDatabase();
    $sql = "SELECT * FROM cars WHERE car_id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $carId);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            echo json_encode($row);
        }
    }
    
    $conn->close();
}
?>
