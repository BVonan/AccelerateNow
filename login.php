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
    $query = "SELECT id, username, password FROM users WHERE username = ?";
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
    <!-- Include necessary meta tags and stylesheets -->
</head>

<body>
    <h2>Log In</h2>
    <?php
    if (isset($loginError)) {
        echo '<p style="color: red;">' . $loginError . '</p>';
    }
    ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Log In">
    </form>
</body>

</html>