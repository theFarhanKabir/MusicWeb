<?php
$host = 'localhost';  // Database server (usually localhost)
$dbname = 'music_player';  // Database name from your SQL file
$username = 'root';  // MySQL username (change if necessary)
$password = '';  // MySQL password (leave blank if none)

// Create the database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get direct download link from Google Drive shareable link
function get_direct_link($google_drive_url) {
    $url = str_replace("d/", "uc?id=", $google_drive_url);
    $url = str_replace("file/d/", "uc?id=", $url);
    $url = str_replace("/view", "", $url);
    return $url;
}
?>