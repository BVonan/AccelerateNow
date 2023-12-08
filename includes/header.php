<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Splide CSS -->
    <link rel="stylesheet" href="https://unpkg.com/splide@3.0.8/dist/css/splide.min.css">
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/public/css/tailwind.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.3.0/dist/alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">


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
                        // echo '<span class="px-6 h-12 uppercase font-semibold tracking-wider bg-transparent text-black">';
                        echo '<a href="/profile.php" class="px-6 h-12 uppercase font-semibold tracking-wider bg-transparent text-black">Link Text</a>';
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
</header>