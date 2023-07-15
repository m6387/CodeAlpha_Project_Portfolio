<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);


if ($stmt->execute()) {
    header("location: index.html");
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
