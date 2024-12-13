<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Community Registration</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="regisstyle.css" />
</head>
<body>   
<?php 
if (isset($_POST['submit'])) {  
   include("connection.php");
   
   $name=$_POST['name'];
   $phone=$_POST['phone'];
   $address=$_POST['address'];
   $dob=$_POST['dob'];
   $email=$_POST['email'];
   $password=$_POST['pwdone']; 
   $hashed_password = md5($password);
     	
	$sql = "INSERT INTO registration ". "(name,phone,address,dob,email,password) ". "VALUES('$name','$phone','$address','$dob','$email','$hashed_password')";
	
	$results = mysqli_query($conn, $sql);
            
            if(!$results) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
			else
			{
            echo "<h1>Entered data successfully, now you can login</h1> <br> <a href='member.php' class='enquire-button'>Login Now</a>\n";

			}
			
			
   }  else {

    echo "Your form is not submitted yet please fill the form and visit again";
  } 
?>

</body>
</html>
