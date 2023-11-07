<?php
// session_start(); // Initialize the session

// Database configuration
$host = "localhost:3306";
$username = "root";
$password = "bohnnY06!";
$dbName = "AccelerateNow";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch 20 random cars
function getRandomCarsInfo($conn, $count = 20)
{
    $query = "SELECT * FROM cars ORDER BY RAND() LIMIT $count";
    $result = mysqli_query($conn, $query);
    $cars = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $cars[] = $row;
    }

    return $cars;
}

// Get 20 random cars along with their information
$randomCars = getRandomCarsInfo($conn);
?>

<!-- Car carousel -->
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <?php
        $carIndex = 1;
        foreach ($randomCars as $car) {
            $carImage = $car['image'];
            $carName = $car['name'];
            $carYear = $car['year'];
            $carCompany = $car['company'];
            $engineType = $car['engine_type'];
            $zeroToSixty = $car['zero_to_sixty'];
            $mpg = $car['mpg'];
            $fuelType = $car['fuel_type'];
            $seatingSpace = $car['seating_space'];
            $travelingCapacity = $car['traveling_capacity'];
            $costPerDay = number_format($car['cost_per_day'], 2);

            echo '<div class="hidden duration-700 ease-in-out" data-carousel-item>';
            echo '<div class="flex">';
            echo '<div class="w-1/2">';
            echo '<img src="' . $carImage . '" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="' . $carName . '">';
            echo '</div>';
            echo '<div class="w-1/2 p-4 bg-white">';
            echo '<h2>' . $carName . '</h2>';
            echo '<p>Year: ' . $carYear . '</p>';
            echo '<p>Company: ' . $carCompany . '</p>';
            echo '<p>Engine Type: ' . $engineType . '</p>';
            echo '<p>0-60 Time: ' . $zeroToSixty . '</p>';
            echo '<p>MPG: ' . $mpg . '</p>';
            echo '<p>Fuel Type: ' . $fuelType . '</p>';
            echo '<p>Seating Space: ' . $seatingSpace . '</p>';
            echo '<p>Number of Seats: ' . $seats . '</p>';
            echo '<p>Traveling Capacity: ' . $travelingCapacity . '</p>';
            echo '<p>Cost Per Day: $' . $costPerDay . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $carIndex++;
        }
        ?>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <?php
        for ($i = 1; $i <= 20; $i++) {
            $isCurrent = ($i === 1) ? 'true' : 'false';
            echo '<button type="button" class="w-3 h-3 rounded-full" aria-current="' . $isCurrent . '" aria-label="Slide ' . $i . '" data-carousel-slide-to="' . ($i - 1) . '"></button>';
        }
        ?>
    </div>
    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


<!-- JavaScript to initialize the carousel -->
<!-- JavaScript to initialize the carousel -->
<script>
    const splide = new Splide('#default-carousel', {
        type: 'carousel',
        perPage: 1,
        autoplay: true,
        pauseOnHover: false,
        interval: 7000, // 7 seconds
    }).mount();

    // Function to update the carousel with 20 new random cars
    function updateCarousel() {
        fetch('fetch_random_cars.php') // Replace with the correct URL
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    splide.removeAll();
                    data.forEach(car => {
                        splide.add('<li class="splide__slide"><div class="car-image"><img src="' + car.image + '" alt="' + car.name + '" style="max-width: 200px;"></div><div class="car-info">' + car.info + '</div></li>');
                    });
                }
            });
    }

    // Update the carousel with 20 new random cars on page load
    window.addEventListener('load', updateCarousel);

    // Update the carousel every 7 seconds
    setInterval(updateCarousel, 7000);
</script>