<?php
$owner_name = $_POST['owner_name'];
$vehicle_number = $_POST['vehicle_number'];
$vehicle_type = $_POST['vehicle_type'];
$registrationDate = $_POST['registration_date'];

$conn = new mysqli('127.0.0.1', 'root', '', 'test');


if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO form (owner_name, vehicle_number, vehicle_type, registrationDate) VALUES (?, ?, ?, ?)");

if ($stmt === false) {
    die("Error in prepare(): " . $conn->error);
}

$stmt->bind_param("ssss", $owner_name, $vehicle_number, $vehicle_type, $registrationDate);

$execval = $stmt->execute();

if ($execval === false) {
    die("Error in execute(): " . $stmt->error);
}

echo "Registration successful...";

$stmt->close();
$conn->close();
?>
