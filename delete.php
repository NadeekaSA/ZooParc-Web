<?php
include 'loginconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $table = $_POST['table'];

    if ($table === 'registration') {
        $query = "DELETE FROM registration WHERE id = ?";
    } elseif ($table === 'events') {
        $query = "DELETE FROM events WHERE event_id = ?";
    } else {
        
        exit("Invalid table specified.");
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the admin dashboard
    header("Location: admin.php");
    exit();
}

$conn->close();
?>
