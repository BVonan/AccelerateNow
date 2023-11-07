<?php

$db_host = "127.0.0.1";
$db_port = "3306";
$db_name = "AccelerateNow";
$db_user = "root";
$db_password = "";

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
?>
