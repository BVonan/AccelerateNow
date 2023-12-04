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

<body>
    <section class="vh-100 gradient-custom">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-center">
                    <div class="card-body p-5">
                        <h2 class="card-title fw-bold mb-4 text-uppercase">Sign Up</h2>
                        <!-- Form for Sign Up -->
                        <form action="signup.php" method="post">
                            <div class="mb-4">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" id="username" class="form-control form-control-lg"
                                    name="username" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" class="form-control form-control-lg"
                                    name="email" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" class="form-control form-control-lg"
                                    name="password" required>
                            </div>
                            <button class="btn btn-primary btn-lg px-5" type="submit">Sign Up</button>
                        </form>
                        <div class="mt-4">
                            <p class="mb-0">Already have an account? <a href="login.php" class="fw-bold">Log In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
