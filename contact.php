<?php
session_start(); // Initialize the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
</head>

<?php include 'includes/header.php'; ?>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
        <p class="mb-4">Please note: This contact page is for demonstration purposes only and does not represent a real
            business. The location displayed is a reference to the college attended.</p>

        <!-- Contact form -->
        <form action="/submit_contact_form.php" method="post" class="max-w-lg">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full">Submit</button>
            </div>
        </form>
        <!-- Displaying the location -->
        <div class="mb-8">
            <iframe src="https://storage.googleapis.com/maps-solutions-iv0qxmw7gm/locator-plus/fo7a/locator-plus.html"
                width="100%" height="400" style="border:0;" loading="lazy">
            </iframe>
        </div>

    </div>
    <br>
    <br>
    <?php include 'includes/footer.php'; ?>

</body>

</html>