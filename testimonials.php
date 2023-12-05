<?php
session_start();

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
    $testimonialTitle = $_POST['testimonial_title'];
    $testimonialText = $_POST['testimonial_text'];
    $rating = $_POST['rating'];

    // Perform validation if needed

    // Insert the testimonial into the database
    $insertQuery = "INSERT INTO Testimonials (CustomerName, TestimonialTitle, TestimonialText, Rating, TestimonialDate) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssi", $customerName, $testimonialTitle, $testimonialText, $rating);
    $stmt->execute();
    $stmt->close();
}

// Fetch testimonials from the database
$sql = "SELECT CustomerName, TestimonialTitle, TestimonialText FROM Testimonials";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Testimonials</title>
</head>

<?php include 'includes/header.php'; ?>

<body class="bg-gray-100 testimonial">

    <!-- Navigation Bar (Tailwind) -->
    <!-- Your navigation bar code here -->

    <section class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mx-auto max-w-md">
                    <div class="bg-white border border-blue-500 rounded p-4">
                        <div class="font-bold mb-2 cn">
                            <?php echo $_SESSION['username']; ?>
                        </div>
                        <div class="mb-4">
                            <h5 class="text-lg font-bold mb-2">Write Your Testimonial</h5>
                            <form method="post" action="">
                                <div class="mb-4">
                                    <label for="testimonial_title" class="block mb-1">Title</label>
                                    <input type="text"
                                        class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"
                                        id="testimonial_title" name="testimonial_title">
                                </div>
                                <div class="mb-4">
                                    <label for="testimonial_text" class="block mb-1">Your Testimonial</label>
                                    <textarea
                                        class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"
                                        id="testimonial_text" name="testimonial_text" rows="3"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="rating" class="block mb-1">Rating</label>
                                    <input type="number"
                                        class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"
                                        id="rating" name="rating" min="1" max="5">
                                </div>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit
                                    Testimonial</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="mx-auto max-w-md">';
                        echo '<div class="bg-white border border-blue-500 rounded p-4 mb-4">';
                        echo '<div class="font-bold mb-2 cn">' . $row['CustomerName'] . '</div>';
                        echo '<div>';
                        echo '<h5 class="text-lg font-bold mb-2">' . $row['TestimonialTitle'] . '</h5>';
                        echo '<p class="text-gray-700">' . $row['TestimonialText'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p class='text-center'>No testimonials available.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>