<?php
session_start();

$host = "localhost:3306";
$username = "root";
$password = "bohnnY06!";
$dbName = "AccelerateNow";

$conn = new mysqli($host, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Fetch user's data from the database based on the entered username.
    $query = "SELECT user_id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $stmt->bind_result($userId, $dbUsername, $dbPassword);
    $stmt->fetch();
    $stmt->close();

    // Verify the entered password against the hashed password from the database.
    if (password_verify($enteredPassword, $dbPassword)) {
        // Password is correct, store the username in a session variable to log in.
        $_SESSION['username'] = $enteredUsername;

        // Redirect to the homepage or wherever you want the user to go after login.
        header("Location: index.php");
        exit();
    } else {
        // Password is incorrect, handle errors or display a message.
        $loginError = "Invalid username or password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In</title>
    <?php include 'includes/header.php'; ?>
</head>

<body class="bg-gray-100">
    <section class=" vh-100 gradient-custom min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full mx-auto p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-3xl font-bold mb-4">Log In</h2>
            <?php
            if (isset($loginError)) {
                echo '<p class="text-red-500">' . $loginError . '</p>';
            }
            ?>
            <!-- Disclaimer for non-logged-in users -->
            <p class="mb-4">You must be logged in to make a testimonial.</p>
            <form action="login.php" method="post" class="space-y-4">
                <div>
                    <label for="username" class="block font-medium">Username:</label>
                    <input type="text" id="username" class="w-full border rounded-lg px-3 py-2" name="username"
                        required>
                </div>
                <div>
                    <label for="password" class="block font-medium">Password:</label>
                    <input type="password" id="password" class="w-full border rounded-lg px-3 py-2" name="password"
                        required>
                </div>
                <button class="bg-blue-500 text-white rounded-lg px-5 py-2 hover:bg-blue-600 transition-all"
                    type="submit">Log In</button>
            </form>
            <div class="mt-4 text-center">
                <p>Don't have an account? <a href="signup.php" class="font-semibold text-blue-500">Sign Up</a></p>
            </div>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
