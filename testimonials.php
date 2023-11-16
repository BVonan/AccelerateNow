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

// Fetch testimonials from the database
$sql = "SELECT CustomerName, TestimonialText FROM Testimonials";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include necessary meta tags, CSS, and scripts -->
</head>

<body>

    <?php include 'includes/header.php'; ?>


    <?php include 'includes/header.php'; ?>
    <!-- Navigation Bar (Bootstrap) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img src="fast_car_logo.png" alt="Fast Car Logo" width="30" height="30"
                        class="d-inline-block align-top">
                    Accelerate Now
                </a>
            </div>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <?php include 'includes/nav.php'; ?>
            </div>

            <div class="flex-none flex items-center justify-center">
                <div class="flex space-x-4">
                    <?php
                    if (isset($_SESSION['username'])) {
                        // Display the username and a "Log Out" link if the user is logged in.
                        echo '<span class="px-6 h-12 uppercase font-semibold tracking-wider bg-transparent text-black">';
                        echo $_SESSION['username'];
                        echo '</span>';
                        echo '<a href="logout.php" class="px-6 h-12 uppercase font-semibold tracking-wider bg-transparent text-black">Log Out</a>';
                    } else {
                        // Display "Log In" and "Sign Up" links if the user is not logged in.
                        echo '<a href="login.php" class="px-6 h-12 uppercase font-semibold tracking-wider bg-transparent text-black">Log In</a>';
                        echo '<a href="signup.php" class="px-6 h-12 uppercase font-semibold tracking-wider bg-blue-500 text-white">Sign Up</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="vh-100">
      
    <div class="card border-info mb-3" style="max-width: 18rem;">
    <div class="card-header"><?php echo $_SESSION['username']; ?></div>
    <div class="card-body">
        <h5 class="card-title">Write Your Testimonial</h5>
        <form method="post" action="">
            <div class="mb-3">
                <label for="testimonial_title" class="form-label">Title</label>
                <input type="text" class="form-control" id="testimonial_title" name="testimonial_title">
            </div>
            <div class="mb-3">
                <label for="testimonial_text" class="form-label">Your Testimonial</label>
                <textarea class="form-control" id="testimonial_text" name="testimonial_text" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5">
            </div>
            <button type="submit" class="btn btn-primary">Submit Testimonial</button>
        </form>
    </div>
</div>

                            

                            <!-- Display Testimonials -->
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="card border-info mb-3" style="max-width: 18rem;">';
                                    echo '<div class="card-header">' . $row['CustomerName'] . '</div>';
                                    echo '<div class="card-body">';
                                    echo '<h5 class="card-title">Info card title</h5>';
                                    echo '<p class="card-text">' . $row['TestimonialText'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo "No testimonials available.";
                            }
                            ?>
                            <!-- End Testimonials -->

    </section>

    <!-- Include necessary scripts -->
</body>

</html>