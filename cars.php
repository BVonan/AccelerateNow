<?php
session_start(); // Initialize the session
?>

<!DOCTYPE html>
<html lang="en">
<body class="bg-gray-200">

<head>
    <title>Cars</title>
</head>

<?php include 'includes/header.php'; ?>

  <!-- Navigation Bar (Bootstrap) -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="//jh\">
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
  <div class="flex">
    <!-- Aside Filter Section -->
    <aside class="w-1/4 p-4">
      <form id="filterForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <!-- Filter by Year -->
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="year">Year</label>
          <select id="year" name="year" class="w-full border rounded px-3 py-2 appearance-none">
            <option value="">All</option>
            <option value="2023">2023</option>
            <!-- Add more years as needed -->
          </select>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="company">Company</label>
          <select id="company" name="company" class="w-full border rounded px-3 py-2 appearance-none">
            <option value="">All</option>
            <option value="Mercedes-Benz">Mercedes-Benz</option>
            <option value="BMW">BMW</option>
            <option value="Audi">Audi</option>
            <option value="Lexus">Lexus</option>
            <option value="Porsche">Porsche</option>
            <option value="Tesla">Tesla</option>
            <option value="McLaren">McLaren</option>
            <option value="Bugatti">Bugatti</option>
            <option value="Rolls-Royce">Rolls-Royce</option>
            <option value="Lamborghini">Lamborghini</option>
            <option value="Jaguar">Jaguar</option>
            <option value="Aston Martin">Aston Martin</option>
            <option value="Ferrari">Ferrari</option>
            <option value="Bentley">Bentley</option>
            <option value="Koenigsegg">Koenigsegg</option>
            <option value="Pagani">Pagani</option>
            <option value="Volvo">Volvo</option>
            <option value="Volkswagen">Volkswagen</option>
            <!-- Add more companies as needed -->
          </select>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="engine_type">Engine Type</label>
          <select id="engine_type" name="engine_type" class="w-full border rounded px-3 py-2 appearance-none">
            <option value="">All</option>
            <option value="V8">V8</option>
            <option value="Inline-6">Inline-6</option>
            <option value="V6">V6</option>
            <option value="Electric">Electric</option>
            <option value="Hybrid">Hybrid</option>
            <option value="Gasoline">Gasoline</option>
            <option value="V12">V12</option>
            <option value="Flat-6">Flat-6</option>
            <option value="W12">W12</option>
            <option value="V10">V10</option>
            <option value="Flat-4">Flat-4</option>
            <option value="W16">W16</option>
            <option value="Inline-4">Inline-4</option>
            <!-- Add more engine types as needed -->
          </select>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="zero_to_sixty">0-60 Time</label>
          <select id="zero_to_sixty" name="zero_to_sixty" class="w-full border rounded px-3 py-2 appearance-none">
            <option value="">All</option>
            <option value="0-2.4 seconds">0-2.4 seconds</option>
            <option value="2.5-3.4 seconds">2.5-3.4 seconds</option>
            <option value="3.5-4.9 seconds">3.5-4.9 seconds</option>
            <option value="5.0+ seconds">5.0+ seconds</option>
            <!-- Add more 0-60 times as needed -->
          </select>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="mpg">MPG</label>
          <select id="mpg" name="mpg" class="w-full border rounded px-3 py-2 appearance-none">
            <option value="">All</option>
            <option value="8-25 MPG">8-25 MPG</option>
            <option value="26-50 MPG">26-50 MPG</option>
            <option value="51-75 MPG">51-75 MPG</option>
            <option value="76-125+ MPG">76-125+ MPG</option>
            <!-- Add more MPG options as needed -->
          </select>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="seating_space">Traveling Capacity</label>
          <select id="seating_space" name="seating_space" class="w-full border rounded px-3 py-2 appearance-none">
            <option value="">All</option>
            <script>
              for (let i = 100; i <= 700; i += 50) {
                let startMiles = i;
                let endMiles = i + 49;
                let optionText = `${startMiles} - ${endMiles} miles`;
                document.write(`<option value="${optionText}">${optionText}</option>`);
              }
            </script>
            <!-- Add more seating space in miles options as needed -->
          </select>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="traveling_capacity">Seating Space</label>
          <select id="traveling_capacity" name="traveling_capacity" class="w-full border rounded px-3 py-2 appearance-none">
            <option value="">All</option>
            <option value="2 seats">2 seats</option>
            <option value="4 seats">4 seats</option>
            <option value="5 seats">5 seats</option>
            <option value="7 seats">7 seats</option>
          </select>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="cost_per_day">Cost Per Day</label>
          <select id="cost_per_day" name="cost_per_day" class="w-full border rounded px-3 py-2 appearance-none">
            <option value="">All</option>
            <script>
              for (let i = 200; i <= 1000; i += 100) {
                let startPrice = i;
                let endPrice = i + 99;
                let optionText = `$${startPrice} - $${endPrice}`;
                document.write(`<option value="${optionText}">${optionText}</option>`);
              }
            </script>
            <!-- Add more cost per day options as needed -->
          </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full mt-4">Apply Filters</button>
      </form>
      <!-- Add other input fields for filtering as needed -->
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
        function fetchAndDisplayCars($yearFilter, $companyFilter, $engineTypeFilter, $zeroToSixtyFilter, $mpgFilter, $seatingSpaceFilter, $travelingCapacityFilter, $costPerDayFilter) {
          $conn = connectToDatabase();
        
          $sql = "SELECT car_id, name, year, image, company, engine_type, zero_to_sixty, mpg, seating_space, traveling_capacity, cost_per_day, fuel_type FROM cars WHERE 1";
        
          // Apply filters based on user selections
          if (!empty($yearFilter)) {
            $sql .= " AND year = " . intval($yearFilter);
          }
        
          if (!empty($companyFilter)) {
            $sql .= " AND company = '" . $companyFilter . "'";
          }
        
          if (!empty($engineTypeFilter)) {
            $sql .= " AND engine_type = '" . $engineTypeFilter . "'";
          }
        
          if (!empty($zeroToSixtyFilter)) {
            $sql .= " AND zero_to_sixty = '" . $zeroToSixtyFilter . "'";
          }
        
          if (!empty($mpgFilter)) {
            $sql .= " AND mpg = '" . $mpgFilter . "'";
          }
        
          if (!empty($seatingSpaceFilter)) {
            $sql .= " AND seating_space = '" . $seatingSpaceFilter . "'";
          }
        
          if (!empty($travelingCapacityFilter)) {
            $sql .= " AND traveling_capacity = '" . $travelingCapacityFilter . "'";
          }
        
          if (!empty($costPerDayFilter)) {
            // Extract the price range from the filter
            $priceRange = explode('-', $costPerDayFilter);
            $startPrice = isset($priceRange[0]) ? intval(substr($priceRange[0], 1)) : 0;
            $endPrice = isset($priceRange[1]) ? intval(substr($priceRange[1], 1)) : PHP_INT_MAX;
            $sql .= " AND cost_per_day >= " . $startPrice . " AND cost_per_day <= " . $endPrice;
          }
        
          // Add more filters as needed
        
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
        
        // Retrieve the selected filters
        $yearFilter = isset($_GET['year']) ? intval($_GET['year']) : '';
        $companyFilter = isset($_GET['company']) ? $_GET['company'] : '';
        $engineTypeFilter = isset($_GET['engine_type']) ? $_GET['engine_type'] : '';
        $zeroToSixtyFilter = isset($_GET['zero_to_sixty']) ? $_GET['zero_to_sixty'] : '';
        $mpgFilter = isset($_GET['mpg']) ? $_GET['mpg'] : '';
        $seatingSpaceFilter = isset($_GET['seating_space']) ? $_GET['seating_space'] : '';
        $travelingCapacityFilter = isset($_GET['traveling_capacity']) ? $_GET['traveling_capacity'] : '';
        $costPerDayFilter = isset($_GET['cost_per_day']) ? $_GET['cost_per_day'] : '';
        
        // Call the function with all the filters
        fetchAndDisplayCars($yearFilter, $companyFilter, $engineTypeFilter, $zeroToSixtyFilter, $mpgFilter, $seatingSpaceFilter, $travelingCapacityFilter, $costPerDayFilter);
        
        ?>
      </div>
    </div>
  </div>

  <!-- Include the Modal -->
  <?php include 'modal.php'; ?>

  <?php
// Retrieve distinct values for each filter from your database

// Function to retrieve distinct values for a specific column
function getDistinctValues($columnName, $conn) {
    $query = "SELECT DISTINCT $columnName FROM cars";
    $result = $conn->query($query);

    // Output options based on database values
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row[$columnName] . '">' . $row[$columnName] . '</option>';
        }
    } else {
        echo '<option value="">No data found</option>';
    }
}

// Connect to your database
$conn = connectToDatabase();

// Populate filters
$filterColumns = array('year', 'company', 'engine_type', 'zero_to_sixty', 'mpg', 'seating_space', 'traveling_capacity', 'cost_per_day');
foreach ($filterColumns as $column) {
    echo '<select id="' . $column . '" name="' . $column . '" class="w-full border rounded px-3 py-2 appearance-none">';
    echo '<option value="">All</option>'; // Add an option for "All" or an empty value

    // Populate options for the current filter
    getDistinctValues($column, $conn);

    echo '</select>';
}

// Close the database connection
$conn->close();
?>


  <!-- Include Tailwind CSS and any other necessary scripts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
  <!-- <script src="script.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // Handle the click event on the "View" button
      $(".view-details").on("click", function () {
        console.log("Button clicked"); // Add this line to check if the button click event is detected
        var carId = $(this).data("car-id");

        // Use AJAX to fetch car details from the server
        $.ajax({
          type: "POST",
          url: "get_car_details.php", // Create this file to handle the request
          data: { car_id: carId },
          success: function (response) {
            console.log("AJAX success:", response); // Add this line to check the response from the server
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
      $(".close-modal").on("click", function () {
        console.log("Modal close button clicked"); // Add this line to check if the close button is working
        $("#carModal").addClass("hidden");
      });
    });
  </script>
  <script src="js/main.js"></script>
</body>
<?php include 'includes/footer.php'; ?>

</html>