<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "fashion1";

// Create connection
$conn = mysql_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
