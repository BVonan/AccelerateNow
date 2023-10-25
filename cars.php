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
              <path
                d="M14.293 5.293a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 7.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0z" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Add more filter options as needed with similar dropdown structures -->
    </aside>

    <!-- Car Listings -->
    <div class="w-3/4 p-4">
      <!-- Car cards will be displayed here -->
      <div class="grid grid-cols-3 gap-4">
        <!-- Example car card (You can loop through your car data) -->
        <?php
        // Sample car data (Replace with your actual car data)
        $cars = [
          [
            'image' => 'car_image.jpg',
            'name' => 'Car Name 1',
            'year' => 2023,
            // Add more car data here
          ],
          [
            'image' => 'car_image.jpg',
            'name' => 'Car Name 2',
            'year' => 2023,
            // Add more car data here
          ],
          // Add more cars as needed
        ];

        foreach ($cars as $car) {
          echo '<div class="bg-white rounded-lg p-4">';
          echo '<img src="' . $car['image'] . '" alt="Car" class="w-full h-48 object-cover">';
          echo '<h3 class="text-lg font-semibold mt-2">' . $car['name'] . '</h3>';
          echo '<p class="text-gray-500">Year: ' . $car['year'] . '</p>';
          echo '<button class="bg-blue-500 text-white px-4 py-2 rounded-full mt-2 view-details" data-car-id="1">View</button>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Modal for Car Details -->
  <div id="carModal" class="hidden fixed inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Modal content -->
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <!-- Car details content goes here -->
        <div class="p-6">
          <h2 class="text-2xl font-semibold mb-4">Car Name</h2>
          <!-- Display car details here -->
          <p>Year: 2023</p>
          <!-- Add more car details -->
          <div class="mt-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-full mr-2">Select Car</button>
            <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full close-modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Tailwind CSS and any other necessary scripts -->
  <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css"></script>
  <script>
    // JavaScript to show/hide the modal and handle actions
    const carModal = document.getElementById('carModal');
    const viewButtons = document.querySelectorAll('.view-details');
    const closeModalButton = document.querySelector('.close-modal');

    viewButtons.forEach(button => {
      button.addEventListener('click', () => {
        carModal.classList.remove('hidden');
      });
    });

    closeModalButton.addEventListener('click', () => {
      carModal.classList.add('hidden');
    });
  </script>
</body>
<?php include 'includes/footer.php'; ?>
</html>