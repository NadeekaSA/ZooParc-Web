<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Uploads</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="welcomestyles.css">
    
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
            </ul>
        </nav>
        <div>
<?php
            session_start();
                if(!isset($_SESSION['email']))
                {
                    header("location: member.php");
                }
                $uid=$_SESSION['email'];
                 echo "Hello ".$uid."  ";                
?>
<a class="enquire-button" href="memberwelcome.php">Go Back</a>
<a href="logout.php" class="enquire-button">Logout</a>
        </div>
    </header>
    <div class="form-container">
       <div class="top-heading"> <h2>Input Infromations Here <hr> </h2></div>
        <form method="post" action="eduUpcon.php">
            <label for="name">Subject:</label>
            <input type="text" id="subject" name="subject" required>
            
            <label for="description">Description & References:</label>
            <textarea id="description" name="description" required></textarea>
            
            <input type="submit" value="Submit" class="enquire-button">
        </form>
    </div>