<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Accelerate Now</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Any other necessary meta tags or scripts -->
</head>
<body>

<?php include 'includes/header.php'; ?>

<!-- Navigation Bar (Bootstrap) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <img src="fast_car_logo.png" alt="Fast Car Logo" width="30" height="30" class="d-inline-block align-top">
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
    

    <div class="container my-5">
        <h1 class="display-4 text-center mb-5">About Accelerate Now</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Our Passion for Exclusivity</h2>
                <p>Accelerate Now was founded on our deep passion for the world's most exclusive and high-performance automobiles. We aim to provide an unparalleled experience that merges luxury, performance, and exceptional service.</p>

                <h2>Unrivaled Fleet of Luxury and Hyper Cars</h2>
                <p>Our curated collection includes iconic vehicles from Lamborghini, Ferrari, Porsche, McLaren, and more. Each car in our fleet embodies excellence in engineering and design, promising an extraordinary driving experience.</p>
            </div>

            <div class="col-md-6">
                <h2>Seamless Rental Experience</h2>
                <p>With Accelerate Now, your rental experience is effortless. Our user-friendly online platform coupled with our dedicated team ensures a smooth process from car selection to return, focusing on making your journey memorable.</p>

                <h2>Passionate and Knowledgeable Team</h2>
                <p>Our team comprises passionate individuals dedicated to providing exceptional service. We're here to guide you through the rental process, offering expert advice and personalized recommendations.</p>

                <h2>Your Adventure Awaits</h2>
                <p>Embark on an exhilarating journey with Accelerate Now and experience the thrill of driving the world's most coveted automobiles.</p>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Any other necessary scripts -->
</body>
</html>
