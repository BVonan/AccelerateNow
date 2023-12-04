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
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform data validation and hash the password (for security).
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Registration successful, store the username in a session variable to log in.
        $_SESSION['username'] = $username;

        // Redirect to the homepage or wherever you want the user to go after registration.
        header("Location: index.php");
        exit();
    } else {
        // Registration failed, handle errors appropriately.
        echo "Registration failed: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
</head>

<?php include 'includes/header.php'; ?>


<body class=>
    <section class="vh-100 gradient-custom flex justify-center items-center">
        <div class="max-w-md w-full mx-auto p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-3xl font-bold mb-4">Sign Up</h2>
            <!-- Form for Sign Up -->
            <form action="signup.php" method="post" class="space-y-4">
                <div>
                    <label for="username" class="block font-medium">Username:</label>
                    <input type="text" id="username" class="w-full border rounded-lg px-3 py-2" name="username"
                        required>
                </div>
                <div>
                    <label for="email" class="block font-medium">Email:</label>
                    <input type="email" id="email" class="w-full border rounded-lg px-3 py-2" name="email" required>
                </div>
                <div>
                    <label for="password" class="block font-medium">Password:</label>
                    <input type="password" id="password" class="w-full border rounded-lg px-3 py-2" name="password"
                        required>
                </div>
                <button class="bg-blue-500 text-white rounded-lg px-5 py-2 hover:bg-blue-600 transition-all"
                    type="submit">Sign Up</button>
            </form>
            <div class="mt-4 text-center">
                <p>Already have an account? <a href="login.php" class="font-semibold text-blue-500">Log In</a></p>
            </div>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
