
<?php
$serverName = "localhost";
$username = "root";
$Password = "";
$dbName = "AccelerateNow"; 

$con = mysqli_connect($serverName, $username, $Password, $dbName);
if ($con->connect_error) {
    echo"Connection failed";
    exit();
}
echo"Connection Success"
?>

<!-- <?php
// Specify the path to your index.html file.
$indexFilePath = 'index.html';

// Check if the index.html file exists.
if (file_exists($indexFilePath)) {
    // Load and display the content of the index.html file.
    include($indexFilePath);
} else {
    // If the index.html file doesn't exist, display an error message.
    echo 'The index.html file does not exist.';
}
?> -->