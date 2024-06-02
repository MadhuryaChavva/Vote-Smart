<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_evoting";

// Establish Connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// UserInput Test
function test_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

?>
