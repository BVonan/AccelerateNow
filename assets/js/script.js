// car slideshow
const carImages = document.querySelectorAll('.carousel img');
    const carInfo = document.getElementById('carInfo');
    let currentCarIndex = 0;

    function displayCarInfo(index) {
        const carNames = ["Ferrari Italia 458", "Porsche 911 GT", "Bugatti"];
        carInfo.textContent = `Car: ${carNames[index]}`;
    }

    function showNextCar() {
        carImages[currentCarIndex].classList.remove('block');
        currentCarIndex = (currentCarIndex + 1) % carImages.length;
        carImages[currentCarIndex].classList.add('block');
        displayCarInfo(currentCarIndex);
    }

    // Initial setup
    displayCarInfo(currentCarIndex);
    carImages[currentCarIndex].classList.add('block');

    // Automatically advance the slideshow every few seconds
    setInterval(showNextCar, 5000);
// end of car slideshow


// car details
function getCarDetails($carId) {
    // Connect to the database
    $conn = connectToDatabase();

    // Prepare and execute a SQL query to fetch car details
    $sql = "SELECT * FROM cars WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $carId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch car details
    $carDetails = $result->fetch_assoc();

    // Close the database connection
    $conn->close();

    return $carDetails;
}


// JavaScript to show/hide the modal and handle actions
const carModal = document.getElementById('carModal');
const viewButtons = document.querySelectorAll('.view-details');
const closeModalButton = document.querySelector('.close-modal');
const modalContent = document.querySelector('.modal-content');

viewButtons.forEach(button => {
    button.addEventListener('click', async () => {
        // Get the car ID from the button's data attribute
        const carId = button.getAttribute('data-car-id');
        
        // Use an AJAX request to fetch car data from the server
        const response = await fetch('get_car_details.php', {
            method: 'POST',
            body: JSON.stringify({ carId }),
            headers: {
                'Content-Type': 'application/json',
            },
        });
        
        if (response.ok) {
            // Parse the JSON response
            const carDetails = await response.json();

            // Display car details in the modal
            modalContent.innerHTML = `
                <h2 class="text-2xl font-semibold mb-4">${carDetails.name}</h2>
                <p>Year: ${carDetails.year}</p>
                <!-- Add more car details here -->
            `;
            
            carModal.classList.remove('hidden');
        }
    });
});
