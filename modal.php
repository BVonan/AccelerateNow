<!-- Modal for Car Details -->
<div id="carModal" class="hidden fixed inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Modal content -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Car details content goes here -->
            <div class="modal-content p-6">
                <h2 class="text-2xl font-semibold mb-4" id="carName"></h2>
                <!-- Display car details here -->
                <p id="carYear"></p>
                <p id="carCompany"></p>
                <p id="carEngineType"></p>
                <p id="carZeroToSixty"></p>
                <p id="carMPG"></p>
                <p id="carFuelType"></p>
                <p id="carSeatingSpace"></p>
                <p id="carTravelingCapacity"></p>
                <p id="carCostPerDay"></p>
                <!-- Add more car details -->
                <div class="mt-4">
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-full mr-2 select-car">Select Car</a>
                    <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full close-modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to populate the modal -->
<script>
$(document).ready(function () {
    // Handle the click event on the "View" button
    $(".view-details").on("click", function () {
        var carName = $(this).data("car-name");
        var carYear = $(this).data("car-year");
        var carCompany = $(this).data("car-company");
        var carEngineType = $(this).data("car-engine-type");
        var carZeroToSixty = $(this).data("car-zero-to-sixty");
        var carMPG = $(this).data("car-mpg");
        var carFuelType = $(this).data("car-fuel-type");
        var carSeatingSpace = $(this).data("car-seating-space");
        var carTravelingCapacity = $(this).data("car-traveling-capacity");
        var carCostPerDay = $(this).data("car-cost-per-day");

        // Populate the modal with car details
        $("#carName").text(carName);
        $("#carYear").text("Year: " + carYear);
        $("#carCompany").text("Company: " + carCompany);
        $("#carEngineType").text("Engine Type: " + carEngineType);
        $("#carZeroToSixty").text("0 to 60 mph: " + carZeroToSixty);
        $("#carMPG").text("MPG: " + carMPG);
        $("#carFuelType").text("Fuel Type: " + carFuelType);
        $("#carSeatingSpace").text("Seating Space: " + carSeatingSpace);
        $("#carTravelingCapacity").text("Traveling Capacity: " + carTravelingCapacity);
        $("#carCostPerDay").text("Cost per Day: $" + carCostPerDay);

        // Show the modal
        $("#carModal").removeClass("hidden");
    });

    // Close the modal
    $(".close-modal").on("click", function () {
        $("#carModal").addClass("hidden");
    });
});
</script>
