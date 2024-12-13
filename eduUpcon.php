<?php
session_start();

// Include the database connection file
include 'loginconnection.php';

// Retrieve email from session
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form input
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    // SQL query to insert data
    $sql = "INSERT INTO uploads (email, subject, description) VALUES ('$email', '$subject', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Your information has been successfully submitted. Admins will review and publish it soon. <a href='eduUploads.php'>GoBack.</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
