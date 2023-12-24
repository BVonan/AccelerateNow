<?php
include 'assets/config/db.php';

if (isset($_POST['car_id'])) {
    $carId = $_POST['car_id'];

    $conn = connectToDatabase();

    if ($conn) {
        $sql = "SELECT * FROM cars WHERE car_id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $carId);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo json_encode($row);
            } else {
                echo json_encode(array('error' => 'No car found with the given ID'));
            }
        } else {
            echo json_encode(array('error' => 'Database query error: ' . $conn->error));
        }

        $conn->close();
    } else {
        echo json_encode(array('error' => 'Database connection error'));
    }
} else {
    echo json_encode(array('error' => 'No car ID provided'));
}
?>
