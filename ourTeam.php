<?php
session_start(); // Initialize the session
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Team</title>
</head>

<body class="bg-gray-100">
    <?php include 'includes/header.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-center text-3xl font-bold mb-4 text-blue-500">As the sole member of our team...</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="mb-4">
                    As the sole member of our team, I handle all aspects of our business, from
                    conceptualization to development. Here are some of my responsibilities:
                </p>
                <ul class="list-disc list-inside mb-6">
                    <li>Conceptualizing and designing user interfaces</li>
                    <li>Programming and developing the website</li>
                    <li>Managing business operations</li>
                    <li>Ensuring customer satisfaction</li>
                </ul>
                <p class="mt-4">
                    I am passionate about delivering high-quality products and services to our
                    users and continuously improving our offerings.
                </p>
                <!-- You can add your photo or any relevant images here -->
            </div>
        </div>
    </div>
</body>
<?php include 'includes/footer.php'; ?>


</html>