<?php
session_start(); // Initialize the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
</head>

<?php include 'includes/header.php'; ?>


<body>

    <!-- Hero Section (Tailwind CSS) -->
    <header class="bg-gradient-to-r from-blue-500 to-indigo-800 text-white text-center py-20">
        <h1 class="text-4xl font-semibold">Experience the Ultimate Luxury</h1>
        <br>
        <h2 class="text-xl text-lg">Rent the finest luxury cars for your special occasions.</h2>
        <br>
        <h3> *Disclaimer: Must be 21+ to rent a car*</h3>
        <a href="/cars.php"
            class="mt-6 inline-block bg-white text-indigo-800 hover:bg-indigo-800 hover:text-white py-2 px-6 rounded-full font-semibold">Explore
            Cars</a>
    </header>

    <!-- Car Carousel with Info -->
    <?php include 'ran_car.php'; ?>


    <!-- Footer (Tailwind CSS) -->
    <footer class="bg-gray-800 text-white py-6 text-center">
        <p>&copy; 2023 Accelerate Now</p>
    </footer>
</body>

</html>