<?php
session_start();

// Replace with your database credentials
$host = "localhost:3306";
$username = "root";
$password = "bohnnY06!";
$dbName = "AccelerateNow";

// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Redirect if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}

// Handling form submission to add testimonials
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = $_SESSION['username'];
    $testimonialText = $_POST['testimonial_text'];
    $rating = $_POST['rating'];

    // Perform validation if needed

    // Insert the testimonial into the database
    $insertQuery = "INSERT INTO Testimonials (CustomerName, TestimonialText, Rating, TestimonialDate) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssi", $customerName, $testimonialText, $rating);
    $stmt->execute();
    $stmt->close();
    // Optionally, redirect the user to a success page or perform other actions after adding the testimonial
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary meta tags, CSS, and scripts -->
</head>
<body>

<?php include 'includes/header.php'; ?>
<!-- Navigation Bar (Bootstrap) -->
<!-- Your navigation bar code here -->

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Create Testimonial</h2>
                            <form action="testimonials.php" method="post">
                                <div class="mb-3">
                                    <label for="testimonial_text" class="form-label">Your Testimonial:</label>
                                    <textarea class="form-control" id="testimonial_text" name="testimonial_text" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating (1-5):</label>
                                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                            </form>
                        </div>

                        <!-- Other content -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include necessary scripts -->
</body>
</html>
