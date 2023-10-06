<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AccelerateNow - Luxury And Super Car Rentals<< /title>
            <link rel="stylesheet" href="/assets/css/style.css">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <!-- Tailwind CSS -->
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <!-- JS -->
            <script src="/assets/js/script.js"></script>
</head>

<body>
    <!-- Navigation Bar (Bootstrap) -->
    <!-- Navigation Bar (Bootstrap) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Left Section -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img src="fast_car_logo.png" alt="Fast Car Logo" width="30" height="30"
                        class="d-inline-block align-top">
                    Accelerate Now
                </a>
            </div>

            <!-- Center Section -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <?php include 'includes/nav.php'; ?>
            </div>

            <!-- Right Section -->
            <div class="flex-none flex items-center justify-center">
                <div class="flex space-x-4">
                    <a href="#" class="px-6 h-12 uppercase font-semibold tracking-wider bg-transparent text-black">
                        Log In
                    </a>
                    <a href="#" class="px-6 h-12 uppercase font-semibold tracking-wider bg-blue-500 text-white">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Tailwind CSS) -->
    <header class="bg-gradient-to-r from-blue-500 to-indigo-800 text-white text-center py-20">
        <h1 class="text-4xl font-semibold">Experience the Ultimate Luxury</h1>
        <p class="mt-4 text-lg">Rent the finest luxury cars for your special occasions.</p>
        <a href="#"
            class="mt-6 inline-block bg-white text-indigo-800 hover:bg-indigo-800 hover:text-white py-2 px-6 rounded-full font-semibold">Explore
            Cars</a>
    </header>

    <!-- Car Listing Section (Bootstrap) -->
    <section class="container mt-5">
        <h2 class="text-center mb-4">Our Luxury Cars</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="car1.jpg" class="card-img-top" alt="Car 1">
                    <div class="card-body">
                        <h5 class="card-title">Car Model 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-primary">Rent Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="car2.jpg" class="card-img-top" alt="Car 2">
                    <div class="card-body">
                        <h5 class="card-title">Car Model 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-primary">Rent Now</a>
                    </div>
                </div>
            </div>
            <!-- Add more car listings here -->
        </div>
    </section>

    <!-- Footer (Tailwind CSS) -->
    <footer class="bg-gray-800 text-white py-6 text-center">
        <p>&copy; 2023 Luxury Car Rental</p>
    </footer>

    <!-- Bootstrap JS and jQuery (Add these scripts at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>