<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Programs</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="animalstyle.css">
    <style>
          input[type="text"] {
    width: 30%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
    </style>
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
        <div>
           <a class="enquire-button" href="registration.html">Volunteer Registration</a>
           <a class="enquire-button" href="memberwelcome.php">Community LogIn</a>
        </div>
    </header>
<br>
<div class="top-heading">
    <h1>Here are the UpComing Events <br>
        & <br>
        Programs at ZooParc <hr></h1>
    <br>
</div>
<br>
<br>
<br>
<form method="POST" action="">
    <input type="text" name="search" placeholder="Search event by name or date (YYYY-MM-DD)" required>
    <input type="submit" name="submit" value="Search" class="enquire-button">
</form>
<br>
<?php
include 'loginconnection.php';
if (isset($_POST['submit'])) {
    $search = $conn->real_escape_string($_POST['search']);

    // Query to search events by name or date
    $sql = "SELECT event_name, description, date, start_time, location,status FROM events WHERE event_name LIKE '%$search%' OR date = '$search'";
    $result = $conn->query($sql);

if ($result === false) {
    
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='top-heading'>";
            echo "<h2>" . ($row['event_name']) . "<hr></h2><br>";
            echo "<p>" . ($row['description']) . "</p><br><br>";
            echo "<p class='date-time'>Date: " . ($row['date']) . " | Start Time: " . ($row['start_time']) . "</p><br>";
            echo "<p>Location: " . ($row['location']) . "</p><br>";
            echo "<p>Status: " . ($row['status']) . "</p><br>";
            echo "</div>";
        }
    } else {
        echo "<p>No events found matching your search.</p>";
    }
}
}
?>
<br>
<hr>
<br>
<br>
<div class="zoo camp">
<?php
    // Include the database connection file
    include 'loginconnection.php';
    
    // Get the current record ID from the URL, default to 0 if not set
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    // Fetch the record from the database
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
    // Close the connection
    $conn->close();
    ?>
</div>
<br>
<br>
<br>
<div id="animal enrichment">
<?php
    
    include 'loginconnection.php';
    
   
    $id = isset($_GET['id']) ? intval($_GET['id']) : 1;
    
    
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
  
    $conn->close();
    ?>  
</div>
<br>
<br>
<br>
<div id="zoo visit">
<?php
   
    include 'loginconnection.php';
    
   
    $id = isset($_GET['id']) ? intval($_GET['id']) : 2;
    
   
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
    
    $conn->close();
    ?>
</div>
<br>
<br>
<br>
<div id="weekend">
<?php
    
    include 'loginconnection.php';
    
    
    $id = isset($_GET['id']) ? intval($_GET['id']) : 10;
    
    // Fetch the record from the database
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
       
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
   
    $conn->close();
    ?>
</div>
<br>
<br>
<br>
<div id="adventure">
<?php
    
    include 'loginconnection.php';
    
    
    $id = isset($_GET['id']) ? intval($_GET['id']) : 4;
    
    
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
       
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
    
    $conn->close();
    ?>
</div>
<br>
<br>
<br>
<div id="keeper">
<?php
  
    include 'loginconnection.php';
    
  
    $id = isset($_GET['id']) ? intval($_GET['id']) : 5;
    
 
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
       
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
    
    $conn->close();
    ?>
</div>
<br>
<br>
<br>
<div id="keeper">
<?php
    
    include 'loginconnection.php';
    
 
    $id = isset($_GET['id']) ? intval($_GET['id']) : 6;
    
   
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
    
    $conn->close();
    ?>
</div>
<br>
<br>
<br>
<div id="kids">
<?php
    
    include 'loginconnection.php';
    
    
    $id = isset($_GET['id']) ? intval($_GET['id']) : 7;
    
    
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
    
    $conn->close();
    ?>
</div>
<br>
<br>
<br>
<div id="craft fair">
<?php
    
    include 'loginconnection.php';
    
   
    $id = isset($_GET['id']) ? intval($_GET['id']) : 8;
    
   
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    
    
    $conn->close();
    ?>
</div>
<br>
<br>
<br>
<div id="fitness challenge">
    
<?php
   
    include 'loginconnection.php';
    
   
    $id = isset($_GET['id']) ? intval($_GET['id']) : 9;
    
    
    $sql = "SELECT * FROM events LIMIT $id, 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
       
        while($row = $result->fetch_assoc()) {
            echo "Event Name: <span style='font-weight: bold; color: #007BFF; font-size: 1.2em;'>" . $row["event_name"] . "</span><br><br>";
            echo "Description: " . $row["description"]. "<br><br>";
            echo "Date: " . $row["date"]. "<br>";
            echo "Location: " . $row["location"]. "<br>";
            echo "Start Time: " . $row["start_time"]. "<br>";
            echo "Status: " . $row["status"]. "<br>";
            echo "<img src='" . $row["imageurl"] . "' alt='Event Image' style='width: 500px; height: auto;border-radius:3%;'><br>";
        }
    } else {
        echo "No more records.";
    }
    

    $conn->close();
    ?>
</div>
<br><br>
<div class=top-heading>
    <h3>"Ready to Join the Fun? Become a ZooParc Community Member and Sign Up for Any Event You Love!" </h3> <br>
    <a href="registration.html" class="enquire-button">Register Now!</a>
</div>
<br>
<footer>
    <div class="footer-container">
      <img src="zooparc.png" alt="">
      <div class="footer-links">
        <a href="">Contact Us</a>
        <a href="">T & C's</a>
        <a href="">Privacy Policy</a>
      </div>
      <p>Get-in Touch With ZooParc!</p>
      <br>
      <div class="footer-social">
        <img src="sociallogo.png" alt="">
      </div>
      <div class="footer-social">
        <a href="#">Twitter</a>
        <a href="#"> Facebook</a>
        <a href="#">Instagram</a>
      </div>
    </div>
</footer>
</body>
</html>