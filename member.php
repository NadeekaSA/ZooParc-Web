<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="memberstyle.css">

<script src="memberloginvali.js"></script>

</head>
<body>
<?php
session_start();
$message = "";

if (isset($_POST['submit'])) {
    include 'loginconnection.php';

    $email = $_POST["uemail"];
    $password = $_POST["upassword"];

    // Sanitize inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    //password hashing
    $hashed_password = md5($password);

    // Query the database
    $sql = "SELECT * FROM registration WHERE email='$email' AND password='$hashed_password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role']; // Store the user role in session

// Redirect the login based on user role
            if ($row['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: memberwelcome.php");
            }
            exit;
        } else {
            $message = "Your Login Name or Password is invalid";
        }
    } else {
        $message = "Error executing query: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
    <header>
        <div class="logo">
            <img src="zooparc.png" alt="ZooParc Logo">
            <h1>ZooParc</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.html" class="enquire-button">Home</a></li>  
            </ul>
        </nav>
    </header>
<main>
    <section class="hero">
        <div class="container">
            <img src="zooparc.png" alt="form">
            <h3>Member Login</h3>
            <form id="loginForm" name="myform" method="post" action="" onsubmit="return validateForm()">

                <label for="email">Email:</label>
                <input type="text" id="email" name="uemail" placeholder="Enter Email">

                <label for="password">Password:</label>
                <input type="password" id="password" name="upassword" placeholder="Enter password">

            
                <input type="submit" name="submit" id="submit" value="Login" class="enquire-button">
                <button type="reset" class="enquire-button">Reset</button>
                <br> <br>
                <span>Not a Member ?</span>
                <br><br>
                <a href="registration.html" class="enquire-button">Sign Up Now</a>
            </form>
        </div>
    </section>
</main>
<footer>
    <p class="foot">&copy; 2024 ZooParc. All rights reserved.</p>
  </footer>
</body>
</html>