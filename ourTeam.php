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

    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center mb-4">As the sole member of our team...</h2>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            As the sole member of our team, I handle all aspects of our business, from
                            conceptualization to development. Here are some of my responsibilities:
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Conceptualizing and designing user interfaces</li>
                            <li class="list-group-item">Programming and developing the website</li>
                            <li class="list-group-item">Managing business operations</li>
                            <li class="list-group-item">Ensuring customer satisfaction</li>
                        </ul>
                        <p class="card-text mt-4">
                            I am passionate about delivering high-quality products and services to our
                            users and continuously improving our offerings.
                        </p>
                        <!-- You can add your photo or any relevant images here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>

</body>

</html>