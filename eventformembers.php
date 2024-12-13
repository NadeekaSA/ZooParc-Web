<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Pro: for Community</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="animalstyle.css">
    
</head>
<body>
    <header>
        <div class="logo">
            <img src="zooparc.png" alt="ZooParc Logo">
            <h1>ZooParc</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="aboutUs.html">About Us</a></li>
                <li><a href="animals.html">Animals</a></li>
                <li><a href="outlets.html">Food Outlets</a></li>
            </ul>
        </nav>
<div class="top-heading">
<?php
session_start();
        if(!isset($_SESSION['email']))
        {
            header("location: member.php");
        }
        $uid=$_SESSION['email'];
         echo "HELLO!!  ".$uid."  YOU ARE WELCOME!";
?>
</div>
        <div>
           <a class="enquire-button" href="memberwelcome.php">Go Back</a>
           <a class="enquire-button" href="logout.php">Logout</a>
        </div>
</header>
<br>
<div class="top-heading">
    <h1>As a member, you can enroll in any events and programs organized by ZooParc</h1> <br>
    <h3>Here are the UpComing Events & Programs <hr></h3>
</div><br>
<div>
<?php
include 'loginconnection.php';	

$sql = 'SELECT * FROM events';

$result = mysqli_query($conn, $sql);
echo "<table border='1'>
<tr>
<th>Event ID</th>
<th>Event Name</th>
<th>Description</th>
<th>Date</th>
<th>Location</th>
<th>Start Time</th>
<th>Status</th>
</tr>";
//fetches a result row as an array
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['event_id'] . "</td>";
    echo "<td>" . $row['event_name'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['start_time'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";

    echo "</tr>";
}
echo "</table>";


mysqli_close($conn);	
?>
<br>
<div>
    <form method="POST" action="enroll.php">
        <label for="event_id">Enter the "Event ID" of the event you wish to be enrolled with:</label>
        <input type="text" id="event_id" name="event_id" required>
        <button type="submit" name="enroll" class="enquire-button">Enroll</button>
    </form>
</div>