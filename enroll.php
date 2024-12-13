<?php
session_start();


if (!isset($_SESSION['email'])) {
    echo 'User is not logged in';
    exit();
}


include 'loginconnection.php';

// Retrieve the user's email from the session
$email = $_SESSION['email'];

// Check if the enroll button was clicked and the event_id is set
if (isset($_POST['enroll']) && isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];

   
    $sql = "INSERT INTO enrollments (email, event_id) VALUES ('$email', '$event_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo 'User with email ' . $email . ' has been enrolled in event ' . $event_id . ' successfully you will be informed via email  ';
        echo '<a href="eventformembers.php">Go Back</a>';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }

    
    $conn->close();
} else {
    echo 'Enroll button was not clicked or event ID was not provided';
}
?>