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

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Log In</h2>
                                <?php
                                if (isset($loginError)) {
                                    echo '<p style="color: red;">' . $loginError . '</p>';
                                }
                                ?>
                                <form action="login.php" method="post">
                                    <div class="form-outline form-white mb-4">
                                        <label for="username" class="form-label">Username:</label>
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg"
                                            name="username" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label for="password" class="form-label">Password:</label>
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg"
                                            name="password" required>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Log In</button>
                                </form>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign
                                        Up</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>