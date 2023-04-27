<?php
// Set database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "254track";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters for INSERT statement
$stmt = $conn->prepare("INSERT INTO details (name, phone, car, plate, driver) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $phone, $car, $plate, $driver);

// Set parameters and execute INSERT statement
$name = $_POST["name"];
$phone = $_POST["phone"];
$car = $_POST["car"];
$plate = $_POST["plate"];
$driver = $_POST["driver"];
$stmt->execute();

// Close connection and redirect to thank-you page
$stmt->close();
$conn->close();
header("Location: track.php");
exit();
?>
