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
            <div class="modal-content p-6 flex">
                <div class="left-details pr-4">
                    <h2 class="text-2xl font-semibold mb-4" id="carName" style="color: #3c82f6;"></h2>
                    <!-- Display car details here -->
                    <p><strong>Year:</strong> <span id="carYear"></span></p>
                    <p><strong>Company:</strong> <span id="carCompany"></span></p>
                    <p><strong>Engine Type:</strong> <span id="carEngineType"></span></p>
                    <p><strong>0 to 60 mph:</strong> <span id="carZeroToSixty"></span></p>
                    <p><strong>MPG:</strong> <span id="carMPG"></span></p>
                </div>
                <div class="right-details">
                    <p><strong>Fuel Type:</strong> <span id="carFuelType"></span></p>
                    <p><strong>Seating Space:</strong> <span id="carSeatingSpace"></span></p>
                    <p><strong>Seats:</strong> <span id="carSeats"></span></p>
                    <p><strong>Traveling Capacity:</strong> <span id="carTravelingCapacity"></span></p>
                    <p><strong>Cost per Day:</strong> $<span id="carCostPerDay"></span></p>
                    <!-- Add more car details -->
                    <div class="mt-4">
                        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-full mr-2 select-car">Select Car</a>
                        <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full close-modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle the click event on the "View" button
        $(".view-details").on("click", function () {
            var carId = $(this).data("car-id");

            // Use AJAX to fetch car details from the server
            $.ajax({
                type: "POST",
                url: "get_car_details.php", // Create this file to handle the request
                data: { car_id: carId },
                success: function (response) {
                    var carDetails = JSON.parse(response);

                    // Populate the modal with car details
                    $("#carImage").text(carDetails.image);
                    $("#carName").text(carDetails.name);
                    $("#carYear").text(carDetails.year);
                    $("#carCompany").text(carDetails.company);
                    $("#carEngineType").text(carDetails.engine_type);
                    $("#carZeroToSixty").text(carDetails.zero_to_sixty);
                    $("#carMPG").text(carDetails.mpg);
                    $("#carFuelType").text(carDetails.fuel_type);
                    $("#carSeatingSpace").text(carDetails.seating_space);
                    $("#carSeats").text(carDetails.traveling_capacity);
                    $("#carCostPerDay").text(carDetails.cost_per_day);

                    // Show the modal
                    $("#carModal").removeClass("hidden");
                }
            });
        });

        // Close the modal
        $(".close-modal").on("click", function () {
            $("#carModal").addClass("hidden");
        });
    });
</script>