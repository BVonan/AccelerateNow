<?php
session_start(); // Initialize the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Team</title>
</head>

<body>

    <?php include 'includes/header.php'; ?>

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

    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-4">Meet Our Founder & Team of One</h2>
                    <div class="team-member">
                        <div class="member-details">
                            <h3>Founder / Creator / UX/UI Designer / Programmer</h3>
                            <p class="mb-4">As the sole member of our team, I handle all aspects of our business, from
                                conceptualization to development. Here are some of my responsibilities:</p>
                            <ul>
                                <li>Conceptualizing and designing user interfaces</li>
                                <li>Programming and developing the website</li>
                                <li>Managing business operations</li>
                                <li>Ensuring customer satisfaction</li>
                                <!-- Add more responsibilities as needed -->
                            </ul>
                            <p class="mt-4">I am passionate about delivering high-quality products and services to our
                                users and continuously improving our offerings.</p>
                            <!-- You can add your photo or any relevant images here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and other necessary scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>