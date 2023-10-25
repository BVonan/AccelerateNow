// car slideshow
const carImages = document.querySelectorAll('.carousel img');
let currentCarIndex = 0;

function showNextCar() {
    carImages[currentCarIndex].classList.remove('block');
    currentCarIndex = (currentCarIndex + 1) % carImages.length;
    carImages[currentCarIndex].classList.add('block');
}

// Automatically advance the slideshow every few seconds
setInterval(showNextCar, 5000);
// End of car slideshow


// // JavaScript to show/hide the modal and handle actions
// const carModal = document.getElementById('carModal');
// const viewButtons = document.querySelectorAll('.view-details');
// const closeModalButton = document.querySelector('.close-modal');
// const carNameElement = document.getElementById('carName');
// const carYearElement = document.getElementById('carYear');
// const modalContent = document.querySelector('.modal-content');

// viewButtons.forEach(button => {
//     button.addEventListener('click', async () => {
//         // Get the car ID from the button's data attribute
//         const carId = button.getAttribute('data-car-id');
        
//         // Use an AJAX request to fetch car data from the server
//         const response = await fetch('get_car_details.php', {
//             method: 'POST',
//             body: JSON.stringify({ carId }),
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//         });
        
//         if (response.ok) {
//             // Parse the JSON response
//             const carDetails = await response.json();

//             // Display car details in the modal
//             carNameElement.textContent = carDetails.name;
//             carYearElement.textContent = carDetails.year;
//             // Add more car details here

//             carModal.classList.remove('hidden');
//         }
//     });
// });

// closeModalButton.addEventListener('click', () => {
//     carModal.classList.add('hidden');
// });
