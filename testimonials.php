<?php
session_start();

// Your database connection and login logic here...

// Redirect if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to the homepage or dashboard
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/header.php'; ?>
<!-- Navigation Bar (Bootstrap) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
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

    <?php include 'includes/header.php'; ?>
    <!-- Navigation Bar (Bootstrap) -->
    <!-- Your navigation bar code here -->

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <a href="login.php" class="btn btn-primary fw-bold mb-2 text-uppercase">Log In</a>
                                <?php
                                if (isset($loginError)) {
                                    echo '<p style="color: red;">' . $loginError . '</p>';
                                }
                                ?>
                                <!-- Your login form fields -->
                            </div>


                            <div>
                                <p class="mb-0">Don't have an account? <a href="signup.php"
                                        class="text-white-50 fw-bold">Sign
                                        Up</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include necessary scripts -->
</body>

</html>