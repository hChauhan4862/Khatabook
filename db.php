<?php
$servername = "localhost";
$username = "hcemr8ri9wai";
$password = "Hps202132@";
$dbname = "ohtdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>