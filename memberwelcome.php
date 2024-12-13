<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZooParc Community</title>
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
                <li><a href="outlets.html">Food Outlets</a></li>
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
                 echo "Hello!  ".$uid."  ";                
?>
<a href="logout.php" class="enquire-button">Logout</a>
        </div>
    </header>
<br><br>
<div class="top-heading"><h1>Welcome to ZooParc Community <hr></h1></div> 
<br>
<div class="about-section">
        <div class="text-content">
      <div class="top-heading"> <h1>Events & Programs<hr></h1> </div> 
        
        <p>
            Community members of ZooParc can enroll in events organized by ZooParc. 
            There are various programs and events every month. Explore now and become a part of our vibrant community!
        </p>
        <br><br>
        <a href="event&prog.php" class="enquire-button">Events & Programs(View Only)</a>
        <a href="eventformembers.php" class="enquire-button">Enroll with Events & Programs</a>
        </div>
        <div class="image-content">
            <img src="otherimages/program.jpg" alt="eventzooparc">
        </div>
</div>
<br><br>
<div class="about-section">
        <div class="text-content">
            <div class="top-heading"><h1>Upload Educational Informations<hr></h1> </div> 
        <p>
            Community members can upload information for educational purposes. 
            Share your knowledge and contribute to our collective learning experience! 
           </p>
           <br><br>
           <a href="eduUploads.php" class="enquire-button">Upload Now..</a>
        </div>
        <div class="image-content">
            <img src="otherimages/upload.jpg" alt="eventzooparc">
        </div>
</div>
<br><br>
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