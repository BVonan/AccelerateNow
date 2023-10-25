<?php
session_start(); // Initialize the session
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; ?>
<body class="bg-gray-200">
<!-- header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation Bar (Bootstrap) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img src="fast_car_logo.png" alt="Fast Car Logo" width="30" height="30" class="d-inline-block align-top">
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

<!-- Main Content -->
<div class="container mx-auto mt-4 flex">
    <!-- Sidebar Filter Section -->
    <aside class="w-1/4 p-4">
        <div class="mb-4">
            <!-- Filter by Year Dropdown -->
            <label class="block text-gray-700 font-bold mb-2" for="year">Year</label>
            <div class="relative">
                <select id="year" class="w-full border rounded px-3 py-2 appearance-none">
                    <!-- Populate options for the year filter -->
                    <option value="2023">2023</option>
                    <!-- Add more years as needed -->
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.293 5.293a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 7.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Add more filter options as needed with similar dropdown structures -->
        <!-- For example, you can add filters for other attributes like company, engine type, etc. -->
    </aside>

    <!-- Car Listings -->
    <div class="w-3/4 p-4">
        <!-- Car cards will be displayed here -->
        <div class="grid grid-cols-3 gap-4">
            <!-- Example car card (You can loop through your car data) -->
            <?php
            // Include your database connection function
            include 'assets/config/db.php';

            // Function to fetch and display cars
            function fetchAndDisplayCars($yearFilter) {
              $conn = connectToDatabase();
              // Modify the SQL query to select the 'id' field
              $sql = "SELECT car_id, name, year, image FROM cars";
              
              // Add a filter for the selected year
              if (!empty($yearFilter)) {
                  $sql .= " WHERE year = " . intval($yearFilter);
              }
          
              $result = $conn->query($sql);
          
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo '<div class="bg-white rounded-lg p-4">';
                      echo '<img src="' . $row['image'] . '" alt="Car" class="w-full h-48 object-cover">';
                      echo '<h3 class="text-lg font-semibold mt-2">' . $row['name'] . '</h3>';
                      echo '<p class="text-gray-500">Year: ' . $row['year'] . '</p>';
                      echo '<button class="bg-blue-500 text-white px-4 py-2 rounded-full mt-2 view-details" data-car-id="' . $row['car_id'] . '">View</button>';
                      echo '</div>';
                  }
              } else {
                  echo "No cars available.";
              }
          
              $conn->close();
          }
          

            // Retrieve the selected year filter (you can expand this for more filters)
            $yearFilter = isset($_GET['year']) ? $_GET['year'] : '';

            // Call the function to fetch and display cars with the selected year filter
            fetchAndDisplayCars($yearFilter);
            ?>
        </div>
    </div>
</div>


<!-- Include the Modal -->
<?php include 'modal.php'; ?>

<!-- Include Tailwind CSS and any other necessary scripts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
<!-- <script src="script.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle the click event on the "View" button
    $(".view-details").on("click", function() {
        var carId = $(this).data("car-id");

        // Use AJAX to fetch car details from the server
        $.ajax({
            type: "POST",
            url: "get_car_details.php", // Create this file to handle the request
            data: { car_id: carId },
            success: function(response) {
                var carDetails = JSON.parse(response);

                // Populate the modal with car details
                $("#carName").text(carDetails.name);
                $("#carYear").text(carDetails.year);
                // Add more car details here

                // Show the modal
                $("#carModal").removeClass("hidden");
            }
        });
    });

    // Close the modal
    $(".close-modal").on("click", function() {
        $("#carModal").addClass("hidden");
    });
});
</script>

</body>
<?php include 'includes/footer.php'; ?>
</html>
