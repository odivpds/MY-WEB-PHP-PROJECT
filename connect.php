<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_login = "login";
// Create connection
$conn = new mysqli($servername, $username, $password,$db_login);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
