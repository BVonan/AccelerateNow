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
                <p>Year: <span id="carYear"></span></p>
                <p>Company: <span id="carCompany"></span></p>
                <p>Engine Type: <span id="carEngineType"></span></p>
                <p>0 to 60 mph: <span id="carZeroToSixty"></span></p>
                <p>MPG: <span id="carMPG"></span></p>
                <p>Fuel Type: <span id="carFuelType"></span></p>
                <p>Seating Space: <span id="carSeatingSpace"></span></p>
                <p>Seats: <span id="carSeats"></span></p>
                <p>Traveling Capacity: <span id="carTravelingCapacity"></span></p>
                <p>Cost per Day: <span id="carCostPerDay"></span></p>
                <!-- Add more car details -->
                <div class="mt-4">
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-full mr-2 select-car">Select Car</a>
                    <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full close-modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
