<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "ko-games";

// Laver forbindelse
$conn = mysqli_connect($servername, $username, $password, $db);


// Checker forbindelse
if (mysqli_connect_errno()) {

    echo "Connection failed: " . mysqli_connect_errno();
} 

?>