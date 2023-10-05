<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AccelerateNow - Luxury And Super Car Rentals</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <!-- JS -->
    <script src="/assets/js/script.js"></script>
</head>

<body class="font-serif bg-light-blue-100">
    <header class="bg-teal-400 text-white p-4">
        <h1 class="text-4xl font-extrabold mb-2">Welcome to AccelerateNow</h1>
        <h2 class="text-xl">Luxury And Super Car Rentals</h2>
        <nav>
            <ul class="list-none flex">
                <?php include 'includes/nav.php'; ?>
            </ul>
        </nav>
    </header>

    <main class="container mx-auto py-8">
        <section id="intro" class="relative bg-gray-800 text-white rounded-lg p-8 mb-8">
            <div class="absolute inset-0">
                <div class="flex items-center justify-center h-full">
                    <!-- Carousel goes here -->
                </div>
            </div>
            <div class="relative z-10">
                <h2 class="text-4xl font-extrabold mb-4">Experience the Thrill of Speed</h2>
                <p class="text-lg mb-8">Discover our premium selection of fast cars available for rent.</p>
                <a href="/cars"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-full">Explore Cars</a>
            </div>
        </section>
        <!-- Car Slideshow -->
        <div class="carousel">
            <!-- Car images here -->
        </div>
        <div id="carInfo" class="text-center text-white">
            <!-- Car information will be displayed here -->
        </div>
    </main>

    <footer class="bg-teal-400 text-white text-center py-4">
        <p>&copy; 2023 AccelerateNow</p>
    </footer>
</body>

</html>