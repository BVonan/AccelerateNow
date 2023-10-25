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



$(document).ready(function () {
    fetchAndDisplayCars();

    // Filter cars when filter inputs change
    $('input, select').on('input', function () {
        fetchAndDisplayCars();
    });
});

function fetchAndDisplayCars() {
    // Fetch cars from the server based on filter criteria

    var filters = {
        year: $('#year').val(),
        name: $('#name').val(),
        company: $('#company').val(),
        engine_type: $('#engine_type').val(),
        zero_to_sixty: $('#zero_to_sixty').val(),
        mpg: $('#mpg').val(),
        fuel_type: $('#fuel_type').val(),
        seating_space: $('#seating_space').val(),
        seats: $('#seats').val(),
        traveling_capacity: $('#traveling_capacity').val(),
        cost_per_day: $('#cost_per_day').val()
    };

    $.ajax({
        type: 'POST',
        url: 'get_cars.php',
        data: filters,
        success: function (data) {
            $('#carListings').html(data);
        }
    });
}

// Add click event listener to the car view button
$(document).on('click', '.view-details', function () {
    var carId = $(this).data('car-id');
    getCarDetails(carId);
});

function getCarDetails(carId) {
    // Fetch and display car details

    $.ajax({
        type: 'POST',
        url: 'get_car_details.php',
        data: { car_id: carId },
        success: function (data) {
            $('#carModal').html(data).show();
        }
    });
}

// Add click event listener to the modal close button
$(document).on('click', '.close-modal', function () {
    $('#carModal').hide().html('');
});

// Add click event listener to the select car button
$(document).on('click', '.select-car', function () {
    var carId = $(this).data('car-id');
    // Implement your logic for selecting a car here
    // You can use another AJAX request to save the selected car, for example.
});
