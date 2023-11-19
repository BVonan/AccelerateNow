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
    <!-- Navigation Bar (Bootstrap) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img src="fast_car_logo.png" alt="Fast Car Logo" width="30" height="30"
                        class="d-inline-block align-top">
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